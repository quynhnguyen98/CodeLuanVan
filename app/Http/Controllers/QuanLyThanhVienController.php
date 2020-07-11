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
        $admin = Session::get('hoten');
        if($admin){
            return view('admin.qltv');
        }else
            return Redirect('/login_');
    }

    public function quan_ly_thanh_vien(){
        $this->ck_login();
        
        $all_thanhvien=DB::table('nguoi')->get();
        $nguongoc =DB::table('nguongoc')->get();
        
        // $mqh=DB::table('nguoi')->join('nguongoc','nguoi.id_nguoi','=','nguongoc.id_nguoi')
        // ->where('nguongoc.id_nguoi_moiquanhe',$all_thanhvien[4]->id_nguoi)->get();

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
        //     //echo $id->id_nguoi;

        //         if($id->id_nguoi == $ng->id_nguoi_moiquanhe){
        //     //     $mqh=DB::table('nguoi')->join('nguongoc','nguoi.id_nguoi','=','nguongoc.id_nguoi')
        //     //  ->where('nguongoc.id_nguoi_moiquanhe',$id->id_nguoi)->get();
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
        //print_r($all_thanhvien[1]->id_nguoi);
            
        
        //$qltv=view('admin.qltv')->with('all_thanhvien',$all_thanhvien);
        //return view('ad_qltv')->with('admin.qltv',$qltv);
       return view('admin.qltv',compact('all_thanhvien'))->with('nguongoc',$nguongoc);;
    
    }
    public function xoa_thanh_vien($id_nguoi){
        $this->ck_login();
        // $data=AjaxCrud::findOrFail($id_nguoi);
        // $data->delete();
        DB::table('nguoi')->where('id_nguoi',$id_nguoi)->delete();
        //return Redirect::to('/quan-ly-thanh-vien');
    }
}