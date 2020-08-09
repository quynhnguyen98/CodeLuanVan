@extends('ad_themtv')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i>ĐỔI MẬT KHẨU</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Change Password</a></li>
        </ul>
    </div>
                             @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
    <form action="{{URL::to('/doipass/'.$id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="tile mt-4 mb-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <h4 class="card-header text-white bg-info">
                           Đổi Mật Khẩu
                        </h4>
                        <div class="card-body">
                            <input name="__RequestVerificationToken" type="hidden"
                                value="-Tjtj3rvfWRi1-lKMVSSxn-JpR1wu7WgI-XqsZ2RMsBhcJCZdlDKNLG0_ApUlRxxwaAporj49f9simfmLu7Rg830_gTgoRjR_v31j0q7xd41" />


                            <div class="row">
                                
                                <div class="col-lg-8">

                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <label class="control-label">Mật Khẩu Mới</label> 
                                                <input name="password" type="password" required="true">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <label class="control-label">Xác Nhận Mật Khẩu</label> 
                                                <input name="password_confirm" type="password" required="true">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"><i
                                    class="fa fa-fw fa-lg fa-check-circle"></i>Thay đổi</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection
