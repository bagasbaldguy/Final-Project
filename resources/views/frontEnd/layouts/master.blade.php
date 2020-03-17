<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title','Master Page')</title>
    <link href="{{asset('frontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('frontEnd/js/html5shiv.js')}}"></script>
    <script src="{{asset('frontEnd/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('easyzoom/css/easyzoom.css')}}" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head><!--/head-->

<body>
@include('frontEnd.layouts.header')
@section('slider')
    @include('frontEnd.layouts.slider')
@show
@yield('content')
@include('frontEnd.layouts.footer')
<script src="{{asset('frontEnd/js/jquery.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontEnd/js/price-range.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('frontEnd/js/main.js')}}"></script>
<script src="{{asset('easyzoom/dist/easyzoom.js')}}"></script>
<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
        var $this = $(this);

        e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function() {
        var $this = $(this);

        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$('select[name="provinsi_asal"],select[name="kota_asal"],select[name="provinsi_tujuan"],select[name="provinsi_asal"],#kurir').on('change',function(){
        $.ajax({
            data: $('#order').serialize(),
            url: '/test-submit',
            type: 'POST',
            dataType: 'json',
            success: function(berhasil) {
                console.log(berhasil);
                $('#layanan').empty();
                $('#layanan').append(berhasil);
            }
        });
    });
$('body').on('click','input:radio[name="pilih-layanan"]',function(){
    // console.log('masuk layanan')
    var hargaKirim = $(this).val();
    $('#ongkir').val(hargaKirim);
});
$('select[name="provinsi_asal"]').on('change', function(){
    console.log('opopop');
    
        let provinsiId = $(this).val();
        if(provinsiId){
            $.ajax({
                url: '/provinsi/'+provinsiId+'/kota',
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    // $('ul[data-value="kota_asal"]').parents(".list").empty();
                    $('select[name="kota_asal"]').empty();
                    $.each(data, function(key,value){
                        $('select[name="kota_asal"]').append('<option value="'+key+'">'+value+'</option>');
                    });
                }
            });
        }else{
            $('select[name="kota_asal"]').empty();
        }
    });
    $('select[name="provinsi_tujuan"]').on('change', function(){
        let provinsiId = $(this).val();
        if(provinsiId){
            $.ajax({
                url: '/provinsi/'+provinsiId+'/kota',
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('select[name="kota_tujuan"]').empty();
                    $.each(data, function(key,value){
                        $('select[name="kota_tujuan"]').append('<option value="'+key+'">'+value+'</option>');
                    });
                }
            });
        }else{
            $('select[name="kota_tujuan"]').empty();
        }
    });
</script>
@yield('js')
</body>
</html>