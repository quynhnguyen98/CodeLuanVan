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
		return view('admin.loginadmin');
	}
    public function getIndex(Request $request)
    {
		$adrule=[
			'adtext'=>'required',
			'adpassword'=>'required'
		];
		$admess=[
			'adtext.required'=>'Tai Khoan khong duoc trong',
			'adpassword.required'=>'Mat khau khong duoc trong',
		];
		$validator=Validator::make($request->all(),$adrule,$admess);
		if ($validator->fails()) {
            return redirect('admin')->withErrors($validator);
        } else {
          $adtext = $request->input('adtext');
          $adpassword = md5($request->input('adpassword'));
		  $result=DB::table('taikhoan')->join('nguoi','taikhoan.id_nguoi','=','nguoi.id_nguoi')
		  ->where('tendangnhap',$adtext)->where('matkhau',$adpassword)->first();	
			if($result!='')
			{
				Session::put('hoten',$result->hoten);
				return view('admin.dashboard');
			}
			else
				return Redirect('/admin');
        }
	}
	public function getLogout(){
		Session::flush();
		return Redirect('/admin');
	}
		
}
