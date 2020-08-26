<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
     <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="gia pha,website gia phả,web gia phả"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="" />
    
      <meta property="og:image" content="https://giaphanq.online/public/frontend/images/{{$meta_img}}" />
      <meta property="og:site_name" content="giaphanq.online" />
      <meta property="og:description" content="{{$meta_content}}" />
      <meta property="og:title" content="{{$meta_desc}}" />
      <meta property="og:url" content="{{$url_canonical}}" />
      <meta property="og:type" content="website" />
   
    <!-- Title -->
    <title>WEBSITE GIA PHẢ</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('public/frontend/images/core-img/favicon.ico')}}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/style1.css')}}">

</head>

<body class="hidden">
    <!-- Preloader -->
    @include('header')
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Mag Posts Area Start ##### -->
    @yield('content')
    <!-- ##### Mag Posts Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('footer')
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('public/frontend/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('public/frontend/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('public/frontend/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('public/frontend/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('public/frontend/js/active.js')}}"></script>
   <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=989952378125349&autoLogAppEvents=1" nonce="vO7b4ZDy"></script>
</body>

</html>