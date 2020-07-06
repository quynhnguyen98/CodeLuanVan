<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;
class QuanLyThanhVienController extends Controller
{
    public function ck_login()//url: cklogin e moi test hàm này th
    {
        $admin = Session::get('hoten');
        if($admin){
            return view('admin.qltv');
        }else
            return Redirect('/login_');
    }

    public function quan_ly_thanh_vien(){
         $this->ck_login();
        $all_thanhvien=DB::table('nguoi')->get();
        $mqh=DB::table('nguoi')->join('nguongoc','nguoi.id_nguoi','=','nguongoc.id_nguoi')
        ->where('nguongoc.id_nguoi_moiquanhe',$all_thanhvien);
        $qltv=view('admin.qltv')->with('all_thanhvien',$all_thanhvien)->with('mqh',$mqh);
        return view('ad_qltv')->with('admin.qltv',$qltv);
        
    }
    public function xoa_thanh_vien($id_nguoi){
        $this->ck_login();
        // $data=AjaxCrud::findOrFail($id_nguoi);
        // $data->delete();
        DB::table('nguoi')->where('id_nguoi',$id_nguoi)->delete();
        //return Redirect::to('/quan-ly-thanh-vien');
    }
}