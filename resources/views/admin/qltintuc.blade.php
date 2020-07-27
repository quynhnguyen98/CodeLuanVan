@extends('ad_qltv')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Quản lý tin tức</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tiêu đề không dấu</th>
                      <th>Tiêu đề</th>
                      <th>Nội dung</th>
                      <th>Ngày đăng</th>
                      <th>Người đăng</th>
                      <th>Lượt xem</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tintuc as $tt)
                    <tr>
                      <td>{{$tt->id_tintuc}}
                        <input id="PostID" name="PostID" type="hidden" value="{{$tt->id_tintuc}}" /></td>
                      <td style="width: 200px;">{{$tt->tieudekhongdau}}</td>
                      <td style="width: 300px;">{{$tt->tieude}}</td>
                      <td style="width: 550px;"><?php echo substr($tt->noidung_tt,0,350).'...' ?></td>
                      <td>{{$tt->ngaydang}}</td>
                      <td>{{$tt->tendangnhap}}</td>
                      <td>{{$tt->luotxem}}</td>
                      <td> <a class="btn btn-danger btn-sm DeletePost" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                            {{-- <a  href="{{URL::to('/xoa-tin-tuc/'.$tt->id_tintuc)}}"> Xóa</a> --}}
                                          </td>
                     
                    </tr>                     
                    @endforeach

                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection