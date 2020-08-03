<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="description" content="Website Gia phả">
    <meta name="keywords" content="gia pha,website gia phả,web gia phả" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>WEBSITE GIA PHẢ</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('public/frontend/images/core-img/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/adminFE/css/fullcalendar.css')}}">

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

    <script>
        $(document).ready(function () {
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              var calendar = $('#calendar').fullCalendar({
                  editable: false,
                  events:"fullcalendar",
                  
                  displayEventTime: true,
                  editable: false,
                  
                  eventRender: function (event, element, view) {
                      
                      if (event.allDay == 'true') {
                          event.allDay = true;
                      } else {
                          event.allDay = false;
                      }
                  },
                  selectable: false,
                  selectHelper: false,
              });
          });
      
          function displayMessage(message) {
              $(".response").html("<div class='success'>"+message+"</div>");
              setInterval(function() { $(".success").fadeOut(); }, 1000);
          }
          
    </script>
    <script>
      $(document).ready(function() {
  
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
   
    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
    </script>

</body>

</html>