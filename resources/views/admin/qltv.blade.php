@extends('ad_qltv')
@section('content')
<main class="app-content">

    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i> People</h1>
            <p>All person information will be listed here.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">People</a></li>
        </ul>
    </div>

    <div class="tile">
        <div class="tile-body">
            <div class="row">
                <div class="col-lg-12">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control searchbox-input" name="searchbox-input"
                            placeholder="Tìm kiếm...">
                        <a id="AddPerson" class="btn btn-success icon-btn" href="{{URL::to('/them-thanh-vien')}}"><i
                                class="fa fa-plus"></i>Thêm thành
                            viên</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-hover table-bordered" id="peopleTable">
                        <thead>
                            <tr>
                                <th width="70">Id</th>
                                <th width="300">Họ và tên</th>
                                <th>Cha</th>
                                <th>Mẹ</th>
                                <th width="35">Trạng thái</th>
                                <th width="55"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    2
                                    <input id="PersonID" name="PersonID" type="hidden" value="2" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/2">Nancy Davolio</a>
                                </td>
                                <td>UnKnown</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3
                                    <input id="PersonID" name="PersonID" type="hidden" value="3" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/3">Janet Leverling</a>
                                </td>
                                <td>Steven Buchanan</td>
                                <td>Nancy Davolio</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4
                                    <input id="PersonID" name="PersonID" type="hidden" value="4" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/4">Marco Peacock</a>
                                </td>
                                <td>Test</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    5
                                    <input id="PersonID" name="PersonID" type="hidden" value="5" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/5">Steven Buchanan</a>
                                </td>
                                <td>UnKnown</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    6
                                    <input id="PersonID" name="PersonID" type="hidden" value="6" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/6">Michele Suyamatest</a>
                                </td>
                                <td>Steven Buchanan</td>
                                <td>Nancy Davolio</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    7
                                    <input id="PersonID" name="PersonID" type="hidden" value="7" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/7">Robert Kong</a>
                                </td>
                                <td>Marco Peacock</td>
                                <td>Janet Leverling</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    8
                                    <input id="PersonID" name="PersonID" type="hidden" value="8" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/8">Laura Callahan</a>
                                </td>
                                <td>Steven Buchanan</td>
                                <td>Nancy Davolio</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    9
                                    <input id="PersonID" name="PersonID" type="hidden" value="9" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/9">Anne Dodsworth</a>
                                </td>
                                <td>UnKnown</td>
                                <td>Michele Suyamatest</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    10
                                    <input id="PersonID" name="PersonID" type="hidden" value="10" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/10">Hunold Alexander</a>
                                </td>
                                <td>UnKnown</td>
                                <td>Michele Suyamatest</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    22
                                    <input id="PersonID" name="PersonID" type="hidden" value="22" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/22">Mike Bongiorno</a>
                                </td>
                                <td>UnKnown</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    38
                                    <input id="PersonID" name="PersonID" type="hidden" value="38" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/38">Time Oldman</a>
                                </td>
                                <td>Steven Buchanan</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-danger p-2">CHẾT</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    49
                                    <input id="PersonID" name="PersonID" type="hidden" value="49" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/49">Elefante Nicola</a>
                                </td>
                                <td>Mike Bongiorno</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    50
                                    <input id="PersonID" name="PersonID" type="hidden" value="50" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/50">Sakharam Bhabal</a>
                                </td>
                                <td>UnKnown</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    51
                                    <input id="PersonID" name="PersonID" type="hidden" value="51" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/51">Gangadhar Bhabal</a>
                                </td>
                                <td>Sakharam Bhabal</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    52
                                    <input id="PersonID" name="PersonID" type="hidden" value="52" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/52">Laghuttam Bhabal</a>
                                </td>
                                <td>Sakharam Bhabal</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    53
                                    <input id="PersonID" name="PersonID" type="hidden" value="53" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/53">Darpana Bhabal</a>
                                </td>
                                <td>UnKnown</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    54
                                    <input id="PersonID" name="PersonID" type="hidden" value="54" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/54">Sanket Bhabal</a>
                                </td>
                                <td>Gangadhar Bhabal</td>
                                <td>Darpana Bhabal</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    55
                                    <input id="PersonID" name="PersonID" type="hidden" value="55" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/55">blublub</a>
                                </td>
                                <td>Marco Peacock</td>
                                <td>Anne Dodsworth</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    56
                                    <input id="PersonID" name="PersonID" type="hidden" value="56" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/56">G</a>
                                </td>
                                <td>Marco Peacock</td>
                                <td>Nancy Davolio</td>
                                <td>
                                    <span class="badge badge-danger p-2">CHẾT</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    57
                                    <input id="PersonID" name="PersonID" type="hidden" value="57" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/57"></a>
                                </td>
                                <td>Steven Buchanan</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    58
                                    <input id="PersonID" name="PersonID" type="hidden" value="58" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/58">Test</a>
                                </td>
                                <td>Steven Buchanan</td>
                                <td>Nancy Davolio</td>
                                <td>
                                    <span class="badge badge-danger p-2">CHẾT</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    59
                                    <input id="PersonID" name="PersonID" type="hidden" value="59" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/59"></a>
                                </td>
                                <td>UnKnown</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-danger p-2">CHẾT</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    60
                                    <input id="PersonID" name="PersonID" type="hidden" value="60" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/60">Test now</a>
                                </td>
                                <td>Test</td>
                                <td>Darpana Bhabal</td>
                                <td>
                                    <span class="badge badge-danger p-2">CHẾT</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    61
                                    <input id="PersonID" name="PersonID" type="hidden" value="61" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/61">Test now&#39;s son</a>
                                </td>
                                <td>Test now</td>
                                <td>Darpana Bhabal</td>
                                <td>
                                    <span class="badge badge-danger p-2">CHẾT</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    62
                                    <input id="PersonID" name="PersonID" type="hidden" value="62" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/62">sdas</a>
                                </td>
                                <td>Robert Kong</td>
                                <td>Janet Leverling</td>
                                <td>
                                    <span class="badge badge-danger p-2">CHẾT</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    63
                                    <input id="PersonID" name="PersonID" type="hidden" value="63" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/63"></a>
                                </td>
                                <td>UnKnown</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-danger p-2">CHẾT</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    64
                                    <input id="PersonID" name="PersonID" type="hidden" value="64" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/64">Test Abbas</a>
                                </td>
                                <td>Marco Peacock</td>
                                <td>Nancy Davolio</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    65
                                    <input id="PersonID" name="PersonID" type="hidden" value="65" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/65">NEERAJ</a>
                                </td>
                                <td>Test</td>
                                <td>Anne Dodsworth</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    66
                                    <input id="PersonID" name="PersonID" type="hidden" value="66" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/66">testtttt</a>
                                </td>
                                <td>Sakharam Bhabal</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    67
                                    <input id="PersonID" name="PersonID" type="hidden" value="67" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/67">hassan</a>
                                </td>
                                <td>UnKnown</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    68
                                    <input id="PersonID" name="PersonID" type="hidden" value="68" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/68">fans</a>
                                </td>
                                <td>UnKnown</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-primary p-2">SỐNG</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    70
                                    <input id="PersonID" name="PersonID" type="hidden" value="70" />
                                </td>
                                <td>
                                    <a class="alert-link" href="/Person/Edit/70">Test Abbas</a>
                                </td>
                                <td>UnKnown</td>
                                <td>UnKnown</td>
                                <td>
                                    <span class="badge badge-danger p-2">CHẾT</span>

                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</main>
@endsection