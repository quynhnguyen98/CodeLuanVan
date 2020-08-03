<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class TreeController extends Controller
{
    public function cay_gia_pha(){
		 $admin = Session::get('admin')->tendangnhap;
        if ($admin!='') {
			return view('admin.tree');
        }else
		    return Redirect('/login_');
	}																														
	public function data_tree(){
		$array=array();
		$nguoi=DB::table('nguoi')->select('nguoi.id','nguoi.hoten','nguongoc.pid','nguoi.gioitinh','nguoi.ngaysinh','nguoi.ngaysinh','nguoi.ngaymat','nguoi.hinhanh','nguoi.tieusu','nguoi.tinhtrang')
		->leftjoin('nguongoc','nguoi.id','=','nguongoc.id')->get();
		return $nguoi;
		
	}
	public function changedata_tree(Request $rq,$id,$pid){
		 $data=DB::table('nguongoc')->get();
		foreach($data as $k=>$v)
		{
			if($v->id==$id)
			{
				$data = array();
				$data['id'] = $id;
				$data['pid'] = $pid;
				 $re = DB::table('nguongoc')->where('id',$id)->update($data);
				
			}
		}
	}
	public function remove_tree($id){
		// print_r($id);
		$nguongoc=DB::table('nguongoc')->get();
		foreach($nguongoc as $v)
		{
			if($id==$v->id)
			{
				$temp=$v->pid;
				break;
			}
		}
		foreach($nguongoc as $v)
		{
			if($id==$v->pid)
			{
				$temp=$v->pid=$temp;
				DB::table('nguongoc')->where('pid',$id)->update(['pid'=>$temp]);
			}
		}
		DB::table('nguoi')->where('id',$id)->delete();
   }
   public function edit_tree(Request $rq, $id)
   {
	//    print_r($rq);
   }
}
