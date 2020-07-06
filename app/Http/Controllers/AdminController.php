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
		$admin = Session::get('hoten');
        if($admin){
			return view('admin.dashboard');
        }else
		return Redirect('/login_');
	}
	public function getLogin_(){
		$admin = Session::get('hoten');
        if($admin){
            return Redirect::to('/admin');
        }else
		return view('admin.loginadmin');
	}
    public function getIndex(Request $request)
    {
		$adtext = $request->input('adtext');
		$adpassword = md5($request->input('adpassword'));
		$result=DB::table('taikhoan')->join('nguoi','taikhoan.id_nguoi','=','nguoi.id_nguoi')
		->where('tendangnhap',$adtext)->where('password',$adpassword)->first();	
		if($result!='')
		{
			Session::put('hoten',$result->hoten);
			
			return view('admin.dashboard');
		}else {
			return Redirect('/admin');
		}
		


			
		
	}
	public function getLogout(){
		Session::flush();
		return Redirect('/admin');
	}
		
}
