<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="http://localhost/CodeLuanVan/" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    {{-- <meta property="og:site_name" content="http://localhost/CodeLuanVan/" />
    <meta property="og:description" content="{{$tintuc[0]->noidung_tt}}" />
    <meta property="og:title" content="{{$tintuc[0]->tieude}}" /> --}}
    {{-- <meta property="og:url" content="{{$url_canonical}}" /> --}}
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
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=989952378125349&autoLogAppEvents=1" nonce="fYVhDFeB"></script>
</body>

</html>