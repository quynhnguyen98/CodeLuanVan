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
                                <th>Người thân</th>
                                <th>Hình ảnh</th>
                                <th width="35">Trạng thái</th>
                                <th width="55"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // $mqh=DB::table('nguoi')->select('hoten')->join('nguongoc','nguoi.id_nguoi','=','nguongoc.id_nguoi')
                            //     ->where('nguongoc.id_nguoi_moiquanhe',2)->first();
                         
                                ?>
                            @foreach($all_thanhvien as $k)
                            <tr>
                                <td>
                                    {{$k->id}}
                                    <input id="PersonID" name="PersonID" type="hidden" value="{{$k->id}}" />
                                </td>
                                <td>
                                    <a class="alert-link" href="{{URL::to('/thong-tin-thanh-vien')}}">{{$k->hoten}}</a>
                                </td>
                                
                              <?php
                              
                                // $mqh=DB::table('nguoi')->join('nguongoc','nguoi.id_nguoi','=','nguongoc.id_nguoi')
                                // ->where('nguongoc.id_nguoi_moiquanhe',$k->id_nguoi)->value('hoten');
                              
                              ?>
                             <td>
                               
                                <?php
                                $fl = false;
                                foreach($nguongoc as $gt){
                                    if($gt->pid == $k->id){
                                        
                                        foreach($all_thanhvien as $v){
                                            if($gt->id == $v->id && $v->gioitinh=="Nam"){
                                                echo $v->hoten;
                                                $fl = true;
                                            }
                                            
                                        }
                                       
                                    }
                                }
                                if(!$fl) 
                                    echo "Không có";
                                ?>
                            </td>
                            <td>
                              
                               <img src="public/img_person/{{$k->hinhanh}}" alt="" height="50" width="50" >
                            </td>
                                

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