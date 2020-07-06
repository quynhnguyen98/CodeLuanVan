<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ThemThanhVienController extends Controller
{
    public function them_thanh_vien(){
        $admin = Session::get('hoten');
        if($admin){
			return view('admin.addperson');
        }else
		    return Redirect('/login_');
    }

    
}
