$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: "data-tree",
        // dataType:"json",	
        success: function(msg) {
            // console.log('sdsd');
            OrgChart.templates.rony.img_0 =
                '<clipPath id="ulaImg">' +
                '<circle cx="90" cy="160" r="60"></circle>' +
                '</clipPath>' +
                '<image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="public/img_person/{val}" x="30" y="100" width="120" height="120">' +
                '</image>';
            var chart = new OrgChart(document.getElementById("orgchart"), {
                mouseScrool: OrgChart.action.scroll,
                template: "rony",
                enableSearch: true,
                toolbar: {
                    zoom: true,
                    fit: true
                },
                nodeBinding: {
                    field_0: "hoten",
                    field_1: "tieusu",
                    img_0: "hinhanh"
                },
                nodes: msg
            });
        },
    });
});