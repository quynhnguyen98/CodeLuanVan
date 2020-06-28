@extends('welcome')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(./public/frontend/images/bg-img/40.jpg);">
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
                            <li class="breadcrumb-item active" aria-current="page">Submit Video</li>
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
                    <!-- Video Submit Content -->
                    <div class="video-submit-content mb-50 p-30 bg-white box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Submit your video</h5>
                        </div>

                        <div class="video-info mt-30">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="upload-file">Upload Your File</label>
                                    <input type="file" class="form-control-file" id="upload-file">
                                </div>
                                <div class="form-group">
                                    <label for="upload-file">Video Title</label>
                                    <input type="text" class="form-control" name="video-name">
                                </div>
                                <div class="form-group">
                                    <label for="upload-file">Video Description</label>
                                    <textarea name="video-description" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="upload-file">Tags*</label>
                                    <input type="text" class="form-control" name="video-tags">
                                </div>
                                <div class="form-group">
                                    <label for="upload-file">Video Catagory</label>
                                    <select name="video-catagory" class="form-control">
                                        <option value="blogs">Blogs</option>
                                        <option value="news">News</option>
                                        <option value="lifestyle">Lifestyle</option>
                                        <option value="treading">Trending</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="upload-file">Video Language</label>
                                    <select name="video-language" class="form-control">
                                        <option value="en">English</option>
                                        <option value="spa">Spanish</option>
                                        <option value="bn">Bangla</option>
                                        <option value="hi">Hindi</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn mag-btn mt-30"><i class="fa fa-cloud-upload"></i> Upload your video</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection