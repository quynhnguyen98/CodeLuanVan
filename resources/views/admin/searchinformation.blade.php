@extends('ad_timkiemthongtin')
@section('content')


<main class="app-content">
        


  <div class="app-title">
      <div>
          <h1><i class="fa fa-dashboard"></i> People</h1>
          <p>All person information will be listed here.</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">People</a></li>
      </ul>
  </div>
  
  <div class="tile">
      <div class="row">
          <div class="col-lg-12">
              <div class="input-group">
                    <div class="input-group-btn search-panel">
  
                      
                  </div>
                  <input type="hidden" name="search_param" value="all" id="search_param">
                  <input type="text" class="form-control searchbox-input" name="searchbox-input" placeholder="Search term..">
                  <button type="button" class="btn btn-secondary btn-sm clear-filter ml-1">Clear</button>
              </div>
              <div class="row">
                  <div class="col-lg-6 pt-2">
                      <span id="filterBy" class=""><strong>Note:</strong><i> Filtered by Contains</i></span>
                  </div>
                  <div class="col-lg-6 pt-2">
                      <div class="pull-right">
                          <span id="totalMale" class="badge badge-primary">Male: </span>
                          <span id="totalFemale" class="badge badge-danger">Female: </span>
                          <span id="totalPeople" class="badge badge-info">People: </span>
                          <span id="filteredPeople" class="badge badge-success">Filtered: </span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  
  <div class="tile">
      <div class="row cards-container">
              <div class="col-lg-3">
                  <div class="card mb-3">
                      <h6 class="card-header">
                          <a class="text-dark" href="{{URL::to('/thong-tin-thanh-vien')}}">
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                              Nancy Davolio (<span class="gender">Female</span>)
                          </a>
                      </h6>
                      <div class="card-body p-0">
  
  
                    <img class="rounded-circle" style="height: 100px;display: block;width: 100px;margin: 30px auto;" src="/Content/photos/EFfwtAVUEAABogY.jpg" alt="EFfwtAVUEAABogY.jpg Photo">
  
                      </div>
                  </div>
              </div>
      </div>
  </div>
  
  
  
  
  
      </main>
@endsection