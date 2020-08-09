@extends('ad_tttv')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Person Information</h1>
            <p>You can view person detailed information.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-People fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Person Information</a></li>
        </ul>
    </div>
@foreach($data as $v)
    <div class="row user">
        <div class="col-md-12">
            <div class="profile">
                <div class="info">
                    <img class="rounded-circle" style="height: 100px;display: block;width: 100px;margin: 30px auto;"
                        src="../public/img_person/{{$v->hinhanh}}">
                    <h4>{{$v->hoten}}</h4>
                    <p>Giới tính: {{$v->gioitinh}}</p>
                </div>
                <div class="cover-image"></div>
            </div>
        </div>
    </div>

    <div class="tile mt-4 mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <h4 class="card-header text-white bg-info">Thông Tin Thành Viên
                        <span class="pull-right">
                            <a class="btn btn-warning" type="button" href="{{URL::to('/quan-ly-thanh-vien')}}">Quay lại danh sách</a>
                        </span>
                    </h4>

                    <div class="card-body">

                        <div class="row line-head">
                            <div class="form-horizontal col-lg-6">
                               
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Người thân:</label>
                                    <div class="col-md-8">
                                        @foreach($nguoithan as $nt)
                                        <a href="{{URL::to('/thong-tin-thanh-vien/'.$nt->pid)}}" class="btn-link">{{$nt->hoten}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Ngày sinh:</label>
                                    <div class="col-md-8">
                                        <input class="form-control"  type="text" value="{{$v->ngaysinh}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Ngày mất:</label>
                                    <div class="col-md-8">
                                        <input class="form-control"  type="text" value="{{$v->ngaymat}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal col-lg-6">
                               
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Quên Quán:</label>
                                    <div class="col-md-8">
                                        <input class="form-control"  type="text" value="{{$v->tinh_tp}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Trạng thái:</label>
                                    <div class="col-md-8">
                                        <input class="form-control"  type="text" value="{{$v->tinhtrang}}">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4">

                            <div class="list-group col-lg-4">
                                <div class="alert alert-dismissible alert-warning">
                                    <h4>Thế hệ của tôi</h4>
                                    
                                    <p>Trong gia đình, tôi thuộc <strong>thế hệ thứ <?php if(count($arr1)!=0) 
                                                                                            echo count($arr1);
                                                                                        else
                                                                                            echo '1'; ?></strong></p>
                                </div>
                            </div>

                            <div class="list-group col-lg-4">
                                
                                <div class="list-group-item list-group-item-action">
                                    Tổng số con
                                    <span class="pull-right">
                                        <span class="badge badge-secondary"><?php echo $sl ?></span>
                                    </span>
                                </div>
                            </div>

                            <div class="list-group col-lg-4">
                                <div class="list-group-item list-group-item-action">
                                    Tổng số Nam
                                    <span class="pull-right">
                                        <span class="badge badge-secondary"><?php echo $tongnam ?></span>
                                    </span>
                                </div>
                                <div class="list-group-item list-group-item-action">
                                    Tổng số Nữ
                                    <span class="pull-right">
                                        <span class="badge badge-secondary"><?php echo $tongnu ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Tiểu sử</label>
                            <textarea class="form-control" id="editor1" rows="15" name="tieusu">{!!$v->tieusu!!}</textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>

      

    </div>
@endforeach

</main>
@endsection