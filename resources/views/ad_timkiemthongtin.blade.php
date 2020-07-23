<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Awesome Family Tree application helps to record your family members information and generate relationships for your family.">
    <title>People - Awesome Family Tree</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/adminFE/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .rounded-img {
          border-radius: 150% !important;
          width: 50%;
          margin: auto;
        }
        /*===Export buttons===*/
        div.dt-buttons {
            position: relative;
            float: right;
            margin-bottom:10px;
        }
        div.dataTables_wrapper div.dataTables_filter {
            text-align: left;
        }
    </style>
</head>
<body class="app sidebar-mini rtl">

  @include('admin.menu');
  @yield('content');
    <!-- Essential javascripts for application to work-->
   
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('public/adminFE/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/adminFE/js/popper.min.js')}}"></script>
    <script src="{{asset('public/adminFE/js/bootstrap.min.js')}}"></script>
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
</body>
</html>