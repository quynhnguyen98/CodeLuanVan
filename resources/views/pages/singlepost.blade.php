@extends('welcometintuc')
@section('content')

<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{URL::to('public/frontend/images/49.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>TIN TỨC</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach($tintuc as $tt)
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Tin Tức</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$tt->tieude}}</li>
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
                        <div class="blog-thumb mb-30">
                            <img src="{{URL::to('public/frontend/images')}}/<?php $data=(explode(',',$tt->images));
                                                   echo $data[0];
                                            ?>" alt="">

                        </div>
                        <div class="blog-content">
                            <div class="post-meta">
                                <a href="#"><?php
                                            $end=date('d-m-Y',strtotime($tt->ngaydang));
                                            echo $end;
                                            ?></a>
                                <a href="archive.html">lifestyle</a>
                            </div>
                            <h4 class="post-title">{{$tt->tieude}}</h4>
                            <!-- Post Meta -->
                            <div class="post-meta-2">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                            <p style="font-size: 15px;">
                            {!!$tt->noidung_tt!!}
                            </p>
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <img class="mb-15" src="img/bg-img/51.jpg" alt="">
                                </div>
                            </div>

                            <!-- Like Dislike Share -->
                            <div class="like-dislike-share my-5">
                                <div class="fb-share-button" data-href="http://localhost/CodeLuanVan/" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                            </div>

                            <!-- Post Author -->
                            <div class="post-author d-flex align-items-center">
                                <div class="post-author-thumb">
                                    <img src="img/bg-img/52.jpg" alt="">
                                </div>
                                <div class="post-author-desc pl-4">
                                    <a href="#" class="author-name">Alan Shaerer</a>
                                    <p>Duis tincidunt turpis sodales, tincidunt nisi et, auctor nisi. Curabitur vulputate sapien eu metus ultricies fermentum nec vel augue. Maecenas eget lacinia est.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Related Post Area -->
                    <div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Tin Tức Liên Quan</h5>
                        </div>

                        <div class="row">
                            @foreach($tintuclq as $ttlq)
                            <!-- Single Blog Post -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-blog-post style-4 mb-30">
                                    <div class="post-thumbnail">
                                        <a href="{{URL::to('/tintuc/'.$ttlq->id_tintuc.'/'.$ttlq->tieudekhongdau.'.html')}}">
                                       <img src="{{URL::to('public/frontend/images')}}/<?php $data=(explode(',',$ttlq->images));
                                                   echo $data[0];
                                            ?>" alt="" style="height: 300px;">

                                            </a>
                                    </div>
                                    <div class="post-content">
                                        <a href="{{URL::to('/tintuc/'.$ttlq->id_tintuc.$ttlq->tieudekhongdau.'.html')}}" class="post-title">{{$ttlq->tieude}}</a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- Single Blog Post -->
                            

                            <!-- Single Blog Post -->
                            

                        </div>
                    </div>


                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix bg-white mb-30 p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>COMMENTS</h5>
                        </div>

                        <ol>
                            @if(!count($comment)==0)
                                @foreach($comment as $cmt)
                                <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Author -->
                                        <div class="comment-author">
                                            <img src="{{URL::to('public/frontend/images/core-img/'.$cmt->user->avatar)}}" alt="author">
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="#" class="comment-date">{{date('d/m/Y H:i',strtotime($cmt->created_at))}}</a>
                                            <h6>{{$cmt->user->tendangnhap}}</h6>
                                            <p>{{$cmt->noidung}}</p>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="like">like</a>
                                                <a class="reply" onclick="myFunction({{$cmt->id_gopy}})">Reply</a>
        
                                            </div>
                                            <div id="form-{{$cmt->id_gopy}}" style="margin-bottom: -50px;margin-top: 20px;display: none">
                                                <form action="{{URL::to('/tintuc1/'.$tintuc[0]->id_tintuc.'/'.$tintuc[0]->tieudekhongdau.'.html')}}" method="post" id="commentForm">@csrf
                                                    <textarea name="binhluan" cols="90" rows="2" class="form-control1"></textarea>
                                                    <input type="hidden" value="{{$cmt->id_gopy}}" name="idgopy">
                                                     <button type="submit" style="padding: 0 0 2px;position: relative;left: 85%;">Submit Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function myFunction(x) {
                                                  var a=document.getElementById("form-"+x).style.display;
                                                  if(a=='none')
                                                  {
                                                    document.getElementById("form-"+x).style.display='block';
                                                  }
                                                  else
                                                    document.getElementById("form-"+x).style.display='none';
                                                }
                                    </script>
                                    @if($cmt->replies)
                                    @foreach($cmt->replies as $rep)
                                    <ol class="children">
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                <img src="{{URL::to('public/frontend/images/core-img/'.$rep->user->avatar)}}" alt="author">
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <a href="#" class="comment-date">{{date('d/m/Y H:i',strtotime($rep->created_at))}}</a>
                                                <h6>{{$rep->user->tendangnhap}}</h6>
                                                <p>{{$rep->noidung}}</p>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="like">like</a>
                                                     <a class="reply" onclick="myFunction1({{$rep->id_gopy}})">Reply</a>
                                                </div>
                                                <div id="form1-{{$rep->id_gopy}}" style="margin-bottom: -50px;margin-top: 20px;display: none;">
                                                <form action="{{URL::to('/tintuc1/'.$tintuc[0]->id_tintuc.'/'.$tintuc[0]->tieudekhongdau.'.html')}}" method="post" id="commentForm">@csrf
                                                    <textarea name="binhluan" cols="90" rows="2" class="form-control1"></textarea>
                                                    <input type="hidden" value="{{$cmt->id_gopy}}" name="idgopy">
                                                     <button type="submit" style="padding: 0 0 2px;position: relative;left: 85%;">Submit Comment</button>
                                                </form>
                                            </div>
    
                                            </div>
                                        </div>
                                         <script>
                                        function myFunction1(x) {
                                                  var a=document.getElementById("form1-"+x).style.display;
                                                  if(a=='none')
                                                  {
                                                    document.getElementById("form1-"+x).style.display='block';
                                                  }
                                                  else
                                                    document.getElementById("form1-"+x).style.display='none';
                                                }
                                    </script>
                                    </li>
                                </ol>
                                @endforeach
                                @endif

                                </li>
                                @endforeach
                            @else
                           <li class="single_comment_area">
                                  <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <p>Chưa Có Bình Luận</p>

                                </li>

                            </li>
                            @endif


                            <!-- Single Comment Area -->

                        </ol>
                    </div>

                    <!-- Post A Comment Area -->
                    <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix" >
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>LEAVE A REPLY</h5>
                        </div>

                        <!-- Reply Form -->
                        <div class="contact-form-area">
                            <form  action="{{URL::to('/tintuc/'.$tintuc[0]->id_tintuc.'/'.$tintuc[0]->tieudekhongdau.'.html')}}" method="post">@csrf
                                <div class="row">
                                  <div class="col-12">
                                        <textarea name="noidung" class="form-control" id="message" cols="30" rows="10" placeholder="Message*" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn mag-btn mt-30" type="submit">Submit Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                
            </div>
        </div>
        <script>
          function click() {
               alert('asdasd');
            }
        </script>
@endsection