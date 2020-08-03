@extends('welcome')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(./public/frontend/images/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Gửi Góp Ý</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Góp ý</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<div class="video-submit-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                     @if(session('success'))
                                 <div class="alert alert-danger">
                                    <ul>                    
                                            <li>{{session('success')}}</li>
                                    </ul>
                                </div>
                            @endif
                    <!-- Video Submit Content -->
                    <div class="video-submit-content mb-50 p-30 bg-white box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Gửi Góp ý</h5>
                        </div>

                        <div class="video-info mt-30">
                            <form action="{{URL::to('/gui-gop-y')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="upload-file">Nội Dung Góp ý</label>
                                    <textarea name="noidung" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <button type="submit" class="btn mag-btn mt-30"><i class="fa fa-cloud-upload"></i>SEND</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection