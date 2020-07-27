<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class TreeController extends Controller
{
    public function cay_gia_pha(){
		$admin = Session::get('hoten');
        if($admin){
			return view('admin.tree');
        }else
		    return Redirect('/login_');
	}																														
	public function data_tree(){
		// $id_nguoi=DB::table('nguoi')->select('id_nguoi')->where('id_nguoi','>',0)->pluck('id_nguoi');
		// $id_nguongoc=DB::table('nguongoc')->select('id_nguoi')->where('id_nguoi','>',0)->pluck('id_nguoi');
		// for($i=0;$i<count($id_nguoi);$i++)
		// {																																																																																																																																																																																																																																												
		// 	for($j=0;$j<count($id_nguongoc);$j++)
		// 	{
		// 		if($id_nguoi[$i]==$id_nguongoc[$j])
		// 		{
		// 			$mqh=DB::table('nguoi')->join('nguongoc','nguoi.id_nguoi','=','nguongoc.id_nguoi_moiquanhe')
		// 			->where('nguongoc.id_nguoi',$id_nguoi[$i])->get();

		// 			// print_r($mqh);
		// 			break;
		// 		}
		// 	}
		// }
		$array=array();
		$nguoi=DB::table('nguoi')->select('nguoi.id','nguoi.hoten','nguongoc.pid','nguoi.gioitinh','nguoi.ngaysinh','nguoi.ngaysinh','nguoi.ngaymat','nguoi.hinh','nguoi.tieusu','nguoi.tinhtrang')
		->leftjoin('nguongoc','nguoi.id','=','nguongoc.id')->get();
		// $goc=DB::table('nguoi')->first();
		// 	array_push($array,$nguoi);
		// 	array_push($array[0],$goc);
		return $nguoi;
		
	}

}
