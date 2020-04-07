<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\OrdersMidTrans;
use App\ProductAtrr_model;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
use DB;

class TransactionController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function submitTransaction()
    {
        \DB::transaction(function () {
            
            //get data cart
            $cart = DB::select('SELECT products_id,product_name,product_code,product_color,product_weight,size,price,quantity,user_email FROM cart');
            
            //get session 
            $session_id=Session::get('session_id');

            // Save order ke database
            $order = OrdersMidTrans::create([
                'name_customer' => $this->request->name_customer,
                'phone_customer' => $this->request->phone_customer,
                'address_customer' => $this->request->address_customer,
                'subtotal' => floatval($this->request->subtotal),
                'session_id' => $session_id,
            ]);
            
            // Array List Products
            foreach ($cart as $data) {
                $quantity = $data->quantity;
                $products = $data->product_name;
                $item[] = [
                        'id'       => $order->id,
                        'price'    => $data->price,
                        'quantity' => $quantity,
                        'name'     => ucwords(str_replace('_', ' ', $products))
                ];
            }

            $discount = [
                'id' => null,
                'price' => floatval($this->request->discount*-1),
                'quantity' => 1,
                'name' => 'Discount Amount'
            ];

            $ongkir = [
                'id' => null,
                'price' => floatval($this->request->ongkir),
                'quantity' => 1,
                'name' => 'Charges'
            ];

            array_push($item, $discount, $ongkir);

            // Buat transaksi ke midtrans kemudian save snap tokennya.
            $payload = [
                'transaction_details' => [
                    'order_id'      => $order->id,
                    'gross_amount'  => $order->subtotal,
                ],
                'customer_details' => [
                    'first_name'    => $order->name_customer,
                    'email'         => $this->request->email_customer,
                    'phone'         => $this->request->phone_customer,
                    'address'       => $this->request->address_customer,
                ],
                'item_details' => $item
            ];
            $snapToken = Veritrans_Snap::getSnapToken($payload);
            $order->snap_token = $snapToken;
            $order->save();

            //Decrement Stock Base on Order
            foreach ($cart as $item) {
                $product = ProductAtrr_model::find($item->products_id);
                $product->decrement('stock', $item->quantity);
            }

            // Beri response snap token
            $this->response['snap_token'] = $snapToken;
        });

        return response()->json($this->response);
    }

     public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();
        \DB::transaction(function () use ($notif) {

            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $orderId = $notif->order_id;
            $fraud = $notif->fraud_status;
            $order = OrdersMidTrans::findOrFail($orderId);

            if ($transaction == 'capture') {

                // For credit card transaction, we need to check whether transaction is challenge by FDS or not
                if ($type == 'credit_card') {

                    if ($fraud == 'challenge') {
                        // TODO set payment status in merchant's database to 'Challenge by FDS'
                        // TODO merchant should decide whether this transaction is authorized or not in MAP
                        // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                        $order->setPending();
                    } else {
                        // TODO set payment status in merchant's database to 'Success'
                        // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                        $order->setSuccess();
                    }
                }
            } elseif ($transaction == 'settlement') {

                // TODO set payment status in merchant's database to 'Settlement'
                // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
                $order->setSuccess();
            } elseif ($transaction == 'pending') {

                // TODO set payment status in merchant's database to 'Pending'
                // $donation->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
                $order->setPending();
            } elseif ($transaction == 'deny') {

                // TODO set payment status in merchant's database to 'Failed'
                // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
                $order->setFailed();
            } elseif ($transaction == 'expire') {

                // TODO set payment status in merchant's database to 'expire'
                // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
                $order->setExpired();
            } elseif ($transaction == 'cancel') {

                // TODO set payment status in merchant's database to 'Failed'
                // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
                $order->setFailed();
            }
        });

        return;
    }
}
