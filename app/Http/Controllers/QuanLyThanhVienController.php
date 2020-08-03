<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;
class QuanLyThanhVienController extends Controller
{
    public function ck_login()
    {
        $admin = Session::get('admin')->tendangnhap;
        if ($admin!='') {
            return view('admin.qltv');
        }else
            return Redirect('/login_');
    }

    public function quan_ly_thanh_vien(){
        $this->ck_login();
        
        $all_thanhvien=DB::table('nguoi')->get();
        $nguongoc =DB::table('nguongoc')->get();
        
       return view('admin.qltv',compact('all_thanhvien'))->with('nguongoc',$nguongoc);;
    
    }
    public function xoa_thanh_vien($id){
        $this->ck_login();
        // $data=AjaxCrud::findOrFail($id);
        // $data->delete();
        DB::table('nguoi')->where('id',$id)->delete();
        //return Redirect::to('/quan-ly-thanh-vien');
    }
}