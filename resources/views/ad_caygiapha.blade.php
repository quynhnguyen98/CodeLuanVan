<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>jChart - Real Time Organizational Chart Builder - Edit Chart</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/adminFE/css/main.css')}}">
   <link href="{{asset('public/project/assets/css/bootswatch/simplex/main.css')}}" type="text/css" rel="stylesheet">
   <link href="{{asset('public/project/assets/css/tree.css')}}" type="text/css" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('public/project/assets/plugins/colpick/css/colpick.css')}}" type="text/css" />
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	@include('admin.menu')
 @yield('content');




    <script src="{{asset('public/adminFE/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('public/adminFE/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
    

    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/sweetalert.min.js')}}"></script>
</body>

</html>