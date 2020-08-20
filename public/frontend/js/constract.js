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
           
            var chart = new OrgChart(document.getElementById("orgchart"), {
                mouseScrool: OrgChart.action.none,
                template: "rony",
                enableSearch: true,
                searchFields: ["hoten", "tinhtrang", "hinhanh", "ngaysinh", "ngaymat","gioitinh"],
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
            
           
            
           

        },
    });
});