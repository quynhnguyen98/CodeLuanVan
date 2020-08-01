<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <title>Calendar - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/adminFE/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/adminFE/css/fullcalendar.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
   
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
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
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/jquery-ui.custom.min.js')}}"></script>
    {{-- <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/fullcalendar.min.js')}}"></script> --}}







    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" /> --}}
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" ></script> --}}
    <script src="{{asset('public/adminFE/js/fullcalendar.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>








<script>

  $(document).ready(function () {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events:"fullcalendar",
            
            displayEventTime: true,
            editable: true,
            
            eventRender: function (event, element, view) {
                
                if (event.allDay == 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var title = prompt('Nhập tên sự kiện:');
                var noidung = prompt('Nhập nội dung sự kiện');
                
                

                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    $.ajax({
                        url: "fullcalendar/create",
                        data: {'title' : title, 'start': start,'noidung':noidung},
                        type: "POST",
                       
                        success: function (data) {
                            displayMessage("Thêm thành công");
                        }
                    });
                    calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            allDay: allDay
                        },
                        true
                    );
                }
                calendar.fullCalendar('unselect');
            },

            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
              
                $.ajax({
                    url: 'fullcalendar/update',
                    data: {'title': event.title, 'start': start, 'id': event.id},
                    type: "POST",
                    success: function (response) {
                        displayMessage("Cập nhật thành công");
                    }
                });
            },
            eventClick: function (event) {
                var deleteMsg = confirm("Bạn có muốn chắc xóa sự kiện này?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url:'fullcalendar/delete',
                        data: {'id': event.id},
                        success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("Xóa thành công");
                            }
                        }
                    });
                }
            }

        });
    });

    function displayMessage(message) {
        $(".response").html("<div class='success'>"+message+"</div>");
        setInterval(function() { $(".success").fadeOut(); }, 1000);
    }
    
</script>
  </body>
</html>