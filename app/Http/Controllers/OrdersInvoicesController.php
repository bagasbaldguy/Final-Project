<?php

namespace App\Http\Controllers;

use App\Orders_model;
use Illuminate\Http\Request;

class OrdersInvoicesController extends Controller
{
    public function index()
    {
        $menu_active=5;
        $i=0;
        $orders=Orders_model::orderBy('created_at','desc')->get();
        return view('backEnd.orders.index',compact('menu_active','orders','i'));
    }

     public function destroy($id)
    {
        $delete=Orders_model::findOrFail($id);
        $delete->delete();
        return redirect()->route('orders.index')->with('message','Delete Success!');
    }
}
