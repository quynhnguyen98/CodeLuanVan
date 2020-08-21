@extends('ad_qltv')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Quản Lý Tài Khoàn</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active"><a href="#">Quản Lý Tài Khoàn</a></li>
    </ul>
  </div>
  @if(session('mess'))
  <div class="alert alert-success">
    <ul>
      <li>{{ session('mess') }}</li>
    </ul>
  </div>
  @endif

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <form action="{{URL::to('/cap-nhat-phan-quyen/'.$id)}} " method="get">
              
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Chức Năng</th>
                    <th>Chọn Kích Hoạt</th>
                  </tr>
                </thead>

                <tbody>  
                
                 
                  @foreach($arr_function as $k=>$v)
                  <tr>
                    <td>{{$v}}</td>
                    <?php
                  $mang=json_decode($vaitro, true);
                      ?>
                        <td><input type="checkbox" <?php if(isset($mang[$k])) echo "checked";?> name="{{$k}}" value="{{$k}}"></td>
                    
                    
                  </tr>
                  @endforeach
                  <input type="hidden" name="id" value="{{$id}}">
                </tbody>
              </table>
              <td> <i class="fa fa-pencil"><input type="submit" value="Cập Nhật"></i> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

@endsection