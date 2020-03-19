<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\City;
use App\Courier;
use App\Provinsi;

class CheckOutController extends Controller
{
    public function index(){
        $provinces=DB::table('provinces')->get();
        $user_login=User::where('id',Auth::id())->first();
        $courier = Courier::pluck('title', 'code');
        $provinsi = Provinsi::pluck('title', 'provinsi_id');
        return view('checkout.index',compact('provinces','user_login','courier','provinsi'));
    }

     public function getKota($id)
    {
        $city = City::where('provinsi_id', $id)->pluck('title', 'city_id');
        return response()->json($city);
    }

    public function submitcheckout(Request $request){
       $this->validate($request,[
           'billing_name'=>'required',
           'billing_address'=>'required',
           'billing_city'=>'required',
        //    'billing_state'=>'required',
        //    'billing_pincode'=>'required',
           'billing_mobile'=>'required',
           'shipping_name'=>'required',
           'shipping_address'=>'required',
           'shipping_city'=>'required',
        //    'shipping_state'=>'required',
        //    'shipping_pincode'=>'required',
           'shipping_mobile'=>'required',
       ]);

        $input_data=$request->all();
       $count_shippingaddress=DB::table('delivery_address')->where('users_id',Auth::id())->count();
       if($count_shippingaddress==1){
           DB::table('delivery_address')->where('users_id',Auth::id())->update([
               'name'=>$input_data['shipping_name'],
               'address'=>$input_data['shipping_address'],
               'city'=>$input_data['shipping_city'],
            //    'state'=>$input_data['shipping_state'],
               'province'=>$input_data['shipping_province'],
            //    'pincode'=>$input_data['shipping_pincode'],
               'mobile'=>$input_data['shipping_mobile']]);
       }else{
            DB::table('delivery_address')->insert([
                'users_id'=>Auth::id(),
                'users_email'=>Session::get('frontSession'),
                'name'=>$input_data['shipping_name'],
                'address'=>$input_data['shipping_address'],
                'city'=>$input_data['shipping_city'],
                // 'state'=>$input_data['shipping_state'],
                'province'=>$input_data['shipping_province'],
                // 'pincode'=>$input_data['shipping_pincode'],
                'mobile'=>$input_data['shipping_mobile'],]);
       }
        DB::table('users')->where('id',Auth::id())->update([
            'name'=>$input_data['billing_name'],
            'address'=>$input_data['billing_address'],
            'city'=>$input_data['billing_city'],
            // 'state'=>$input_data['billing_state'],
            'province'=>$input_data['billing_province'],
            // 'pincode'=>$input_data['billing_pincode'],
            'mobile'=>$input_data['billing_mobile']]);

        $ongkir = $request->ongkir;
        return redirect('/order-review')->with( ['data'=>$ongkir]);
    }

     public function submit(Request $request)
    {
        $harga = RajaOngkir::ongkosKirim([
            'origin' => $request->kota_asal,
            'destination' => $request->kota_tujuan,
            'weight' => $request->berat,
            'courier' => $request->kurir,
        ])->get();

        $option = '';
        foreach ($harga[0]['costs'] as $data) {
            foreach ($data['cost'] as $datas) {
                $option .= '<label><input type="radio" name="pilih-layanan" class="form-controll" value="' . $datas['value'] . '">' . $data['description'] . '</label>  ';
            }
        }
        // dd($harga);
        return response()->json($option);
    }
    
}