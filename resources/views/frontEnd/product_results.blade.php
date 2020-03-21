@extends('frontEnd.layouts.master')
@section('title','List Products')
@section('slider')
@endsection
@section('content')

@if(isset($details))
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <p>The Search Results for Your Products <b> {{ $query }} </b> are : </p>
        </div>
        <div class="col-sm-9 padding-right">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">List Products</h2>
                @foreach($details as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{url('/product-detail',$product->id)}}"><img src="{{url('products/small/',$product->image)}}" alt="" /></a>
                                    <h2>Rp.{{$product->price}}</h2>
                                    <p>{{$product->p_name}}</p>
                                    <a href="{{url('/product-detail',$product->id)}}" class="btn btn-default add-to-cart">View Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- {{--<ul class="pagination">
                    <li class="active"><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">&raquo;</a></li>
                </ul>--}} -->
            </div><!--features_items-->
        </div>
    </div>
</div>

@elseif(isset($message))
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <p> {{ $message }} </p>
        </div>
        <div class="col-sm-9 padding-right">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">List Products</h2>
                    <div class="col-sm-4">
                       Not Found
                    </div>
            </div><!--features_items-->
        </div>
    </div>
</div>
@endif

@endsection