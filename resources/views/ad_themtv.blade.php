

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Awesome Family Tree application helps to record your family members information and generate relationships for your family.">
    <title>Add Person - Awesome Family Tree</title>
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
    <!-- Navbar-->
    @include('admin.menu');
    @yield('content');

    <!-- Essential javascripts for application to work-->
    <script src="{{asset('public/adminFE/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/adminFE/js/popper.min.js')}}"></script>
    <script src="{{asset('public/adminFE/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/adminFE/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('public/adminFE/js/plugins/pace.min.js')}}"></script>

    <script>
        if ($("link[href='/content/css/main-rtl.css']").length) {
            $('.pull-right').removeClass("pull-right").addClass("pull-left");
        }
        $(document).on("click", ".switch-language", function () {
            var code = $(this).data("lang");
            var viewModel = {
                code: code
            };
            $.ajax({
                type: "POST",
                url: "/Home/GetStyleSheet",
                data: JSON.stringify(viewModel),
                contentType: "application/json; charset=utf-8",
                success: function (result) {
                    window.location.href = "/";
                }
            });
        });
    </script>

    
    <!-- Page specific javascripts-->
<script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('editor1',{
    filebrowserBrowseUrl: '{{ asset('./public/ckfinder/ckfinder.html') }}',  
    filebrowserImageBrowseUrl: '{{ asset('./public/ckfinder/ckfinder.html?type=Images') }}',
    filebrowserFlashBrowseUrl: '{{ asset('./public/ckfinder/ckfinder.html?type=Flash') }}',
    filebrowserUploadUrl: '{{ asset('./public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
    filebrowserImageUploadUrl: '{{ asset('./public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
    filebrowserFlashUploadUrl: '{{ asset('./public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
});
</script>
<script type="text/javascript" src="{{asset('public/adminFE/js/plugins/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/adminFE/js/plugins/bootstrap-datepicker.min.js')}}"></script>

<script type="text/javascript">
    $('#FatherID').select2();
    $('#MotherID').select2();
    $('#Gender').select2();
    $('#DateOfBirth').datepicker({
        format: "yyyy-MM-dd",
        autoclose: true,
        todayHighlight: true
    });
    $('.back-button').click(function () {
        window.location.href = "/Person";
    })

    var isAlive = $('#IsAlive').val();
    var toggleAlive = "";
    var onloadAlive = false;

    $(".flip-indecator").click(function () {
        if (!onloadAlive) {
            if (toggleAlive == "DEAD") {
                $(this).attr("data-isalive", "DEAD");
                $("#IsAlive").val(false);
                toggleAlive = "ALIVE";

            } else if (toggleAlive == "ALIVE") {
                $(this).attr("data-isalive", "ALIVE");
                $("#IsAlive").val(true);
                toggleAlive = "DEAD";
            }
        }
        onloadAlive = false; //always set to false
    });

    if (isAlive == "True") {
        $("#IsAlive").val(true);
        toggleAlive = "DEAD";
        onloadAlive = true;
        $('.flip-indecator').trigger('click');
    } else {
        $("#IsAlive").val(false);
        toggleAlive = "ALIVE";
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo').attr('src', e.target.result);
            }

            var filename = input.files[0].name;
            $("#PhotoFileName").attr('value', filename);

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#PhotoFileSelector").click(function () {
        readURL(this);
    });
    $("#PhotoFileSelector").change(function () {
        readURL(this);
    });
    $('#photo').click(function (e) {
        $("#PhotoFileSelector").trigger("click");
    });
</script>

    <!-- Data table plugin-->
    

</body>
</html>
