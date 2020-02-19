@extends('backEnd.layouts.master')
@section('title','List Orders')
@section('content')
    <div id="breadcrumb" style="padding: 3px;"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('orders.index')}}" class="current">Orders</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List Orders</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Users Email</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $orders)
                        <?php $i++; ?>
                        <tr class="gradeC">
                            <td>{{$i}}</td>
                            <td style="vertical-align: middle;">{{$orders->users_email}}</td>
                            <td style="vertical-align: middle;">{{$orders->name}}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="#myModal{{$orders->id}}" data-toggle="modal" class="btn btn-info btn-mini">View</a>
                                <a href="javascript:" rel="{{$orders->id}}" rel1="delete-orders" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                        {{--Pop Up Model for View Product--}}
                        <div id="myModal{{$orders->id}}" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>Detail Order</h3>
                            </div>
                            <div class="modal-body">
                                <p class="text-left">User : {{$orders->users_email}}</p>
                                <p class="text-left">Name : {{$orders->name}}</p>
                                <p class="text-left">Address : {{$orders->address}}</p>
                                <p class="text-left">City : {{$orders->city}}</p>
                                <p class="text-left">State : {{$orders->state}}</p>
                                <p class="text-left">Pincode : {{$orders->pincode}}</p>
                                <p class="text-left">Country : {{$orders->country}}</p>
                                <p class="text-left">Mobile : {{$orders->mobile}}</p>
                                <p class="text-left">Coupon Status : {{$orders->coupon_code}}</p>
                                <p class="text-left">Order Status : {{$orders->order_status}}</p>
                                <p class="text-left">Payment Method : {{$orders->payment_method}}</p>
                                <p class="text-left">Grand Total : {{$orders->grand_total}}</p>
                            </div>
                        </div>
                        {{--Pop Up Model for View Product--}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.tables.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
           var id=$(this).attr('rel');
           var deleteFunction=$(this).attr('rel1');
           swal({
               title:'Are you sure?',
               text:"You won't be able to revert this!",
               type:'warning',
               showCancelButton:true,
               confirmButtonColor:'#3085d6',
               cancelButtonColor:'#d33',
               confirmButtonText:'Yes, delete it!',
               cancelButtonText:'No, cancel!',
               confirmButtonClass:'btn btn-success',
               cancelButtonClass:'btn btn-danger',
               buttonsStyling:false,
               reverseButtons:true
           },function () {
              window.location.href="/admin/"+deleteFunction+"/"+id;
           });
        });
    </script>
@endsection