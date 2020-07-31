@extends('welcome')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{URL::to('public/frontend/images/40.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>ĐỔI MẬT KHẨU</h2>
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
                            <h5>ĐỔI MẬT KHẨU</h5>
                        </div>

                        <form action="{{URL::to('/resest-pass/check')}}" method="post">@csrf
                            <div class="form-group">
                                <input type="hidden" name="id_taikhoan" value={{$id_taikhoan}}>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Mật Khẩu Mới" required>
                            </div>
                             <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" placeholder="Xác Nhận Mật Khẩu" required>
                            </div>
                            @if(session('mess'))
                                <div class="alert alert-danger">
                                    <ul>
                                        {{session('mess')}}
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