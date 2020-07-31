<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;

class HinhAnhController extends Controller
{
    public function xoahinh($id_hinh)
    {
    	DB::table('hinhanh')->where('hinhanh.id_hinh',$id_hinh)->delete();
    }
    public function getIndex(){
    	$hinhanh=DB::table('hinhanh')->leftjoin('tintuc','hinhanh.id_tintuc','=','tintuc.id_tintuc')->get();
    	return view('admin.qlpicture',compact('hinhanh'));
    }
    public function themhinh(){
    	return view('admin.addhinh1');
    }public function savehinh(Request $rq)
    {
    	$file=$rq->filehinh;
        $tenhinh=array();
        if(isset($file))
        {
            $id=$rq->ImageID;
            for($i=0;$i<count($file);$i++)
            {
                $name=$file[$i]->getClientOriginalName();
                $file[$i]->move("public/frontend/images",$name);
                array_push($tenhinh, $name);
            }
            for($i=0;$i<count($file);$i++)
            {
                DB::table('hinhanh')->insert(['tenhinh'=>$tenhinh[$i]]);
            }
        }
        return Redirect('/quan-ly-hinh-anh'); 
    }
}
