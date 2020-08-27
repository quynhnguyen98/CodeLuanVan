@extends('welcome')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{asset('public/frontend/images/40.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>THAY ĐỔI THÔNG TIN CÁ NHÂN</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <div class="mag-login-area py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="login-content bg-white p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>THÔNG TIN CÁ NHÂN!</h5>
                        </div>
                        @foreach($taikhoan as $tk)
                        <form action="{{URL::to('/edituser/check/'.$tk->id_taikhoan)}}" enctype="multipart/form-data" method="post">@csrf
                            <div class="avatar-wrapper">
                                <img class="profile-pic" src="{{URL::to('public/frontend/images/core-img/'.$tk->avatar)}}" />
                                <div class="upload-button">
                                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                </div>
                                <input class="file-upload" type="file" id="file" name="filehinh" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control"  value="{{$tk->tendangnhap}}" disabled>
                            </div>
                             <div class="form-group">
                                <input type="email" name="email" class="form-control" value="{{$tk->email}}" disabled>
                            </div>
                            <div class="form-group">
                                @if(isset($tk->hoten))
                                <input type="text" name="hoten" class="form-control"  placeholder="Họ Tên" value="{{$tk->hoten}}">
                                <input type="hidden" name="id_nguoi" value="{{$tk->id}}">
                                @else
                                <input type="text" name="hoten" class="form-control"  placeholder="Họ Tên">
                                @endif
                            </div>
                            <div class="form-group" style="font-size: 15px">
                                @if(isset($tk->gioitinh))
                                    @if($tk->gioitinh=='Nam')
                                        <label class="asd"><input type="radio" name="gioitinh" value="Nam" checked> Nam   </label>                            
                                        <label class="asd"><input type="radio" name="gioitinh" value="Nữ"> Nữ</label>      
                                    @else
                                        <label class="asd"><input type="radio" name="gioitinh" value="Nam"> Nam   </label>                            
                                        <label class="asd"><input type="radio" name="gioitinh" value="Nữ" checked> Nữ</label>   
                                    @endif
                                @else
                                    <label class="asd"><input type="radio" name="gioitinh" value="Nam" checked> Nam   </label>                            
                                    <label class="asd"><input type="radio" name="gioitinh" value="Nữ"> Nữ</label>     
                                @endif

                            </div>
                             <div class="form-group">
                                 @if(isset($tk->ngaysinh))
                                    <input type="date" name="ngaysinh" class="form-control" value="{{$tk->ngaysinh}}">
                                @else
                                     <input type="date" name="ngaysinh" class="form-control">
                                 @endif
                            </div>
                             <div class="form-group">
                                @if(isset($tk->id_tinh))
                                 <select class="form-control" data-val="true"
                                                    data-val-number="The field MotherID must be a number." id="MotherID"
                                                    name="tinh">
                                                    @foreach($tinh as $k)
                                                        @if($k->id_tinh==$tk->id_tinh)
                                                            <option value="{{$k->id_tinh}}" selected="true">{{$k->tinh_tp}}</option>
                                                        
                                                        @endif
                                                            <option value="{{$k->id_tinh}}">{{$k->tinh_tp}}</option>
                                                    @endforeach
                                </select>
                                @else
                                <select class="form-control" data-val="true"
                                                    data-val-number="The field MotherID must be a number." id="MotherID"
                                                    name="tinh">
                                                    <option selected="true" >Chọn Tỉnh?</option>
                                                    @foreach($tinh as $k)
                                                        <option value="{{$k->id_tinh}}">{{$k->tinh_tp}}</option>
                                                    @endforeach
                                </select>
                                @endif
                            </div>
                             <div class="form-group">
                                 @if(count($cha)!=0)
                                 <select class="form-control" data-val="true"
                                     data-val-number="The field MotherID must be a number." id="MotherID"
                                    name="FatherID">
                                            <option selected="true" >Cha bạn là ai?</option>
                                                    @foreach($all_thanhvien as $k)
                                                        @if($k->id==$cha[0]->id)
                                                            <option value="{{$k->id}}" selected="true">{{$k->hoten}}</option>
                                                        @else
                                                            <option value="{{$k->id}}">{{$k->hoten}}</option>
                                                        @endif
                                                    @endforeach
                                </select>
                                @else
                                <select class="form-control" data-val="true"
                                            data-val-number="The field MotherID must be a number." id="MotherID"
                                        name="FatherID">
                                                <option selected="true" ">Cha bạn là ai?</option>
                                                        @foreach($all_thanhvien as $k)
                                                            <option value="{{$k->id}}">{{$k->hoten}}</option>
                                                        @endforeach
                                    </select>
                                    @endif
                            </div>

                              <div class="form-group">
                                @if(isset($tk->tieusu))
                              <textarea class="form-control" name="tieusu" rows="5" cols="66" placeholder="Tiểu Sử">{{$tk->tieusu}}</textarea>
                                @else
                                <textarea class="form-control" name="tieusu" rows="5" cols="66" placeholder="Tiểu Sử"></textarea>
                                @endif
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
                            @if(session('mess'))
                                 <div class="alert alert-danger">
                                    <ul>                    
                                            <li>{{ session('mess') }}</li>
                                    </ul>
                                </div>
                            @endif
                            <button type="submit" class="btn mag-btn mt-30">Submit</button>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection