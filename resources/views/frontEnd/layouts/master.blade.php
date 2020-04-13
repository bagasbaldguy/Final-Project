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
    <style>
    ./** code by webdevtrick ( https://webdevtrick.com ) **/
    body {
    margin: 0;
    padding: 0;
    }
    footer{
    position: static;
    bottom: 0;
    }
    .footer-distributed{
    background-color: #292c2f;
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
    box-sizing: border-box;
    width: 100%;
    text-align: left;
    font: bold 16px sans-serif;

    padding: 55px 50px;
    margin-top: 80px;
    }
    .footer-distributed .footer-left,
    .footer-distributed .footer-center,
    .footer-distributed .footer-right{
    display: inline-block;
    vertical-align: top;
    }
    .footer-distributed .footer-left{
    width: 40%;
    }
    .footer-distributed h3{
    color:  #FE980F;
    font: normal 36px 'Arial', cursive;
    margin: 0;
    }
    .footer-distributed h3 span{
    color:  #FE980F;
    }
    .footer-distributed .footer-links{
    color:  #ffffff;
    margin: 20px 0 12px;
    padding: 0;
    }
    .footer-distributed .footer-links a{
    display:inline-block;
    line-height: 1.8;
    text-decoration: none;
    color:  inherit;
    }
    .footer-distributed .footer-company-name{
    color:  #8f9296;
    font-size: 14px;
    font-weight: normal;
    margin: 0;
    }
    .footer-distributed .footer-center{
    width: 35%;
    }
    .footer-distributed .footer-center i{
    background-color:  #33383b;
    color: #ffffff;
    font-size: 25px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    text-align: center;
    line-height: 42px;
    margin: 10px 15px;
    vertical-align: middle;
    }
    .footer-distributed .footer-center i.fa-envelope{
    font-size: 17px;
    line-height: 38px;
    }
    .footer-distributed .footer-center p{
    display: inline-block;
    color: #ffffff;
    vertical-align: middle;
    margin:0;
    }
    .footer-distributed .footer-center p span{
    display:block;
    font-weight: normal;
    font-size:14px;
    line-height:2;
    }
    .footer-distributed .footer-center p a{
    color:  #5383d3;
    text-decoration: none;;
    }
    .footer-distributed .footer-right{
    width: 20%;
    }
    .footer-distributed .footer-company-about{
    line-height: 20px;
    color:  #92999f;
    font-size: 13px;
    font-weight: normal;
    margin: 0;
    }
    .footer-distributed .footer-company-about span{
    display: block;
    color:  #ffffff;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 20px;
    }
    .footer-distributed .footer-icons{
    margin-top: 25px;
    }
    .footer-distributed .footer-icons a{
    display: inline-block;
    width: 35px;
    height: 35px;
    cursor: pointer;
    background-color:  #33383b;
    border-radius: 2px;
    font-size: 20px;
    color: #ffffff;
    text-align: center;
    line-height: 35px;
    margin-right: 3px;
    margin-bottom: 5px;
    }
    @media (max-width: 880px) {
    .footer-distributed{
        font: bold 14px sans-serif;
    }
    .footer-distributed .footer-left,
    .footer-distributed .footer-center,
    .footer-distributed .footer-right{
        display: block;
        width: 100%;
        margin-bottom: 40px;
        text-align: center;
    }
    .footer-distributed .footer-center i{
        margin-left: 0;
    }
    .main {
        line-height: normal;
        font-size: auto;
    }

    }
    </style>
</head><!--/head-->

<body>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e874c7f35bcbb0c9aad73ca/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

@include('frontEnd.layouts.header')
@section('slider')
    @include('frontEnd.layouts.slider')
@show
@yield('content')
@include('frontEnd.layouts.footer')
<script src="{{asset('frontEnd/js/jquery.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
<!-- <script src="{{asset('frontEnd/js/jquery.scrollUp.min.js')}}"></script> -->
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

<!-- Raja Ongkir Script -->
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
<!-- Raja Ongkir Script -->

<!-- disqus script -->
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://remarkable-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<!-- disqus script -->

<!-- Google analytics -->
@include('backEnd.analytics')
<!-- Google analytics -->

@yield('js')
</body>
</html>