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
                    node.title = that.titleInput.value;

                    chart.updateNode(node);
                    that.hide();
                });
            };

            editForm.prototype.show = function(nodeId) {
                this.nodeId = nodeId;

                var left = document.body.offsetWidth / 2 - 150;
                this.editForm.style.display = "block";
                this.editForm.style.left = left + "px";
                var node = chart.get(nodeId);
                console.log(node);
                this.nameInput.value = node.hoten;
                this.startInput.value = node.ngaysinh;
                this.endInput.value = node.ngaymat;
                this.titleInput.value = node.tieusu;

            };

            editForm.prototype.hide = function(showldUpdateTheNode) {
                this.editForm.style.display = "none";
            };

            var chart = new OrgChart(document.getElementById("orgchart"), {


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


                nodes: msg
            });







            chart.nodeMenuUI.on('show', function(sender, args) {


                args.menu = {

                    edit: {
                        text: "Sửa",
                        // onClick: function(id) {
                        //     chart.removeNode(id),
                        //         $.ajax({
                        //             url: 'edit-tree/' + id,
                        //             type: 'post',
                        //             data: $('#orgchart').serializeArray(),
                        //             success: function(s) {
                        //                 console.log(s);
                        //             }
                        //         });
                        // }


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