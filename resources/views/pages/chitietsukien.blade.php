@extends('welcome')
@section('content')

<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{URL::to('public/frontend/images/49.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>SỰ KIỆN</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach($sukien as $sk)
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Sự Kiện</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$sk->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

        <div class="container">
            <div class="row justify-content-center" style="flex-wrap: wrap;margin-right:-15px;margin-left: -15px">
                <!-- Post Details Content Area -->
                <div class="col-12 col-xl-8">
                    <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                        
                        <div class="blog-content">
                            <div class="post-meta">
                                <a href="#"><?php
                                            $end=date('d-m-Y',strtotime($sk->start));
                                            echo $end;
                                            ?></a>
                            </div>
                            <h4 class="post-title">{{$sk->title}}</h4>
                            <!-- Post Meta -->
                            <p style="font-size: 15px;">
                            {!!$sk->noidung!!}
                            </p>
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <img class="mb-15" src="img/bg-img/51.jpg" alt="">
                                </div>
                            </div>

                            <!-- Like Dislike Share -->
             

                            <!-- Post Author -->
                            
                        </div>
                    </div>
                    @endforeach
                    <!-- Related Post Area -->



                    <!-- Comment Area Start -->
                    

                    <!-- Post A Comment Area -->
                    
                </div>

                <!-- Sidebar Widget -->
                
            </div>
        </div>
@endsection