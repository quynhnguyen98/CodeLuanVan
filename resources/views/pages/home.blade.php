@extends('welcome')
@section('content')
<div class="hero-area owl-carousel">
        <!-- Single Blog Post -->

        @foreach($slide as $s)
        <div class="hero-blog-post bg-img bg-overlay" style="background-image: url('public/frontend/images/bg-img/{{$s->url}}');">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Contetnt -->
                        <div class="post-content text-center">
                            <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                <a href="archive.html">{{$s->title}}</a>
                            </div>
                            <a href="video-post.html" class="post-title" data-animation="fadeInUp" data-delay="300ms">{{$s->noidung}}</a>
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
                    <h5>Most Popular</h5>
                </div>

                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="{{('public/frontend/images/bg-img/4.jpg')}}" alt="">
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">Global Travel And Vacations Luxury Travel</a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="{{('public/frontend/images/bg-img/5.jpg')}}" alt="">
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">Cruising Destination Ideas</a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="{{('public/frontend/images/bg-img/6.jpg')}}" alt="">
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">The Luxury Of Traveling With</a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="{{('public/frontend/images/bg-img/7.jpg')}}" alt="">
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">Choose The Perfect Accommodations</a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="{{('public/frontend/images/bg-img/8.jpg')}}" alt="">
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">A Guide To Rocky Mountain Vacations</a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget">
                <a href="#" class="add-img"><img src="{{('public/frontend/images/bg-img/add.png')}}" alt=""></a>
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Latest Videos</h5>
                </div>

                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="{{('public/frontend/images/bg-img/9.jpg')}}" alt="">
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">Coventry City Guide Including Coventry</a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="{{('public/frontend/images/bg-img/10.jpg')}}" alt="">
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">Choose The Perfect Accommodations</a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="{{('public/frontend/images/bg-img/11.jpg')}}" alt="">
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">Get Ready Fast For Fall Leaf Viewing</a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="{{('public/frontend/images/bg-img/12.jpg')}}" alt="">
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">Global Resorts Network Grn Putting</a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="{{('public/frontend/images/bg-img/13.jpg')}}" alt="">
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">Travel Prudently Luggage And Carry</a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>

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
   
                <div class="trending-post-slides owl-carousel">
                    <!-- Single Trending Post -->
                    @foreach($hinhanh as $ha)
                    <div class="single-trending-post">
                        <img src="public/frontend/images/bg-img/{{$ha->tenhinh}}" alt="">
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
                                    <img id="hinhtintuc" src="public/frontend/images/bg-img/<?php $data=(explode(',',$tintuc[0]->images));
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
                                            function mysubstr($str,$limit=500){
                                                    if(strlen($str)<=$limit) return $str;
                                                    return substr($str,0,$limit).'...';
                                                }
                                            echo mysubstr($tintuc[0]->noidung_tt,350);        
                                        ?>

                                    </p>
                                </div>
                                <!-- Post Share Area -->
                                <div class="post-share-area d-flex align-items-center justify-content-between">
                                    <!-- Post Meta -->
                                    <div class="post-meta pl-3">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
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
                                            <img id="hinhtintuccon" src="public/frontend/images/bg-img/<?php $data=(explode(',',$tintuc[$i]->images));
                                                   echo $data[0];
                                            ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <a href="{{URL::to('/tintuc/'.$tintuc[$i]->id_tintuc.'/'.$tintuc[$i]->tieudekhongdau.'.html')}}" class="post-title">{{$tintuc[$i]->tieude}}</a>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
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
            <div class="most-viewed-videos mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Most Viewed Videos</h5>
                </div>

                <div class="most-viewed-videos-slide owl-carousel">

                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-4">
                        <div class="post-thumbnail">
                            <img src="{{('public/frontend/images/bg-img/28.jpg')}}" alt="">
                            <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>
                            <span class="video-duration">09:27</span>
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">A Guide To Rocky Mountain Vacations</a>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-4">
                        <div class="post-thumbnail">
                            <img src="{{('public/frontend/images/bg-img/29.jpg')}}" alt="">
                            <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>
                            <span class="video-duration">09:27</span>
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">Dentists Are Smiling Over Painless Veneer Alternative</a>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-4">
                        <div class="post-thumbnail">
                            <img src="{{('public/frontend/images/bg-img/30.jpg')}}" alt="">
                            <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>
                            <span class="video-duration">09:27</span>
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">Become A Travel Pro In One Easy Lesson</a>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-4">
                        <div class="post-thumbnail">
                            <img src="{{('public/frontend/images/bg-img/28.jpg')}}" alt="">
                            <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>
                            <span class="video-duration">09:27</span>
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">A Guide To Rocky Mountain Vacations</a>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-4">
                        <div class="post-thumbnail">
                            <img src="{{('public/frontend/images/bg-img/29.jpg')}}" alt="">
                            <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>
                            <span class="video-duration">09:27</span>
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">Dentists Are Smiling Over Painless Veneer Alternative</a>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-4">
                        <div class="post-thumbnail">
                            <img src="{{('public/frontend/images/bg-img/30.jpg')}}" alt="">
                            <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>
                            <span class="video-duration">09:27</span>
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">Become A Travel Pro In One Easy Lesson</a>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Sports Videos -->
            
        </div>

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        
    </section>
@endsection