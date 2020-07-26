<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function getIndex(){
    	$tintuc=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','taikhoan.tendangnhap',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')
            ->join('taikhoan','tintuc.id_taikhoan','=','taikhoan.id_taikhoan')
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','taikhoan.tendangnhap')
            ->get();
    	return view('admin.qltintuc',compact('tintuc'));
    }
    public function xoa_post($id){
        $this->ck_login();
        // $data=AjaxCrud::findOrFail($id_nguoi);
        // $data->delete();
        DB::table('tintuc')->where('id_tintuc',$id)->delete();
        //return Redirect::to('/quan-ly-thanh-vien');
    	}
    
}
