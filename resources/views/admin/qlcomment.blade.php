@extends('ad_qltv')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Quản Lý Bình Luận</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Quản Lý Bình Luận</a></li>
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
                      <th>Nội Dung Comment</th>
                      <th>Ngày Comment</th>
                      <th>Tài khoản</th>
                      <th>Bài đăng</th>
                      <th>Ẩn/Hiện</th>
                      <th width="55"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cmt as $c)
                    <tr>
                      <td>{{$c->id_gopy}}
                       <input id="CommentID" name="CommentID" type="hidden" value="{{$c->id_gopy}}" /></td>
                      <td>{{$c->noidung}}</td>
                      <td>{{$c->created_at}}</td>
                      <td>{{$c->tendangnhap}}</td>
                      <td><?php if($c->tieude)
                                echo $c->tieude;
                                else
                                  echo 'Không thuộc tin tức';
                       ?>
                      </td>
                      <td>
                        <?php
                          if($c->status==1){
                        ?>

                            <a href="{{URL::to('/unactive/'.$c->id_gopy)}}"><span class="fa-thumbs-styling fa fa-thumbs-up" ></span></a>
                          <?php
                          }
                          else
                          {
                          ?>
                            <a href="{{URL::to('/active/'.$c->id_gopy)}}"><span class="fa-thumbs-styling fa fa-thumbs-down"></span></a>
                          <?php
                          }
                        ?>
                      </td>
                      <td>
                       <a class="btn btn-danger btn-sm DeleteComment" href="javascript:void(0);"><i
                                                                         class="fa fa-trash-o"></i> Xóa</a>  </td>
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