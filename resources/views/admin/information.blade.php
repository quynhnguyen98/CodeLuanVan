@extends('ad_tttv')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Person Information</h1>
            <p>You can view person detailed information.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-People fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Person Information</a></li>
        </ul>
    </div>

    <div class="row user">
        <div class="col-md-12">
            <div class="profile">
                <div class="info">
                    <img class="rounded-circle" style="height: 100px;display: block;width: 100px;margin: 30px auto;"
                        src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="user-4.jpg Photo">
                    <h4>Janet Leverling</h4>
                    <p>Giới tính:...</p>
                </div>
                <div class="cover-image"></div>
            </div>
        </div>
    </div>

    <div class="tile mt-4 mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <h4 class="card-header text-white bg-info">Thông Tin Thành Viên
                        <span class="pull-right">
                            <a class="btn btn-warning" type="button" href="{{URL::to('/tim-kiem-thong-tin')}}">Quay lại danh sách</a>
                        </span>
                    </h4>

                    <div class="card-body">

                        <div class="row line-head">
                            <div class="form-horizontal col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Cha:</label>
                                    <div class="col-md-8">
                                        <a href="#" class="btn-link">Steven Buchanan</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Mẹ:</label>
                                    <div class="col-md-8">
                                        <a href="#" class="btn-link">Nancy Davolio</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Ngày sinh:</label>
                                    <div class="col-md-8">
                                        <input class="form-control"  type="text" value="08/01/1980">
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Tình trạng hôn nhân:</label>
                                    <div class="col-md-8">
                                        <input class="form-control"  type="text" value="Nữ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Quên Quán:</label>
                                    <div class="col-md-8">
                                        <input class="form-control"  type="text" value="HCM">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Trạng thái:</label>
                                    <div class="col-md-8">
                                        <input class="form-control"  type="text" value="CÒN SỐNG">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4">

                            <div class="list-group col-lg-4">
                                <div class="alert alert-dismissible alert-warning">
                                    <h4>Thế hệ của tôi</h4>
                                    <p>Trong gia đình, tôi thuộc <strong>thế hệ thứ 1</strong></p>
                                </div>
                            </div>

                            <div class="list-group col-lg-4">
                                <div class="list-group-item list-group-item-action">
                                    Tổng số vợ chồng
                                    <span class="pull-right">
                                        <span class="badge badge-secondary">0</span>
                                    </span>
                                </div>
                                <div class="list-group-item list-group-item-action">
                                    Tổng số con
                                    <span class="pull-right">
                                        <span class="badge badge-secondary">0</span>
                                    </span>
                                </div>
                            </div>

                            <div class="list-group col-lg-4">
                                <div class="list-group-item list-group-item-action">
                                    Tổng số anh em
                                    <span class="pull-right">
                                        <span class="badge badge-secondary">1</span>
                                    </span>
                                </div>
                                <div class="list-group-item list-group-item-action">
                                    Tổng số chị em
                                    <span class="pull-right">
                                        <span class="badge badge-secondary">2</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <h4 class="card-header text-white bg-info">Chi tiết mối quan hệ</h4>
                    <div class="card-body">
                        <div class="row">


                            <div class="col-lg-12 mb-3">
                                <h4 style="border:1px solid #dee2e6;" class="card-header">Anh Trai &amp; Chị Gái</h4>
                                <table class="table table-hover table-bordered" id="brotherSisterTable">
                                    <tbody>
                                        <tr>
                                            <td width="100">


                                                <img class="rounded-circle"
                                                    style="height: 80px;display: block;width: 80px;margin:0px auto;"
                                                    src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="user-6.jpg Photo">

                                            </td>
                                            <td>
                                                <strong style="font-size:18px;">
                                                    <a href="/People/PersonDetails/6">Michele Suyamatest</a>
                                                </strong><br />
                                                <strong>Tuổi: </strong>38 <br />

                                                <span class="badge badge-warning">Em gái</span>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100">


                                                <img class="rounded-circle"
                                                    style="height: 80px;display: block;width: 80px;margin:0px auto;"
                                                    src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="user-8.jpg Photo">

                                            </td>
                                            <td>
                                                <strong style="font-size:18px;">
                                                    <a href="/People/PersonDetails/8">Laura Callahan</a>
                                                </strong><br />
                                                <strong>Tuổi: </strong>42 <br />

                                                <span class="badge badge-danger">Chị Gái</span>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100">


                                                <img class="rounded-circle"
                                                    style="height: 80px;display: block;width: 80px;margin:0px auto;"
                                                    src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="Photo">

                                            </td>
                                            <td>
                                                <strong style="font-size:18px;">
                                                    <a href="/People/PersonDetails/58">Test</a>
                                                </strong><br />
                                                <strong>Tuổi: </strong>0 <br />

                                                <span class="badge badge-info">Em Trai</span>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</main>
@endsection