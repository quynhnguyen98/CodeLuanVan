@extends('welcome')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(public/frontend/images/bg-img/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">    
                        <h2>QUÊN MẬT KHẨU</h2>
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
                            <h5>NHẬP EMAIL</h5>
                        </div>

                        <form action="{{URL::to('/forgot-password/check')}}" method="post">@csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
                            </div>
 
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    <ul>
                                        {{session('error')}}
                                    </ul>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-danger">
                                    <ul>
                                        {{session('success')}}
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