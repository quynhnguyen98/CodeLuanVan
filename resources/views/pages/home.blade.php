@extends('welcome')
@section('content')
<div class="hero-area owl-carousel">
        <!-- Single Blog Post -->

        @foreach($slide as $s)
        <div class="hero-blog-post bg-img bg-overlay" style="background-image: url('public/frontend/images/{{$s->url}}');">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Contetnt -->
                        <div class="post-content text-center">
                            <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                <a href="archive.html">{{$s->title}}</a>
                            </div>
                            <a href="#" class="post-title" data-animation="fadeInUp" data-delay="300ms">{{$s->noidung}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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
                <a href="#" class="add-img"><img src="{{('public/frontend/images/add.jpg')}}" alt=""></a>
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
                                            ?>" alt="" style="height: auto;width: 100px;" alt="">
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
            <!-- Trending Now Posts Area -->
            <div class="trending-now-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>HÌNH ẢNH</h5>
                </div>
   
                <div class="trending-post-slides owl-carousel" >
                    <!-- Single Trending Post -->
                    @foreach($hinhanh as $ha)
                    <div class="single-trending-post" style="height: 310px;">
                        <img src="public/frontend/images/{{$ha->tenhinh}}" alt="">
                    </div>
                    @endforeach
                    <!-- Single Trending Post -->
                    

                    <!-- Single Trending Post -->
                </div>
            </div>

            <!-- Feature Video Posts Area -->
            <div class="feature-video-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>TIN TỨC</h5>
                </div>
                <div class="featured-video-posts">
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <!-- Single Featured Post -->
                            <div class="single-featured-post">
                                <!-- Thumbnail -->
                                <div class="post-thumbnail mb-50">
                                    <a href="{{URL::to('/tintuc/'.$tintuc[0]->id_tintuc.'/'.$tintuc[0]->tieudekhongdau.'.html')}}">
                                    <img id="hinhtintuc" src="public/frontend/images/<?php $data=(explode(',',$tintuc[0]->images));
                                                   echo $data[0];
                                            ?>" alt=""></a>
                                </div>
                                <!-- Post Contetnt -->
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#"><!-- {{$tintuc[0]->ngaydang}} -->
                                            <?php
                                            $end=date('d-m-Y',strtotime($tintuc[0]->ngaydang));
                                            echo $end;
                                            ?>
                                        </a>
                                    </div>
                                    <a href="{{URL::to('/tintuc/'.$tintuc[0]->id_tintuc.'/'.$tintuc[0]->tieudekhongdau.'.html')}}" class="post-title">{{$tintuc[0]->tieude}}</a>
                                    <p id="noidung">
                                        <?php
                                            function mysubstr($str,$limit=300){
                                                    if(strlen($str)<=$limit)
                                                    {
                                                        
                                                        return $str;
                                                    }
                                                    return substr($str,0,$limit).'...';
                                                }
                                            echo mysubstr($tintuc[0]->noidung_tt,250);        
                                        ?>

                                    </p>
                                </div>
                                <!-- Post Share Area -->
                                <div class="post-share-area d-flex align-items-center justify-content-between">
                                    <!-- Post Meta -->
                                    <div class="post-meta pl-3">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$tintuc[0]->luotxem}}</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                    </div>
                                    <!-- Share Info -->
                                    <div class="share-info">
                                        <a href="#" class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        <!-- All Share Buttons -->
                                        <div class="all-share-btn d-flex">
                                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">

                            <!-- Featured Video Posts Slide -->
                            <div class="featured-video-posts-slide owl-carousel">
                               
                                <div class="single--slide">
                                    <!-- Single Blog Post -->
                                     @for($i=1;$i<count($tintuc);$i++)
                                    <div class="single-blog-post d-flex style-3">
                                        <div class="post-thumbnail">
                                            <a href="{{URL::to('/tintuc/'.$tintuc[$i]->id_tintuc.'/'.$tintuc[$i]->tieudekhongdau.'.html')}}">
                                            <img id="hinhtintuccon" src="public/frontend/images/<?php $data=(explode(',',$tintuc[$i]->images));
                                                   echo $data[0];
                                            ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <a href="{{URL::to('/tintuc/'.$tintuc[$i]->id_tintuc.'/'.$tintuc[$i]->tieudekhongdau.'.html')}}" class="post-title">{{$tintuc[$i]->tieude}}</a>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$tintuc[$i]->luotxem}}</a>
                                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                            </div>
                                        </div>
                                    </div>
                                  @endfor                                
                                </div>
  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Most Viewed Videos -->
            

            <!-- Sports Videos -->
            
        </div>

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        
    </section>
@endsection