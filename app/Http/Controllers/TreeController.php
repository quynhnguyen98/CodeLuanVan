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

		$nguongoc=DB::table('nguongoc')->get();


		$flag=0;
		foreach($nguongoc as $v)
		{
			if($v->pid==$id)
			{
				$flag=1;
			}
		}
		if($flag==0)
		{
			DB::table('nguoi')->where('id',$id)->delete();
		}
	}
   public function edit_tree(Request $rq, $id)
   {
	//    print_r($rq->all());
	$arr = [
		'hoten' => $rq->hoten,
		'gioitinh' => $rq->gioitinh,
		'ngaysinh' => date('yy-m-d', strtotime($rq->ngaysinh)),
		'ngaymat' => date('yy-m-d', strtotime($rq->ngaymat)),
		'hinhanh' => $rq->hinhanh,
		'tieusu' => strip_tags($rq->tieusu),
		'tinhtrang' => $rq->tinhtrang,
	];

		// $destinationPath = 'public/img_person/';
		// $files = $rq->file('hinhanh');
		// $file_name = $files->getClientOriginalName();
		// $files->move($destinationPath , $file_name);
		// print_r($files);
	DB::table('nguoi')->where('id',$id)->update($arr);
	//return view('admin.customer.listCustomer')->with('users',$users);
 //	return view('admin.tree');
	
	

	
   }
   public function add_tree(Request $rq, $pid)
   {
	//    print_r($pid);
	//    return view('admin.addperson');
		
   }
}
