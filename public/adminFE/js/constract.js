 $(document).ready(function() {
     $.ajax({
         type: 'GET',
         url: "data-tree",
         // dataType:"json",	
         success: function(msg) {
             console.log(msg);
             var chart = new OrgChart(document.getElementById("orgchart"), {
                 mouseScrool: OrgChart.action.scroll,
                 enableDragDrop: true,
                 template: "belinda",
                 enableSearch: true,
                 toolbar: {
                     zoom: true,
                     fit: true
                 },


                 nodeBinding: {
                     field_0: "hoten",
                     field_1: "tieusu",
                     img_0: "hinh "
                 },
                 // nodes:[ 
                 //     // {"id":1,"namexcvzx":"Suu","gioitinh":"Nữ","ngaysinh":"2020-06-23","ngaymat":"2017-10-27","hinh":"","title":"zxc","id_tinh":1,"tinhtrang":"Sống","id_nguongoc":1,"moiquanhe":"Cha","nhanh":"1-2"},
                 //     //     {"id":2,"name":"Suu","gioitinh":"Nữ","ngaysinh":"2020-06-23","ngaymat":"2017-10-27","hinh":"","title":"zxc","id_tinh":1,"tinhtrang":"Sống","id_nguongoc":1,"pid":1,"moiquanhe":"Cha","nhanh":"1-2"},
                 //     //     {"id":3,"name":"Dan","gioitinh":"Nam","ngaysinh":"2020-06-10","ngaymat":"2020-06-07","hinh":"","title":"xbzcv","id_tinh":1,"tinhtrang":"Sống","id_nguongoc":3,"pid":1,"moiquanhe":"Cha","nhanh":"1-3"},
                 //     //     {"id":16,"name":"Tuat","gioitinh":"Nam","ngaysinh":"2020-07-01","ngaymat":"2020-07-26","hinh":"Capture.PNG","title":"bsdcfbdfbsd","id_tinh":1,"tinhtrang":"Sống","id_nguongoc":13,"pid":1,"moiquanhe":"Cha","nhanh":null},
                 //     //     {"id":4,"name":"Meo","gioitinh":"Nữ","ngaysinh":"2020-06-23","ngaymat":"2020-07-19","hinh":"","title":"zxc","id_tinh":1,"tinhtrang":"Chết","id_nguongoc":4,"pid":2,"moiquanhe":"Cha","nhanh":"1-2-4"},
                 //     //     {"id":5,"name":"Thin","gioitinh":"Nữ","ngaysinh":"2020-06-23","ngaymat":null,"hinh":"","title":"zxc","id_tinh":1,"tinhtrang":"Sống","id_nguongoc":5,"pid":2,"moiquanhe":"Cha","nhanh":"1-2-5"},
                 //     {"id":2,"hoten":"Suu","gioitinh":"Nữ","ngaysinh":"2020-06-23","ngaymat":"2017-10-27","hinh":"Screenshot from 2020-07-13 21-20-40.png","tieusu":"zxc","id_tinh":1,"tinhtrang":"Sống","pid":1,"moiquanhe":"Cha","nhanh":"1-2"},
                 //     {"id":3,"hoten":"Dan","gioitinh":"Nam","ngaysinh":"2020-06-10","ngaymat":"2020-06-07","hinh":"Screenshot from 2020-07-13 21-20-40.png","tieusu":"xbzcv","id_tinh":1,"tinhtrang":"Sống","pid":1,"moiquanhe":"Cha","nhanh":"1-3"},
                 //     {"id":4,"hoten":"Meo","gioitinh":"Nữ","ngaysinh":"2020-06-23","ngaymat":null,"hinh":"Screenshot from 2020-07-13 21-20-40.png","tieusu":"zxc","id_tinh":1,"tinhtrang":"Chết","pid":2,"moiquanhe":"Cha","nhanh":"1-2-4"},
                 //     {"id":5,"hoten":"Thin","gioitinh":"Nữ","ngaysinh":"2020-06-23","ngaymat":null,"hinh":"Screenshot from 2020-07-13 21-20-40.png","tieusu":"zxc","id_tinh":1,"tinhtrang":"Sống","pid":2,"moiquanhe":"Cha","nhanh":"1-2-5"},    
                 // ]

                 nodes: msg
             });
         },
     });
 });