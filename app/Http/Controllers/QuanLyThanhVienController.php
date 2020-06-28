<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class QuanLyThanhVienController extends Controller
{
    public function quan_ly_thanh_vien(){
        $admin = Session::get('hoten');
        if($admin){
			return view('admin.qltv');
        }else
		    return Redirect('/login_');
    }
}
