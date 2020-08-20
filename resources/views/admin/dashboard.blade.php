@extends('admin')
@section('content')
<main class="app-content">




  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Tổng Quan</h1>
      <p>Keep your generation data.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Tổng quan</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon">
        <i class="icon fa fa-address-card fa-3x"></i>
        <div class="info">
          <h4>Users</h4>
          <p><b>{{$count}}</b></p>
         
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon">
        <i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>Người</h4>
          <p><b>{{$arr['tong']}}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon">
        <i class="icon fa fa-male fa-3x"></i>
        <div class="info">
          <h4>Nam</h4>
          <p><b>{{$arr['nam']}}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon">
        <i class="icon fa fa-female fa-3x"></i>
        <div class="info">
          <h4>Nữ</h4>
          <p><b>{{$arr['nu']}}</b></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="tile">
        <h3 class="tile-title">Tổng số Nam/Nữ</h3>
        <div class="embed-responsive embed-responsive-16by9">
          <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
        </div>
      </div>
    </div>


    <div class="col-md-6">
      <div class="tile">
        <h3 class="tile-title">Bảng Sống Còn</h3>
        <table class="table table-hover table-bordered" id="peopleTable">
          <tbody>
            <tr>
              <td width="100">
               <img class="rounded-circle" style="height: 60px;display: block;width: 60px;margin:0px auto;"
                  src="public/adminFE/images/download.png" alt="Photo">

              </td>
              <td>
                
                <span style="font-size:11px;">
                  <strong>Chết: </strong>{{$count1}}<br />

                </span>
              </td>
              <td width="55px">
                <span class="badge badge-danger p-2">CHẾT</span>
              </td>
            </tr>
            <tr>
              <td width="100">


                <img class="rounded-circle" style="height: 60px;display: block;width: 60px;margin:0px auto;"
                  src="public/adminFE/images/heart.png" alt="Photo">

              </td>
              <td>
                <span style="font-size:11px;">
                  <strong>Sống: </strong>{{$count2}}<br />
      
                </span>
              </td>
              <td width="55px">
                <span class="badge badge-success p-2">SỐNG</span>
              </td>
            </tr>
        
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@endsection