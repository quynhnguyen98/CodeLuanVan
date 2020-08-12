<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>jChart - Real Time Organizational Chart Builder - Edit Chart</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/adminFE/css/main.css')}}">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
   @include('admin.menu');
 @yield('content');




  

  
    

    {{-- <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/jquery.dataTables.min.js')}}"></script> --}}
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/vfs_fonts.js')}}"></script>
    {{-- <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/dataTables.bootstrap.min.js')}}"></script> --}}
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/sweetalert.min.js')}}"></script>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/orgchart.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/constract.js')}}"></script>
</body>

</html>