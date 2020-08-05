@extends('ad_qltv')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>QUẢN LÝ HÌNH ẢNH</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Quản lý hình ảnh</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <a  class="btn btn-success icon-btn" href="{{URL::to('/them-hinh-anh')}}"><i class="fa fa-plus"></i>Thêm Hình Ảnh</a>
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên Hình</th>
                      <th>Hình Ảnh</th>
                      <th>Trong Tin Tức</th>
                      <th>Chọn hình thay thế</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($hinhanh as $a)
                    <tr>
                      <td>{{$a->id_hinh}}
                       <input id="ImageID" name="ImageID[]" type="hidden" value="{{$a->id_hinh}}" /></td>
                      <td>{{$a->tenhinh}}</td>
                       <td><img id="hinhtintuccon" src="{{URL::to('public/frontend/images/'.$a->tenhinh)}}" style="width:auto;height: 200px;"></td>
                        @if($a->tieude)
                              <td>{{$a->tieude}}</td>
                        @else
                              <td>Không Thuộc Tin Tức Nào</td>
                        @endif
                      <td> <a class="btn btn-danger btn-sm DeleteImage" href="javascript:void(0);"><i
                                                                         class="fa fa-trash-o"></i> Xóa</a>
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