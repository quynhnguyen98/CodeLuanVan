<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Session;
use Redirect;

class AdminController extends Controller
{
	public function getLogin(){
		return Redirect('/login_');
	}
	public function getLogin_(){
		return view('admin.loginadmin');
	}
    public function getIndex(Request $request)
    {
		$adtext = $request->input('adtext');
		$adpassword = md5($request->input('adpassword'));
		$result=DB::table('taikhoan')->join('nguoi','taikhoan.id','=','nguoi.id')
		->where('tendangnhap',$adtext)->where('password',$adpassword)->first();	
		if($result!='')
		{
			Session::put('admin',$result);
					$data=DB::table('nguoi')->get();
						$nam=0;
						$nu=0;
						foreach($data as $dt)
						{
							if($dt->gioitinh=='Nam')
							{
								$nam+=1;
							}
							else
								$nu+=1;
						}
						$arr=[
							'nam'=>$nam,
							'nu'=>$nu,
							'tong'=>$nam+$nu,
						];
					$data1=DB::table('taikhoan')->where('vaitro',0)->get();
					$count=count($data1);
					$data2=DB::table('nguoi')->where('tinhtrang','Chết')->get();
					$count1=count($data2);
					$data3=DB::table('nguoi')->where('tinhtrang','Sống')->get();
					$count2=count($data3);
			return view('admin.dashboard',compact('arr','count','count1','count2'));
		}else {
			return Redirect('/admin');
		}
		


			
		
	}
	public function getLogout(){
		Session::flush();
		return Redirect('/admin');
	}
	public function getInfo(){
		$data=DB::table('nguoi')->get();
		$nam=0;
		$nu=0;
		foreach($data as $dt)
		{
			if($dt->gioitinh=='Nam')
			{
				$nam+=1;
			}
			else
				$nu+=1;
		}
		$arr=[
			'nam'=>$nam,
			'nu'=>$nu,
			'tong'=>$nam+$nu,
		];
		return $arr;
	}
}
