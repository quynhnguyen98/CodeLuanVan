<?php

namespace App\Http\Controllers;
use DB,Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;

class TinTucController extends Controller
{

    public function ck_login()
    {
        $admin = Session::get('hoten');
        if ($admin!='') {
            return view('admin.qltintuc');
        } else {
            return Redirect('/login_');
         }
    }
    public function getIndex(){
            $this->ck_login();
            $tintuc=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','taikhoan.tendangnhap',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')
            ->join('taikhoan','tintuc.id_taikhoan','=','taikhoan.id_taikhoan')
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','taikhoan.tendangnhap')
            ->get();
    	    return view('admin.qltintuc',compact('tintuc'));    
    	
    }
    public function xoa_post($id_tintuc){
         $this->ck_login();
        // $data=AjaxCrud::findOrFail($id_nguoi);
        // $data->delete();
        DB::table('tintuc')->where('id_tintuc',$id_tintuc)->delete();
        //return Redirect::to('/quan-ly-thanh-vien');
    	}
    
}
