<?php

namespace App\Http\Controllers;

use App\OrdersMidTrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class YouOrderController extends Controller
{
    public function index()
    {
        $session_id=Session::get('session_id');
        $order_datas=OrdersMidTrans::where('session_id',$session_id)->get();
        return view('frontEnd.order',compact('order_datas'));
    }

    public function deleteOrder($id=null){
        $delete_item=OrdersMidTrans::findOrFail($id);
        $delete_item->delete();
        return back()->with('message','Order Canceled!');
    }
}
