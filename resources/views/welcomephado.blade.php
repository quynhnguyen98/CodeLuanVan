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
    <script src="{{asset('public/frontend/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('public/frontend/js/active.js')}}"></script>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=989952378125349&autoLogAppEvents=1"
        nonce="fYVhDFeB"></script>

    {{-- <script src="{{asset('public/adminFE/js/jquery-3.3.1.min.js')}}"></script> --}}
    {{-- <script src="{{asset('public/adminFE/js/popper.min.js')}}"></script> --}}
    {{-- <script src="{{asset('public/adminFE/js/bootstrap.min.js')}}"></script> --}}
    <script src="{{asset('public/adminFE/js/main.js')}}"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('public/adminFE/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/jquery-ui.custom.min.js')}}"></script>
    <script src="{{asset('public/adminFE/js/fullcalendar.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/orgchart.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/constract.js')}}"></script>
</body>

</html>