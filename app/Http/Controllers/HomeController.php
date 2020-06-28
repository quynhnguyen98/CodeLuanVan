<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $slide=DB::table('slide')->get();
        $tintuc=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')
            ->groupBy('tintuc.id_tintuc','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang')
            ->get();
        $hinhanh=DB::table('hinhanh')->get();
        
   
        //return $tintuc;
        return view('pages.home',compact('slide','tintuc','hinhanh'));
    }
    public function getPost(){
        return view('pages.singlepost');
    }
    public function getTinTuc(){
        return view('pages.tintuc');
    }
     public function getGioithieu(){
        return view('pages.gioithieu');
    }
     public function getGopy(){
        return view('pages.gopy');
    }

    

}
