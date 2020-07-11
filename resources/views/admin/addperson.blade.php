@extends('ad_themtv')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i> THÊM THÀNH VIÊN</h1>
            <p>Add person to include in our family tree.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Add Person</a></li>
        </ul>
    </div>

    <form action="/Person/Create" enctype="multipart/form-data" method="post">
        <div class="tile mt-4 mb-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <h4 class="card-header text-white bg-info">
                            THÔNG TIN CÁ NHÂN
                            <span class="pull-right"><button class="btn btn-secondary" type="button">Quay lại danh
                                    sách</button></span>
                        </h4>
                        <div class="card-body">
                            <input name="__RequestVerificationToken" type="hidden"
                                value="-Tjtj3rvfWRi1-lKMVSSxn-JpR1wu7WgI-XqsZ2RMsBhcJCZdlDKNLG0_ApUlRxxwaAporj49f9simfmLu7Rg830_gTgoRjR_v31j0q7xd41" />


                            <div class="row">
                                <div class="col-lg-4 pt-1 pb-1">
                                    <img id="photo"
                                        style="height: 320px;width: 100%;margin:0px;padding: 2px;display:block;border: 3px solid #cccccc;"
                                        src="/content/images/no-image.jpg" alt="Photo">
                                    <input class="form-control d-none" id="PhotoFileSelector" name="PhotoFileSelector"
                                        type="file" value="" />
                                    <input id="PhotoFileName" name="PhotoFileName" type="hidden" value="" />
                                </div>
                                <div class="col-lg-8">

                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <label class="control-label">Họ và tên</label>
                                                <input class="form-control" id="PersonName" name="PersonName"
                                                    placeholder="Nhập họ tên" type="text" value="" />
                                                <span class="field-validation-valid" data-valmsg-for="PersonName"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">Trạng thái</label>
                                                <div class="toggle-flip">
                                                    <label>
                                                        <input type="checkbox"><span class="flip-indecator"
                                                            data-isalive="DEAD" data-toggle-on="SỐNG"
                                                            data-toggle-off="CHẾT"></span>
                                                    </label>
                                                    <input id="IsAlive" name="IsAlive" type="hidden" value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Cha</label>
                                                <select class="form-control" data-val="true"
                                                    data-val-number="The field FatherID must be a number." id="FatherID"
                                                    name="FatherID">
                                                    <option value="">----Select----</option>
                                                    <option value="4">Marco Peacock</option>
                                                    <option value="5">Steven Buchanan</option>
                                                    <option value="7">Robert Kong</option>
                                                    <option value="10">Hunold Alexander</option>
                                                    <option value="22">Mike Bongiorno</option>
                                                    <option value="38">Time Oldman</option>
                                                    <option value="50">Sakharam Bhabal</option>
                                                    <option value="51">Gangadhar Bhabal</option>
                                                    <option value="54">Sanket Bhabal</option>
                                                    <option value="55">blublub</option>
                                                    <option value="56">G</option>
                                                    <option value="57"></option>
                                                    <option value="58">Test</option>
                                                    <option value="60">Test now</option>
                                                    <option value="61">Test now&#39;s son</option>
                                                    <option value="62">sdas</option>
                                                    <option value="64">Test Abbas</option>
                                                    <option value="65">NEERAJ</option>
                                                    <option value="66">testtttt</option>
                                                    <option value="67">hassan</option>
                                                    <option value="70">Test Abbas</option>
                                                </select>
                                                <span class="field-validation-valid" data-valmsg-for="FatherID"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Mẹ</label>
                                                <select class="form-control" data-val="true"
                                                    data-val-number="The field MotherID must be a number." id="MotherID"
                                                    name="MotherID">
                                                    <option value="">----Select----</option>
                                                    <option value="2">Nancy Davolio</option>
                                                    <option value="3">Janet Leverling</option>
                                                    <option value="6">Michele Suyamatest</option>
                                                    <option value="8">Laura Callahan</option>
                                                    <option value="9">Anne Dodsworth</option>
                                                    <option value="53">Darpana Bhabal</option>
                                                    <option value="68">fans</option>
                                                </select>
                                                <span class="field-validation-valid" data-valmsg-for="MotherID"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Giới tính</label>
                                                <select class="form-control" id="Gender" name="Gender">
                                                    <option value="">----Select----</option>
                                                    <option value="Male">Nam</option>
                                                    <option value="Female">Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Ngày sinh</label>
                                                <input class="form-control" data-val="true"
                                                    data-val-date="The field DateOfBirth must be a date."
                                                    id="DateOfBirth" name="DateOfBirth" placeholder="Chọn Ngày"
                                                    type="text" value="" />
                                                <span class="field-validation-valid" data-valmsg-for="DateOfBirth"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Trạng thái hôn nhân</label>
                                                <input class="form-control" id="Occation" name="Occation"
                                                    placeholder="Nhập tại đây" type="text" value="" />
                                                <span class="field-validation-valid" data-valmsg-for="Occation"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Quê quán</label>

                                                <input class="form-control" id="CurrentResidence"
                                                    name="CurrentResidence" placeholder="Nhập quê quán" type="text"
                                                    value="" />
                                                <span class="field-validation-valid" data-valmsg-for="CurrentResidence"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                    </div>

                                
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea">Tiểu sử</label>
                                <textarea class="form-control" id="editor1" rows="15"></textarea>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>Thêm mới</button>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="/Person"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>Hủy</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection