@extends('welcome')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url('public/frontend/images/41.jpg');">
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
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Tin Tức</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="archive-post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
                       @for($i=0;$i<count($tintuc);$i++)
                        <!-- Single Catagory Post -->
                        <div class="single-catagory-post d-flex flex-wrap">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail bg-img" style="background-image: url('public/frontend/images/<?php $data=(explode(',',$tintuc[$i]->images));
                                    echo $data[0];
                                            ?>');">
                            </div>

                            <!-- Post Contetnt -->
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#"><?php
                                            $end=date('d-m-Y',strtotime($tintuc[$i]->ngaydang));
                                            echo $end;
                                            ?></a>
                                </div>
                                <a href="{{URL::to('/tintuc/'.$tintuc[$i]->id_tintuc.'/'.$tintuc[$i]->tieudekhongdau.'.html')}}" class="post-title">{{$tintuc[$i]->tieude}}</a>
                                <!-- Post Meta -->
                                <div class="post-meta-2">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{$tintuc[$i]->luotxem}}</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                </div>
                                <p> <?php
                                        if(strlen($tintuc[$i]->noidung_tt)<=300) 
                                        {
                                            echo $tintuc[$i]->noidung_tt;
                                        }
                                        else{echo substr($tintuc[$i]->noidung_tt,0,300).'...';}

                                        ?></p>
                            </div>
                        </div>
                        @endfor
                        <nav>
                                        {!!$tintuc->links()!!}     
                        </nav>

                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection