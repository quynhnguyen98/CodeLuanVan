@extends('ad_qltv')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Quản Lý Tài Khoàn</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active"><a href="#">Quản Lý Tài Khoàn</a></li>
    </ul>
  </div>
  @if(session('mess'))
  <div class="alert alert-success">
    <ul>
      <li>{{ session('mess') }}</li>
    </ul>
  </div>
  @endif

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên Đăng Nhập</th>  
                  <th>Email</th>
                  <th>Vai Trò</th>
                  <th>Avatar</th>
                  <th></th>
                  <th>Phân Quyền</th>
                </tr>
              </thead>
              <tbody>
                @foreach($taikhoan as $tk)
                @if(!$tk->provider)
                <tr>
                  <td>{{$tk->id_taikhoan}}</td>
                  <td>{{$tk->tendangnhap}}</td>
                  <td>{{$tk->email}}</td>
                  <td><?php if($tk->vaitro==0) echo 'Thành Viên';
                                else if($tk->vaitro==1) echo 'Admin';
                                else echo 'Super Admin'; ?></td>
                  <td>@if($tk->avatar)
                    <img src="{{URL::to('public/frontend/images/core-img/'.$tk->avatar)}}"
                      style="width:auto;height: 50px;">
                    @else
                    Không Avatar
                    @endif
                  </td>
                  <td> <a class="btn btn-info btn-sm" href="{{URL::to('/doi-mat-khau/'.$tk->id_taikhoan)}}"><i
                        class="fa fa-pencil"></i>Đổi Mật Khẩu</a>
                  </td>
                  <td> <a class="btn btn-danger btn-sm" href="{{URL::to('/phan-quyen/'.$tk->id_taikhoan)}}"><i
                    class="fa fa-pencil"></i>Cấp Quyền</a>
              </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
@endsection