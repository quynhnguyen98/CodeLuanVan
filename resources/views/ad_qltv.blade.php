<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Invoice - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/adminFE/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body class="app sidebar-mini">
    @include('admin.menu');
    @yield('content');
   
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
    

    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/sweetalert.min.js')}}"></script>
     <script type="text/javascript">
      var oTable = $('#peopleTable').DataTable({
          dom: 'Blfrtip',
          //"searching": false,
          "lengthMenu": [[10, 20, 25, 50, -1], [10, 20, 25, 50, "All"]],
          "DisplayLength": 5,
      });
      $(".dataTables_filter").hide(); //hide search
  
      $('.searchbox-input').keyup(function () {
          oTable.search($(this).val()).draw();
      });
      
  
      $(document).on("click", ".DeletePerson", function () {
          var $button = $(this);
          swal({
              title: "Bạn có chắc muốn xóa?",
              text: "Thành viên này sẽ không phục hồi lại được!",
              type: "warning",
              showCancelButton: true,
              confirmButtonText: "Có, xóa thành viên vày!",
              cancelButtonText: "Không, hủy thao tác!",
              closeOnConfirm: false,
              closeOnCancel: false
          }, function (isConfirm) {
              if (isConfirm) {
                  var personID = $button.closest("tr").find("#PersonID").val();
                  var viewModel = {
                      id: parseInt(personID)
                  };
                  $.ajax({
                      type: "POST",
                      url: "/Person/Delete",
                      data: JSON.stringify(viewModel),
                      contentType: "application/json; charset=utf-8",
                      success: function (data) {
                          var tableRow = $button.closest('tr');
                          tableRow.remove();
  
                          swal("Deleted!", "Selected person has been deleted.", "success");
                      }
                  });
                  //var tableRow = $button.closest('tr');
                  //tableRow.addClass("bg-dark");
                  //tableRow.find('td').fadeOut('slow',
                  //    function () {
                  //        tableRow.remove();
                  //    }
                  //);
              } else {
                  swal("Hủy Thao tác", "Xóa Thành viên không thành công", "error");
              }
          });
      });
      </script>
  </body>
</html>