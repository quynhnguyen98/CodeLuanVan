<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ThongTinThanhVienController extends Controller
{
    public function thong_tin_thanh_vien(){
        $admin = Session::get('admin')->tendangnhap;
        if ($admin!='') {
			return view('admin.information');
        }else
		    return Redirect('/login_');
    }
}
