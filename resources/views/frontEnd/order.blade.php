@extends('frontEnd.layouts.master')
@section('title','Order Page')
@section('slider')
@endsection
@section('content')
    <section id="cart_items">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{Session::get('message')}}</strong>
                </div>
            @endif
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td>No</td>
                        <td class="price">Name Customer</td>
                        <td class="price">Phone Customer</td>
                        <td class="price">Address Customer</td>
                        <td class="total">Subtotal</td>
                        <td class="price">Status</td>    
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                        @foreach($order_datas as $order_data)
                            <tr>
                                <td class="cart_price">
                                    <p>{{$no++}}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{$order_data->name_customer}}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{$order_data->phone_customer}}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{$order_data->address_customer}}</p>
                                </td>
                                <td class="cart_price">
                                    <p>Rp.{{$order_data->subtotal}}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{$order_data->status}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{url('/order/deleteOrder',$order_data->id)}}">Cancel</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection