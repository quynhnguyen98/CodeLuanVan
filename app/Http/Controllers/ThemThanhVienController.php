<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ThemThanhVienController extends Controller
{
    public function them_thanh_vien(){
        $admin = Session::get('hoten');
        if($admin){
            $all_thanhvien=DB::table('nguoi')->join('tinh','nguoi.id_tinh','=','tinh.id_tinh')->get();
            $tinh=DB::table('tinh')->get();
			return view('admin.addperson',compact('all_thanhvien','tinh'));
        }else
		    return Redirect('/login_');
    }

    public function save_person(Request $request){
        //  dd($request->all());
        
        $_nguoi = DB::select("SHOW TABLE STATUS LIKE 'nguoi'");
        $_id_nguoi = $_nguoi[0]->Auto_increment;
        $id_nguoi = (int)$_id_nguoi;
        if($request->IsAlive)
            $t='Sống';
        else
            $t='Chết'; 


        if(strtotime($request->ngaymat)=='')
        {
            $ngay=null;
        }
        else{
            $ngay=date('yy-m-d',strtotime($request->ngaymat));
        }
        
        $arr=[
            'hoten'=>$request->hoten,
            'gioitinh'=>$request->gioitinh,
            'ngaysinh'=>date('yy-m-d',strtotime($request->ngaysinh)),
            'ngaymat'=>$ngay,
            'hinh'=>$request->PhotoFileName,
            'tieusu'=>$request->tieusu,
            'id_tinh'=>$request->tinh,
            'tinhtrang'=>$t,
            ];
            // print_r($request->all());
            print_r($arr);
        // print_r($arr);
        DB::table('nguoi')->insert($arr);
      
        $dataNguonGoc['id_nguoi'] = $request->FatherID;
        $dataNguonGoc['id_nguoi_moiquanhe'] = $id_nguoi;
        DB::table('nguongoc')->insert($dataNguonGoc);
        return redirect('/quan-ly-thanh-vien');
       
    }

    
}
