<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function getLogin(){
		return view('admin.loginadmin');
	}
    public function getIndex()
    {
    	return view('admin.dashboard');
    }
}
