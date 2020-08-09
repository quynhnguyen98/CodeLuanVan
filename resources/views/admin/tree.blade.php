@extends('ad_caygiapha')
@section('content')
<main class="app-content">

    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i> Cây Gia Phả</h1>
            <p>All person information will be listed here.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">tree-family</a></li>
        </ul>
    </div>

    <div class="tile">
        <div class="tile-body">
                
    <div id="editForm" style="display:none; text-align:left; position:absolute; border: 1px solid #aeaeae;width:500px;background-color:#00635a;z-index:10000; ">
        <div style="padding: 10px 0 10px 30px; background-color:#222d32; color: #ffffff;">Sửa thông tin</div>
        <div>
            <div style="padding: 10px 0 5px 30px;">
                <label style="color:#ffffff; width:50px; display:inline-block;" for="name">Họ tên</label>
                <input style="background-color:#ffffff" id="name" value="" />
            </div>
            <div style="padding: 5px 0 10px 30px;">
                <label style="color:#ffffff; width:50px; display:inline-block;" for="gender">Giới tính</label>
                <input type="radio" id="male" name="gender" value="Nam">
                <label for="male" style="color:#ffffff">Nam</label>
                <input type="radio" id="female" name="gender" value="Nữ">
                <label for="female"style="color:#ffffff">Nữ</label><br>
            </div>
            <div style="padding: 10px 0 5px 30px;">
                <label style="color:#ffffff; width:50px; display:inline-block;" for="start">Ngày sinh</label>
                <input type="date" style="background-color:#ffffff" id="start" value="" />
            </div>
            <div style="padding: 5px 0 10px 30px;">
                <label style="color:#ffffff; width:50px; display:inline-block;" for="Alive">Tình trạng</label>
                <input type="radio" id="live" name="Alive" value="Sống">
                <label for="live" style="color:#ffffff">Sống</label>
                <input type="radio" id="dead" name="Alive" value="Chết">
                <label for="dead"style="color:#ffffff">Chết</label><br>
            </div>
            <div style="padding: 10px 0 5px 30px;" id="ngaymat">
                <label style="color:#ffffff; width:50px; display:inline-block;" for="dead">Ngày mất</label>
                <input  type="date" style="background-color:#ffffff" id="end" value="" />
            </div>
            <div style="padding: 10px 0 5px 30px;">
                <label style="color:#ffffff; width:50px; display:inline-block;" for="image">Hình ảnh</label>
                <input type="file" id="image" value="" />
                
                {{-- <img src="public/img_person/" alt=""> --}}
            </div>
            <div style="padding: 10px 0 5px 30px;">
                <label style="color:#ffffff; width:50px; display:inline-block;" for="title">Tiểu sử</label>
               <textarea name="title" id="title" cols="30" rows="10"></textarea>
            </div>

            <div style="padding: 5px 0 15px 30px;">
                <button style="width:108px;" id="cancel">Hủy</button>
                <button style="width:108px;" id="save">Lưu</button>
            </div>
        </div>
    </div>


            <div style="width:100%; height:700px;" id="orgchart"/>
    
            <div id="tree"/>

        </div>
    </div>

</main>
@endsection