@extends('welcome')
@section('content')
<div class="hero-area owl-carousel">
        <!-- Single Blog Post -->

      
        <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(public/frontend/images/49.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2>Sự Kiện Trong Tháng</h2>
                        </div>

                    </div>
                </div>
            </div>
        </section>
   
        <!-- Single Blog Post -->

        <!-- Single Blog Post -->
    </div>
<section class="mag-posts-area d-flex flex-wrap">

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Left Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">
            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Sự Kiện Sắp Tới</h5>
                </div>
                 @foreach($sortedArr as $sk)
                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <i class="fa fa-calendar" style="font-size: 20px;"></i>
                    <div class="post-content"><a href="{{URL::to('/chi-tiet-su-kien/'.$sk->id)}}" style="font-size:17px;">{{$sk->title}}</a>
                  
                        <div class="post-meta d-flex justify-content-between">
                            Ngày:
                            <?php
                                $start=strtotime(date('d-m',strtotime($sk->start)).'-'.Carbon\Carbon::now()->year.'00:00:00');
                                $end=strtotime(date('d-m',strtotime($sk->start)).'-'.Carbon\Carbon::now()->year.'23:59:59');
                                if(($start<=$now)&&($now<=$end))
                                {
 
                                    echo 'Hôm Nay';
                                }
                                else
                                    echo date('d-m',strtotime($sk->start));
                            ?>
                        </div>
                    </div>
                </div>
                 
                @endforeach
     
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget">
                <a href="#" class="add-img"><img src="{{('public/frontend/images/bg-img/51.jpg')}}" alt=""></a>
                
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>TIN TỨC NỔI BẬT</h5>
                </div>
                @foreach($tintucnoibat as $tt)
                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="public/frontend/images/<?php $data=(explode(',',$tt->images));
                                                   echo $data[0];
                                            ?>" alt="" style="height: auto;width: 1000px;" alt="">
                    </div>
                    <div class="post-content">
                        <a href="{{URL::to('/tintuc/'.$tt->id_tintuc.'/'.$tt->tieudekhongdau.'.html')}}" class="post-title">{{$tt->tieude}}</a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{$tt->luotxem}}</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Single Blog Post -->
                

                <!-- Single Blog Post -->
                

                <!-- Single Blog Post -->
                

                <!-- Single Blog Post -->
                

            </div>
        </div>

        <!-- >>>>>>>>>>>>>>>>>>>>
             Main Posts Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
            <div class="response"></div>
            <div id='calendar'></div>
            
        </div>

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        
    </section>
@endsection