$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: "data-tree",
        // dataType:"json",	
        success: function(nodes) {
            // console.log('sdsd');
            OrgChart.templates.rony.img_0 =
                '<clipPath id="ulaImg">' +
                '<circle cx="90" cy="160" r="60"></circle>' +
                '</clipPath>' +
                '<image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="public/img_person/{val}" x="30" y="100" width="120" height="120">' +
                '</image>';
            for (var i = 0; i < nodes.length; i++) {
                var node = nodes[i];
                switch (node.tinhtrang) {
                    case "Chết":
                        node.tags = ["dead"];
                        break;
                    case "Sống":
                        node.tags = ["live"];
                        break;
                }
            }
            console.log(nodes);
            var chart = new OrgChart(document.getElementById("orgchart"), {
                mouseScrool: OrgChart.action.none,
                template: "rony",
                enableSearch: true,
                toolbar: {
                    zoom: true,
                    fit: true,
                },
                nodeBinding: {
                    field_0: "hoten",
                    field_1: "tinhtrang",
                    img_0: "hinhanh"
                },
                nodes: nodes
            });

        },
    });
});