<?php

namespace App\Http\Controllers;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
class NgaySuKienController extends Controller
{
    public function ngay_su_kien(){
        $admin = Session::get('hoten');
        if($admin){
			return view('admin.event');
        }else
		    return Redirect('/login_');
    }
        }
    }
}
