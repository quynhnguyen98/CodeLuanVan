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
            $dsthehe=DB::table('nguongoc')->orderBy('id','desc')->get();
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
            print_r($arr);
            for($i=count($arr)-1;$i>=0;$i--)
            {
                print_r($arr[$i]);
                print_r(" ");
            }
        }else
		    return Redirect('/login_');
    }
}
