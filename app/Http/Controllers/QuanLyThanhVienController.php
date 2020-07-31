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
        
        // $mqh=DB::table('nguoi')->join('nguongoc','nguoi.id','=','nguongoc.id')
        // ->where('nguongoc.id_moiquanhe',$all_thanhvien[4]->id)->get();

        // echo "<pre>";
        // print_r($all_thanhvien);
        // echo "</pre>";
        //  echo "<pre>";
        // print_r($nguongoc);
        // echo "</pre>";

        // $a=array();
        // $flag = false;
        // foreach($all_thanhvien as $id){
        //     foreach($nguongoc  as $ng){
        //     //echo $id->id;

        //         if($id->id == $ng->id_moiquanhe){
        //     //     $mqh=DB::table('nguoi')->join('nguongoc','nguoi.id','=','nguongoc.id')
        //     //  ->where('nguongoc.id_moiquanhe',$id->id)->get();
        //            // $flag = true;
        //             echo $id->hoten;
        //         }
        
        //     //array_push($a,$mqh);
                
        //     }

        
        // }
        // // echo "<pre>";
        // print_r($a);
        // echo "</pre>";
        // foreach($a as $v){
        //     echo "<pre>";
        //     print_r($v);
        //     echo "</pre>"; 
        // }
      
        
        //$qltv=view('admin.qltv')->with('all_thanhvien',$all_thanhvien)->with('mqh',$mqh);
        //print_r($all_thanhvien[1]->id);
            
        
        //$qltv=view('admin.qltv')->with('all_thanhvien',$all_thanhvien);
        //return view('ad_qltv')->with('admin.qltv',$qltv);
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