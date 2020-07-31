@extends('ad_themtv')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i> THÊM HÌNH ẢNH</h1>
            <p>Add person to include in our family tree.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Add Images</a></li>
        </ul>
    </div>

    <form action="{{URL::to('/save-image')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="tile mt-4 mb-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <h4 class="card-header text-white bg-info">
                            Hình Ảnh
                        </h4>
                        <div class="card-body">
                            <input name="__RequestVerificationToken" type="hidden"
                                value="-Tjtj3rvfWRi1-lKMVSSxn-JpR1wu7WgI-XqsZ2RMsBhcJCZdlDKNLG0_ApUlRxxwaAporj49f9simfmLu7Rg830_gTgoRjR_v31j0q7xd41" />


                            <div class="row">
                                
                                <div class="col-lg-8">

                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <label class="control-label">Thêm Hình</label> 
                                                <input name="filehinh[]" type="file" multiple>
                                                <span class="field-validation-valid" data-valmsg-for="PersonName"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"><i
                                    class="fa fa-fw fa-lg fa-check-circle"></i>Thêm mới</button>
                            
                                
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<script>
    function deathclick(){
        var checkBox = document.getElementById("ckb");
        var txtdate=document.getElementById("DateOfDeath");
        if(checkBox.checked==true)
            txtdate.disabled=false;
        else
        {
            txtdate.disabled=true;
            txtdate.value="null";

        }
           
    }
</script>
@endsection
