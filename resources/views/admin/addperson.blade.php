@extends('ad_themtv')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i> THÊM THÀNH VIÊN</h1>
            <p>Add person to include in our family tree.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Add Person</a></li>
        </ul>
    </div>

    <form action="{{URL::to('/save-person')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="tile mt-4 mb-4">
            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <h4 class="card-header text-white bg-info">
                            THÔNG TIN CÁ NHÂN
                            <span class="pull-right"><button class="btn btn-secondary" type="button">Quay lại danh
                                    sách</button></span>
                        </h4>
                        <div class="card-body">
                            <input name="__RequestVerificationToken" type="hidden"
                                value="-Tjtj3rvfWRi1-lKMVSSxn-JpR1wu7WgI-XqsZ2RMsBhcJCZdlDKNLG0_ApUlRxxwaAporj49f9simfmLu7Rg830_gTgoRjR_v31j0q7xd41" />


                            <div class="row">
                                <div class="col-lg-4 pt-1 pb-1">
                                    <img id="photo"
                                        style="height: 320px;width: 100%;margin:0px;padding: 2px;display:block;border: 3px solid #cccccc;"
                                        src="public/adminFE/images/no-image.jpg" alt="Photo">
                                    <input class="form-control d-none" id="PhotoFileSelector" name="PhotoFileSelector"
                                        type="file" value=""/>
                                    <input id="PhotoFileName" name="PhotoFileName" type="hidden" value="" />
                                </div>
                                <div class="col-lg-8">

                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <label class="control-label">Họ và tên</label>
                                                <input class="form-control" id="PersonName" name="hoten"
                                                    placeholder="Nhập họ tên" type="text" value=""/>
                                                <span class="field-validation-valid" data-valmsg-for="PersonName"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">Trạng thái</label>
                                                <div class="toggle-flip">
                                                    <label>
                                                        <input type="checkbox"><span class="flip-indecator"
                                                            data-isalive="DEAD" data-toggle-on="SỐNG"
                                                            data-toggle-off="CHẾT"></span>
                                                    </label>
                                                    <input id="IsAlive" name="IsAlive" type="hidden" value=""/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Người Thân</label>
                                                <select class="form-control" data-val="true"
                                                    data-val-number="The field FatherID must be a number." id="FatherID"
                                                    name="FatherID">
                                                    @foreach($all_thanhvien as $k)
                                                        <option value="{{$k->id}}">{{$k->hoten}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="field-validation-valid" data-valmsg-for="Cha"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Quê quán</label>
                                                <select class="form-control" data-val="true"
                                                    data-val-number="The field MotherID must be a number." id="MotherID"
                                                    name="tinh">
                                                    @foreach($tinh as $k)
                                                        <option value="{{$k->id_tinh}}">{{$k->tinh_tp}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="field-validation-valid" data-valmsg-for="MotherID"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Giới tính</label>
                                                <select class="form-control" id="Gender" name="gioitinh">
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                         {{-- <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Trạng thái hôn nhân</label>
                                                <input class="form-control" id="Occation" name="trangthai_honnhan"
                                                    placeholder="Nhập tại đây" type="text" value="" />
                                                <span class="field-validation-valid" data-valmsg-for="Occation"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Ngày sinh</label>
                                                <input class="form-control" data-val="true"
                                                    data-val-date="The field DateOfBirth must be a date."
                                                    id="DateOfBirth" name="ngaysinh" placeholder="Chọn Ngày"
                                                    type="text" value="" />
                                                <span class="field-validation-valid" data-valmsg-for="DateOfBirth"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Ngày mất</label>
                                                <input name="ngaymat" type="checkbox" id="ckb" onclick="deathclick()">
                                                
                                                    <input class="form-control" data-val="true"
                                                    id="DateOfDeath" name="ngaymat" placeholder="Chọn Ngày"
                                                    type="date" value="null" disabled/>
                                                    <span class="field-validation-valid" data-valmsg-for="DateOfDeath"
                                                    data-valmsg-replace="true"></span>
                                               
                                                
                                            </div>
                                        </div>

                                    </div>

                                
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea">Tiểu sử</label>
                                <textarea class="form-control" id="editor1" rows="15" name="tieusu"></textarea>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"><i
                                    class="fa fa-fw fa-lg fa-check-circle"></i>Thêm mới</button>
                            
                                
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<script>
    function deathclick(){
        var checkBox = document.getElementById("ckb");
        var txtdate=document.getElementById("DateOfDeath");
        if(checkBox.checked==true)
            txtdate.disabled=false;
        else
        {
            txtdate.disabled=true;
            txtdate.value="null";

        }
           
    }
</script>
@endsection
