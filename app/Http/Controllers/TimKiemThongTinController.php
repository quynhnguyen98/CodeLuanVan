<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class TimKiemThongTinController extends Controller
{
    public function tim_kiem_thong_tin(){
		$admin = Session::get('hoten');
        if($admin){
			return view('admin.searchinformation');
        }else
		    return Redirect('/login_');
	}
}
