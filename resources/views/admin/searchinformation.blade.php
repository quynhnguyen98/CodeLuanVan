@extends('ad_timkiemthongtin')
@section('content')


<main class="app-content">
  
  <div class="app-title">
    <div>
      <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
      <p>A Printable Invoice Format</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Invoice</a></li>
    </ul>
  </div>
  <div class="col-md-13">
    <div class="tile">
      <div class="form-group">
        <label class="col-form-label" for="inputDefault">Default input</label>
        <input class="form-control" id="inputDefault" type="text">
      </div>
      <div class="bs-component">
        <span class="badge badge-pill badge-primary">Nam:...</span>
        <span class="badge badge-pill badge-secondary">Nữ:...</span>
        <span class="badge badge-pill badge-success">Tổng số:...</span>
        <span class="badge badge-pill badge-danger">Số người được lọc:...</span>
      </div>
    </div>
  
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        
        <div class="col-lg-3">
          <div class="bs-component">
            <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <a href="{{URL::to('/thong-tin-thanh-vien')}}"><h6 class="modal-title">Modal title</h6></a>
                  </div>
                  <div class="modal-body">
                    <p>Modal body text goes here.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</main>
@endsection