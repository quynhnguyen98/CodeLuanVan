@extends('welcome')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{asset('public/frontend/images/40.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>ĐĂNG KÝ</h2>
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
                            <h5>WELCOME!</h5>
                        </div>

                        <form action="{{URL::to('/signup/check')}}" method="post">@csrf
                            <div class="form-group">
                                <input type="text" name="username" class="form-control"  placeholder="Tài Khoản" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control"  placeholder="Mật Khẩu" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control"  placeholder="Xác Nhận Mật Khẩu" required>
                            </div>
                             <div class="form-group">
                                <input type="email" name="email" class="form-control"  placeholder="Email" required>
                            </div>
                             {{-- <div class="form-group">
                                <input type="text" name="hoten" class="form-control"  placeholder="Họ Tên" required>
                            </div>
                            <div class="form-group" style="font-size: 15px">
                                        <label class="asd"><input type="radio" name="gioitinh" value="Nam" checked> Nam   </label>                            
                                        <label class="asd"><input type="radio" name="gioitinh" value="Nữ"> Nữ</label>      
                            </div>
                             <div class="form-group">
                                <input type="date" name="ngaysinh" class="form-control"  required>
                            </div>
                             <div class="form-group">
                                 <select class="form-control" data-val="true"
                                                    data-val-number="The field MotherID must be a number." id="MotherID"
                                                    name="tinh">
                                                    <option selected="true" ">Chọn Tỉnh?</option>
                                                    @foreach($tinh as $k)
                                                        <option value="{{$k->id_tinh}}">{{$k->tinh_tp}}</option>
                                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                 <select class="form-control" data-val="true"
                                     data-val-number="The field MotherID must be a number." id="MotherID"
                                    name="FatherID">
                                            <option selected="true" ">Cha bạn là ai?</option>
                                                    @foreach($all_thanhvien as $k)
                                                        <option value="{{$k->id}}">{{$k->hoten}}</option>
                                                    @endforeach
                                </select>
                            </div>
                              <div class="form-group">
                                <textarea class="form-control" name="tieusu" rows="5" cols="66" placeholder="Tiểu Sử"></textarea>
                            </div> --}}
                             
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" name="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">I agreed the Terms&Condition</label>
                                </div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection