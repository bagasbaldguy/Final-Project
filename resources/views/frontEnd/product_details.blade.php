@extends('frontEnd.layouts.master')
@section('title','Detial Page')
@section('slider')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('frontEnd.layouts.category_menu')
            </div>
            <div class="col-sm-9 padding-right">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{Session::get('message')}}</strong>
                    </div>
                @endif
        <div class="product-details"><!--product-details-->

            <div class="col-sm-5">
                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                    <a href="{{url('products/large',$detail_product->image)}}">
                        <img src="{{url('products/small',$detail_product->image)}}" alt="" id="dynamicImage"/>
                    </a>
                </div>

                <ul class="thumbnails" style="margin-left: -10px;">
                    <li>
                        @foreach($imagesGalleries as $imagesGallery)
                            <a href="{{url('products/large',$imagesGallery->image)}}" data-standard="{{url('products/small',$imagesGallery->image)}}">
                                <img src="{{url('products/small',$imagesGallery->image)}}" alt="" width="75" style="padding: 8px;">
                            </a>
                        @endforeach
                    </li>
                </ul>
            </div>
            <div class="col-sm-7" style="margin-bottom: 30px;">
                <form action="{{route('addToCart')}}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                    <input type="hidden" name="product_name" value="{{$detail_product->p_name}}">
                    <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                    <input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
                    <input type="hidden" name="product_weight" value="{{$detail_product->weight}}">
                    <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                    <div class="product-information" style="padding: 27px; margin-right: 100px; border-color: orange;"><!--/product-information-->
                        <h2>{{$detail_product->p_name}}</h2>
                        <p>Code ID: {{$detail_product->p_code}}</p>
                        <p>Weight: {{$detail_product->weight}} (g)</p>
                        <span>
                            <select name="size" id="idSize" class="form-control">
                        	<option value="">Select Audio Quality</option>
                            @foreach($detail_product->attributes as $attrs)
                                <option value="{{$detail_product->id}}-{{$attrs->size}}">{{$attrs->size}}</option>
                            @endforeach
                        </select>
                        </span><br>
                        <span>
                            <span id="dynamic_price">Rp.{{$detail_product->price}}</span>
                            <label>Quantity:</label>
                            <input type="text" name="quantity" value="{{$totalStock}}" id="inputStock"/>
                            <br><br><br>
                            @if($totalStock>0)
                            <button type="submit" class="btn btn-fefault cart" id="buttonAddToCart" style="margin-left:0;">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                            @endif
                        </span>
                        <p><b>Availability:</b>
                            @if($totalStock>0)
                                <span id="availableStock">In Stock</span>
                            @else
                                <span id="availableStock">Out of Stock</span>
                            @endif
                        </p>

                    </div><!--/product-information-->
                </form>

            </div>
        </div><!--/product-details-->

       <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                    <li><a href="#reviews" data-toggle="tab">Reviews</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details" >
                    {!! $detail_product->description !!}
                </div>

                 <div class="tab-pane fade" id="reviews" >
                    <div class="col-sm-12">
                       <div id="disqus_thread"></div>
                    </div>
                </div>

            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $countChunk=0;?>
                    @foreach($relateProducts->chunk(3) as $chunk)
                        <?php $countChunk++; ?>
                        <div class="item<?php if($countChunk==1){ echo' active';} ?>">
                            @foreach($chunk as $item)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{url('/product-detail',$item->id)}}"><img src="{{url('/products/small',$item->image)}}" alt="" style="width: 150px;"/>
                                                <h2>{{$item->price}}</h2>
                                                <p>{{$item->p_name}}</p>
                                                <a href="{{url('/product-detail',$item->id)}}" class="btn btn-default add-to-cart">View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->

    </div>
        </div>
    </div>
@endsection