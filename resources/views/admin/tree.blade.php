@extends('ad_caygiapha')
@section('content')
<main class="app-content">

    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i> Cây Gia Phả</h1>
            <p>All person information will be listed here.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">tree-family</a></li>
        </ul>
    </div>

    <div class="tile">
        <div class="tile-body">

            
            <div style="width:100%; height:700px;" id="orgchart"/>
            <div id="tree"/>

        </div>
    </div>

</main>
@endsection