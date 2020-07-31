<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Website Gia phả">
    <meta name="keywords" content="gia pha,website gia phả,web gia phả"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
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
    {{-- <script src="{{asset('public/frontend/js/plugins/plugins.js')}}"></script> --}}
    <!-- Active js -->
    <script src="{{asset('public/frontend/js/active.js')}}"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=989952378125349&autoLogAppEvents=1" nonce="fYVhDFeB"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/orgchart.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/constract.js')}}"></script>
</body>

</html>