@extends('welcome')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{URL::to('public/frontend/images/40.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>ĐĂNG NHẬP</h2>
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
                            <h5>Great to have you back!</h5>
                        </div>

                        <form action="{{route('login')}}" method="post">@csrf
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="User Name" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing" value="remember">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                </div>
                                <div class="icons">
                                    <a href="{{URL::to('/auth/redirect/facebook')}}" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="{{URL::to('/auth/redirect/google')}}" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
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
                            @if(session('loi'))
                                 <div class="alert alert-danger">
                                    <ul>                    
                                            <li>{{session('loi')}}</li>
                                    </ul>
                                </div>
                            @endif
                            <button type="submit" class="btn mag-btn mt-30">Login</button>
                            <div class="qwe">
                                <a href="{{URL::to('/forgot-password')}}">Can't Sign in?</a><br>
                                <a href="{{URL::to('/signup')}}">Create Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection