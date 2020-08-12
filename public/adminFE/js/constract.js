$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: "data-tree",
        success: function(nodes) {
            // OrgChart.templates.belinda.node = '<circle cx="90" cy="90" r="90" fill="#009688" stroke-width="1" stroke="#1C1C1C"></circle>';
            OrgChart.templates.belinda.img_0 = '<clipPath id="ulaImg">' + '<circle cx="90" cy="45" r="40"></circle>' + '</clipPath>' + '<image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="public/img_person/{val}" x="50" y="5" width="80" height="80">' + '</image>';
            for (var i = 0; i < nodes.length; i++) {
                var node = nodes[i];
                // console.log(node.tinhtrang);
                switch (node.tinhtrang) {
                    case "Chết":
                        node.tags = ["dead"];
                        break;
                    case "Sống":
                        node.tags = ["live"];
                        break;
                }
            }









            var editForm = function() {
                this.nodeId = null;
            };

            editForm.prototype.init = function(obj) {
                var that = this;
                this.obj = obj;
                this.editForm = document.getElementById("editForm");
                this.nameInput = document.getElementById("name");

                this.maleInput = document.getElementById("male");
                this.femaleInput = document.getElementById("female");

                this.liveInput = document.getElementById("live");
                this.deadInput = document.getElementById("dead");
                this.startInput = document.getElementById("start");
                this.endInput = document.getElementById("end");
                this.imageInput = document.getElementById("image");
                this.titleInput = document.getElementById("title");

                this.cancelButton = document.getElementById("cancel");
                this.saveButton = document.getElementById("save");

                this.cancelButton.addEventListener("click", function() {
                    that.hide();
                });

                this.saveButton.addEventListener("click", function() {

                    var node = chart.get(that.nodeId);
                    node.hoten = that.nameInput.value;
                    node.ngaysinh = that.startInput.value;
                    node.tieusu = that.titleInput.value;
                    // node.hinhanh = that.image.value;

                    if (document.getElementById("male").checked == true)
                        node.gioitinh = "Nam";
                    else
                        node.gioitinh = "Nữ";

                    if (document.getElementById("live").checked == true) {
                        node.tinhtrang = "Sống";
                    } else {
                        node.tinhtrang = "Chết";
                        node.ngaymat = that.endInput.value;
                    }
                    chart.updateNode(node);
                    $.ajax({
                        url: 'edit-tree/' + that.nodeId,
                        type: 'post',
                        data: node,
                        success: function(s) {
                            console.log(s);
                        }
                    });
                    that.hide();
                });



            };

            editForm.prototype.show = function(nodeId) {

                this.nodeId = nodeId;

                var left = document.body.offsetWidth / 2 - 150;
                this.editForm.style.display = "block";
                this.editForm.style.left = left + "px";
                var node = chart.get(nodeId);

                this.nameInput.value = node.hoten;
                this.startInput.value = node.ngaysinh;
                this.endInput.value = node.ngaymat;
                this.titleInput.value = node.tieusu;
                // this.imageInput.value = node.hinhanh;


                if (node.gioitinh == "Nam")
                    document.getElementById("male").checked = true;
                else
                    document.getElementById("female").checked = true;
                $("#dead").click(function() {
                    $("#ngaymat").show();
                });
                $("#live").click(function() {
                    $("#ngaymat").hide();
                });

                if (node.tinhtrang == "Sống") {
                    document.getElementById("live").checked = true;
                    $("#live").ready(function() {
                        $("#ngaymat").hide();
                    });
                } else {
                    document.getElementById("dead").checked = true;
                    $("#live").ready(function() {
                        $("#ngaymat").show();
                    });
                }




            };

            editForm.prototype.hide = function(showldUpdateTheNode) {
                this.editForm.style.display = "none";
            };
            console.log(nodes);
            var chart = new OrgChart(document.getElementById("orgchart"), {

                // tags: {
                //     dead: {
                //         node: node.fill = '#000000',
                //     }
                // },

                mouseScrool: OrgChart.action.scroll,
                enableDragDrop: true,
                template: "belinda",
                enableSearch: true,
                searchFields: ["hoten", "tieusu", "hinhanh", "ngaysinh", "ngaymat"],
                toolbar: {
                    zoom: true,
                    fit: true
                },
                nodeBinding: {
                    field_0: "hoten",
                    field_1: "tinhtrang",
                    img_0: "hinhanh",
                },


                editUI: new editForm(),
                nodeMenu: {
                    edit: { text: "Sửa" },
                    add: { text: "Thêm" },
                    remove: { text: "Xóa" }
                },
                nodes: nodes
            });








            chart.nodeMenuUI.on('show', function(sender, args) {
                var len = nodes.length;
                for (i = 0; i < len; i++) {
                    // console.log(args.firstNodeId);
                    // console.log(nodes[i].pid);
                    if (nodes[i].pid == args.firstNodeId) {
                        args.menu = {

                            edit: {
                                text: "Sửa",
                            },

                            add: {
                                text: "Thêm",
                            },
                        }
                        break;
                    } else {
                        args.menu = {

                            edit: {
                                text: "Sửa",
                            },

                            add: {
                                text: "Thêm",
                            },

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

                    }
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