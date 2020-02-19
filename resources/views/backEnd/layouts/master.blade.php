<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title','Master Page')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/colorpicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}" />
    <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-media.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/jquery.gritter.css')}}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<style>
.header {
  padding: 10px;
  text-align: left;
  background: #2E363F;
  color: white;
  font-size: 20px;
}
.footer {
   padding: 10px;
   background-color: #2E363F;
   color: white;
   text-align: center;
   border-style: solid;
   border-color: grey;
}
.textfoot {
   font-size: 15px;
}
</style>

@include('backEnd.layouts.header')
@include('backEnd.layouts.nav')

<!--main-container-part-->
<div id="content">
    @yield('content')
</div>
@include('backEnd.layouts.footer')
@yield('jsblock')
</body>
</html>
