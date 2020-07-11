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
    <script src="{{asset('public/adminFE/js/jquery-3.2.1.min.js')}}"></script>
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
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/adminFE/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    {{-- <script type="text/javascript">
    $('#peopleTable').DataTable();

    $(document).ready(function (e) {

        //skip case sensitive in contains function
        jQuery.expr[':'].Contains = function (a, i, m) {
            return jQuery(a).text().toUpperCase()
                .indexOf(m[3].toUpperCase()) >= 0;
        };

        var totalMale = $('.cards-container').find(".gender:contains(Male)").length;
        var totalFemale = $('.cards-container').find(".gender:contains(Female)").length;
        var totalPeople = $('.cards-container').find(".card-header").length;
        $("#totalMale").html("Male: " + totalMale);
        $("#totalFemale").html("Female: " + totalFemale);
        $("#totalPeople").html("People: " + totalPeople);
        $("#filteredPeople").html("Filtered: 0");
        $('#search_param').val('contains');

        $(".searchbox-input").on("keyup", function () {
            var value = $(this).val();
            if (value == "") {
                $('.cards-container').find(".card-header").closest('.card').parent().css('display', 'block');
                $('.cards-container').find(".card-header").closest('.card').removeClass('filtered');
                $("#filteredPeople").html("Filtered: 0");

                $("#totalMale").html("Male: " + totalMale);
                $("#totalFemale").html("Female: " + totalFemale);

            } else {
                $('.cards-container').find(".card-header").closest('.card').parent().css('display', 'block');
                $('.cards-container').find(".card-header").closest('.card').removeClass('filtered');

                var param = $("#search_param").val();

                if (param == "contains") {
                    $('.cards-container').find(".card-header:not(:Contains(" + value + "))").closest('.card').parent().css('display', 'none');
                    $('.cards-container').find(".card-header:not(:Contains(" + value + "))").closest('.card').addClass('filtered');

                }
                var filteredPeople = totalPeople - $('.cards-container').find(".filtered").length;
                $("#filteredPeople").html("Filtered: " + filteredPeople);

                var filteredMale = $('.cards-container').find(".card-header:Contains(" + value + ")").closest('.card').find(".gender:contains(Male)").length;
                var filteredFemale = $('.cards-container').find(".card-header:Contains(" + value + ")").closest('.card').find(".gender:contains(Female)").length;

                $("#totalMale").html("Male: " + filteredMale);
                $("#totalFemale").html("Female: " + filteredFemale);
            }
        });

        $('.clear-filter').click(function (e) {
            $(".searchbox-input").val("");
            $(".searchbox-input").trigger("keyup");
        });

        $('.search-panel .dropdown-menu').find('a').click(function (e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#", "");
            var concept = $(this).text();
            $("#filterBy").html("Filter by: " + concept);
            //$('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
        });
    });
    </script> --}}

</body>
</html>