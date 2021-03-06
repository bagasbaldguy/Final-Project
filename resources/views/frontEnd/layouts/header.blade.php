<header id="header"><!--header-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{url('/')}}"><img src="{{asset('frontEnd/images/home/Remarkable.png')}}" style="height: 70px; margin-left: 0;" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            
                            <li><a href="{{url('/viewcart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @if(Auth::check())
                                <li><a href="{{url('/myaccount')}}"><i class="fa fa-user"></i> My Account</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Logout </a>
                                </li>
                            @else
                                <li><a href="{{url('/login_page')}}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left" style="margin-left: 80px;">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/')}}"><h4>Home</h4></a></li>
                            <li><a href="{{url('/list-products')}}"><h4>Products</h4></a></li>
                            <li><a href="{{url('/myaccount')}}"><h4>Account</h4></a></li>
                            <li><a href="{{url('/viewcart')}}"><h4>Cart</h4></a></li>
                            @if(Auth::check())
                                <li><a href="{{url('/vieworder')}}"><h4>Order</h4></a></li>
                            @endif
                        </ul>
                    </div>
                    <form action="{{URL::to('/search')}}" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group" style="width:300px; margin-left:840px; margin-bottom:20px;">
                            <input type="text" class="form-control" name="products" 
                                placeholder="Search Products"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->