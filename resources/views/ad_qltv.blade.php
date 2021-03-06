<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description"
        content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
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
    <meta property="og:description"
        content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Invoice - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/adminFE/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
          "lengthMenu": [[6, 10, 20, 40, -1], [6, 10, 20, 40, "All"]],
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
                     console.log(viewModel);
                  $.ajax({
                      type: "GET",
                      url: "xoa-thanh-vien/"+viewModel.id,
                      data: JSON.stringify(viewModel),
                      contentType: "application/json; charset=utf-8",
                      success: function (data) {
                       
                          var tableRow = $button.closest('tr');
                          tableRow.remove();
                          swal("Deleted!", "Selected person has been deleted.", "success");
                      }
                  });
                 
              } else {
                  swal("Hủy Thao tác", "Xóa Thành viên không thành công", "error");
              }
          });
      });
      $(document).on("click", ".DeletePost", function () {
          var $button = $(this);
          swal({
              title: "Bạn có chắc muốn xóa?",
              text: "Thành viên này sẽ không phục hồi lại được!",
              type: "warning",
              showCancelButton: true,
              confirmButtonText: "Có, xóa tin tức này!",
              cancelButtonText: "Không, hủy thao tác!",
              closeOnConfirm: false,
              closeOnCancel: false
          }, function (isConfirm) {
              if (isConfirm) {
                  var postID = $button.closest("tr").find("#PostID").val();
                  var viewModel1 = {
                      id: parseInt(postID)
                  };
                     console.log(viewModel1);
                  $.ajax({
                      type: "GET",
                      url: "xoa-tin-tuc/"+viewModel1.id,
                      data: JSON.stringify(viewModel1),
                      contentType: "application/json; charset=utf-8",
                      success: function (data) {
                       
                          var tableRow = $button.closest('tr');
                          tableRow.remove();
                          swal("Deleted!", "Selected post has been deleted.", "success");
                      }
                  });
                 
              } else {
                  swal("Hủy Thao tác", "Xóa Tin Tức không thành công", "error");
              }
          });
      });
      $(document).on("click", ".DeleteImage", function () {
          var $button = $(this);
          swal({
              title: "Bạn có chắc muốn xóa?",
              text: "Hình ảnh này sẽ không phục hồi lại được!",
              type: "warning",
              showCancelButton: true,
              confirmButtonText: "Có, xóa hình này!",
              cancelButtonText: "Không, hủy thao tác!",
              closeOnConfirm: false,
              closeOnCancel: false
          }, function (isConfirm) {
              if (isConfirm) {
                  var ImageID = $button.closest("tr").find("#ImageID").val();
                  var viewModel1 = {
                      id: parseInt(ImageID)
                  };
                     console.log(viewModel1);
                  $.ajax({
                      type: "GET",
                      url: "xoa-hinh-anh/"+viewModel1.id,
                      data: JSON.stringify(viewModel1),
                      contentType: "application/json; charset=utf-8",
                      success: function (data) {
                       
                          var tableRow = $button.closest('tr');
                          tableRow.remove();
                          swal("Deleted!", "Selected image has been deleted.", "success");
                      }
                  });
                 
              } else {
                  swal("Hủy Thao tác", "Xóa hình không thành công", "error");
              }
          });
      });
      $(document).on("click", ".DeleteComment", function () {
          var $button = $(this);
          swal({
              title: "Bạn có chắc muốn xóa?",
              text: "Bình luận này sẽ không phục hồi lại được!",
              type: "warning",
              showCancelButton: true,
              confirmButtonText: "Có, xóa bình luận này!",
              cancelButtonText: "Không, hủy thao tác!",
              closeOnConfirm: false,
              closeOnCancel: false
          }, function (isConfirm) {
              if (isConfirm) {
                  var CommentID = $button.closest("tr").find("#CommentID").val();
                  var viewModel1 = {
                      id: parseInt(CommentID)
                  };
                     console.log(viewModel1);
                  $.ajax({
                      type: "GET",
                      url: "xoa-comment/"+viewModel1.id,
                      data: JSON.stringify(viewModel1),
                      contentType: "application/json; charset=utf-8",
                      success: function (data) {
                       
                          var tableRow = $button.closest('tr');
                          tableRow.remove();
                          swal("Deleted!", "Selected image has been deleted.", "success");
                      }
                  });
                 
              } else {
                  swal("Hủy Thao tác", "Xóa hình không thành công", "error");
              }
          });
      });
            $(document).ready(function() {
            $('#sampleTable').dataTable( {
            "lengthMenu": [[5, 10, 30, -1], [5, 10, 30, "All"]]
            } );
            } );
    </script>
</body>

</html>