$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: "data-tree",
        success: function(msg) {
         
            OrgChart.templates.belinda.node = '<circle cx="90" cy="90" r="90" fill="#009688" stroke-width="1" stroke="#1C1C1C"></circle>';
            OrgChart.templates.belinda.img_0 = '<clipPath id="ulaImg">' + '<circle cx="90" cy="45" r="40"></circle>' + '</clipPath>' + '<image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="public/img_person/{val}" x="50" y="5" width="80" height="80">' + '</image>';
    
        
            var chart = new OrgChart(document.getElementById("orgchart"), {


                mouseScrool: OrgChart.action.scroll,
                enableDragDrop: true,
                template: "belinda",
                enableSearch: true,
                searchFields: ["hoten", "tieusu", "hinhanh"],
                toolbar: {
                    zoom: true,
                    fit: true
                },
                nodeBinding: {
                    field_0: "hoten",
                    field_1: "tinhtrang",
                    img_0: "hinhanh",
                },



                nodeMenu: {
                    edit: { text: "Sửa" },
                    add: { text: "Thêm" },
                    remove: { text: "Xóa" }
                },


                nodes: msg
            });



            chart.nodeMenuUI.on('show', function(sender, args) {


                args.menu = {
                    edit: {
                        text: "Sửa",

                    },

                    // add: {
                    //     text: "Thêm",
                    //     onClick: function(id) {

                    //         var change = chart.get(id);
                    //         console.log(change);
                    //         $.ajax({
                    //             url: 'add-tree/' + dataChange,
                    //             type: 'post',
                    //             data: $('#orgchart').serializeArray(),
                    //             success: function(s) {
                    //                 alert(s);
                    //             }
                    //         });
                    //     }
                    // },

                    remove: {
                        text: "Xóa",
                        onClick: function(id) {
                            chart.removeNode(id),
                                $.ajax({
                                    url: 'remove-tree/' + id,
                                    type: 'get',
                                    data: $('#orgchart').serializeArray(),
                                    success: function(s) {
                                        console.log(s);
                                    }
                                });
                        }
                    },

                }

            });



            chart.on('drop', function(sender, draggedid, droppedid) {
                $.ajax({
                    url: 'change-data-tree/' + draggedid + '/' + droppedid,
                    type: 'post',
                    data: $('#orgchart').serializeArray(),
                    success: function(s) {
                        console.log(s);
                    }
                });
            });

        },
    });
});