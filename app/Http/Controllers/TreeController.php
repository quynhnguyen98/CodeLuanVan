<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class TreeController extends Controller
{
    public function cay_gia_pha(){
		$admin = Session::get('hoten');
        if($admin){
			return view('admin.tree');
        }else
		    return Redirect('/login_');
	}
}
