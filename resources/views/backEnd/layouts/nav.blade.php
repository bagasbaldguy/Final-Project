<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li{{$menu_active==1? ' class=active':''}}><a href="{{url('/admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu {{$menu_active==2? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span></a>
            <ul>
                <li><a href="{{url('/admin/category/create')}}">Add New Category</a></li>
                <li><a href="{{route('category.index')}}">List Categories</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==3? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span></a>
            <ul>
                <li><a href="{{url('/admin/product/create')}}">Add New Products</a></li>
                <li><a href="{{route('product.index')}}">List Products</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==4? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupons</span></a>
            <ul>
                <li><a href="{{route('coupon.create')}}">Add New Coupon</a></li>
                <li><a href="{{route('coupon.index')}}">List Coupons</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==5? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span></a>
            <ul>
                <li><a href="{{route('orders.index')}}">List Orders</a></li>
            </ul>
        </li>
         <li class="submenu {{$menu_active==6? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>More</span></a>
            <ul>
                <li class=""><a title="" href="{{url('/admin/settings')}}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
                <li class="">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                        <i class="icon icon-share-alt"></i>{{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->