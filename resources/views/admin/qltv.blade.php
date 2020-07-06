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
                            @foreach($all_thanhvien as $k)
                            <tr>
                                <td>
                                    {{$k->id_nguoi}}
                                    <input id="PersonID" name="PersonID" type="hidden" value="{{$k->id_nguoi}}" />
                                </td>
                                <td>
                                    <a class="alert-link" href="{{URL::to('/thong-tin-thanh-vien')}}">{{$k->hoten}}</a>
                                </td>
                                
                                {{-- <td>{{$a->hoten}}</td> --}}
                                <td>sfdb</td>
                                
                                <td>UnKnown</td>


                                <td>
                                    @if($k->tinhtrang=='Sống')
                                    
                                        <span class="badge badge-primary p-2">{{$k->tinhtrang}}</span>
                                    
                                    @elseif($k->tinhtrang=='Chết')
                                        <span class="badge badge-danger p-2">{{$k->tinhtrang}}</span>
                                    @else
                                        <span class="badge badge-warning p-2">{{$k->tinhtrang}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm DeletePerson" href="javascript:void(0);"><i
                                            class="fa fa-trash-o"></i> Xóa</a>
                                            <a href="{{URL::to('/xoa-thanh-vien/'.$k->id_nguoi)}}">Xoa</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</main>
@endsection