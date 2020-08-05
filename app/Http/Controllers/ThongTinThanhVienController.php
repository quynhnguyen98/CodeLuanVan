<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ThongTinThanhVienController extends Controller
{
    public function thong_tin_thanh_vien($id){
        $admin = Session::get('admin')->tendangnhap;
        if ($admin!='') {
            $data=DB::table('nguoi')->join('tinh','nguoi.id_tinh','=','tinh.id_tinh')->where('id',$id)->get();
            $nguoithan=DB::table('nguoi')->join('nguongoc','nguoi.id','=','nguongoc.pid')->where('nguongoc.id',$id)->get();
            // dd($nguoithan);
            $thehe=DB::table('nguongoc')->where('id',$id)->get();
            
            $arr1=array();
            $dsthehe=DB::table('nguongoc')->orderBy('id','desc')->get();
            $dem=0;
            $tongnam=0;
            $tongnu=0;
            $slcon=DB::table('nguongoc')->select('nguoi.hoten','nguoi.gioitinh')->join('nguoi','nguoi.id','=','nguongoc.id')->where('pid',$id)->get();
            //print_r($slcon);
            foreach($slcon as $soluong)
            {
                if($soluong->gioitinh=="Nam")
                {
                    $tongnam+=1;
                }
                else{
                    $tongnu+=1;
                }
            }

            $sl=count($slcon);
            if(count($thehe)==0)
            {
                $temp=0;
                return view('admin.information',compact('data','nguoithan','arr1','sl','tongnam','tongnu'));
            }
            else
            {
            $mang=$thehe[0];
            $temp=$mang->pid;
            $arr=array();
            array_push($arr,$mang->id);
            foreach($dsthehe as $v)
            { 
                if($temp==$v->id)
                {
                    array_push($arr,$temp);
                    $temp=$v->pid;
                }
            } 
            if($temp==1)
                array_push($arr,$temp);
            //print_r($arr);
            $arr1=array_reverse($arr);
            //print_r($arr1);
         
            return view('admin.information',compact('data','nguoithan','arr1','sl','tongnam','tongnu'));
            }
        }else
		    return Redirect('/login_');
    }
}
