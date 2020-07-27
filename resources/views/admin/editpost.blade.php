@extends('ad_themtv')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i> SỬA TIN TỨC</h1>
            <p>Add person to include in our family tree.</p>
        </div>
        
    </div>

    <form action="{{URL::to('/save-post')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="tile mt-4 mb-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <h4 class="card-header text-white bg-info">
                            Tin Tức
                            <span class="pull-right"><button class="btn btn-secondary" type="button">Quay lại danh
                                    sách</button></span>
                        </h4>
                        @foreach($tintuc as $tt)
                        <div class="card-body">
                            <input name="__RequestVerificationToken" type="hidden"
                                value="-Tjtj3rvfWRi1-lKMVSSxn-JpR1wu7WgI-XqsZ2RMsBhcJCZdlDKNLG0_ApUlRxxwaAporj49f9simfmLu7Rg830_gTgoRjR_v31j0q7xd41" />


                            <div class="row">
                                
                                <div class="col-lg-8">

                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <label class="control-label">Tiêu Đề</label>
                                                <input class="form-control" id="PersonName" name="tieude"
                                                    placeholder="Nhập tiêu đề" type="text" value="{{$tt->tieude}}"/>
                                                <span class="field-validation-valid" data-valmsg-for="PersonName"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <label class="control-label">Tiêu đề không dấu</label>
                                                <input class="form-control" id="PersonName" name="tieude"
                                                    placeholder="Nhập tiêu đề" type="text" value="{{$tt->tieudekhongdau}}"/>
                                                <span class="field-validation-valid" data-valmsg-for="PersonName"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Ngày đăng</label>
                                                <input class="form-control" data-val="true"
                                                    data-val-date="The field DateOfBirth must be a date."
                                                    id="DateOfBirth" name="ngaysinh" placeholder="Chọn Ngày"
                                                    type="text" value="{{$tt->ngaydang}}" />
                                                <span class="field-validation-valid" data-valmsg-for="DateOfBirth"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <label class="control-label">Hình Thumbnail</label>
                                                @if($tt->tenhinh)
                                                    <img src="{{URL::to('public/frontend/images/bg-img')}}/{{$tt->tenhinh}}" alt="" style="width: auto;height: 200px;">
                                                @endif
                                                <input name="filehinh" type="file" value=""/>
                                                <span class="field-validation-valid" data-valmsg-for="PersonName"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea">Nội Dung</label>
                                <textarea class="form-control" id="editor1" rows="15" name="noidung_tt">{{$tt->noidung_tt}}</textarea>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"><i
                                    class="fa fa-fw fa-lg fa-check-circle"></i>Thêm mới</button>
                            
                                
                                
                            </div>

                        </div>
                        @endforeach
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
