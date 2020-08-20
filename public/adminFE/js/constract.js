
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
                searchFields: ["hoten", "tinhtrang", "hinhanh", "ngaysinh", "ngaymat","gioitinh"],
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





            
            chart.on("renderbuttons", function(sender, args){
                var pnode = sender.getNode(args.node.pid);     
                if (!pnode)  return;
                var t = OrgChart.t(args.node.templateName);
                args.html += '<g control-expcoll-up-id="{id}" transform="matrix(1,0,0,1,{x},{y})"  style="cursor:pointer;">'
                    .replace('{id}', args.node.id)
                    .replace('{x}', args.node.x + (args.node.w / 2) - (t.expandCollapseSize / 2))
                    .replace('{y}', args.node.y - t.expandCollapseSize / 2);
                args.html += !args.node.parent ? t.plus : t.minus;        
                args.html += OrgChart.grCloseTag;
                
            });
        
            chart.on("redraw", function(sender){
                var upElements = document.querySelectorAll('[control-expcoll-up-id]');
                for(var i = 0; i < upElements.length; i++){
                    upElements[i].addEventListener('click', function(){
                        var id = this.getAttribute('control-expcoll-up-id');
                        var node = sender.getNode(id);
                        var pnode = sender.getNode(node.pid);
                        
                        if (pnode && !node.parent){
                            sender.config.roots = [pnode.id];
                            // sender.center(node.id, {vertical: false, horizontal: false, parentState: OrgChart.COLLAPSE_PARENT_SUB_CHILDREN_EXCEPT_CLICKED, rippleId: node.id});
                            sender.draw(OrgChart.action.update, {id: node.id});
        
                        }
                        else if (node.parent){
                            sender.config.roots = [node.id];
                            sender.draw();
                        }
                    })
                }
            });



            chart.on('searchclick', function (sender, nodeId) {
                console.log(nodeId);
                // chart.zoom(5, [20,20]);
                chart.config.roots=[nodeId]
             });  
                
    
          
            // chart.on('add', function (sender, node) {
            //     chart.addNode(node);
            //     console.log(node);
            //     $.ajax({
            //         url: 'add-tree/'+node.pid,
            //         type: 'get',
            //         data: $('#orgchart').serializeArray(),
            //         success: function(s) {
            //             console.log(s);
            //         }
            //     });
            // });  





            chart.nodeMenuUI.on('show', function(sender, args) {
                var len = nodes.length;
                for (i = 0; i < len; i++) {
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