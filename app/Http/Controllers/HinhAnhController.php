<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HinhAnhController extends Controller
{
    public function xoahinh($id_hinh)
    {
    	DB::table('hinhanh')->where('hinhanh.id_hinh',$id_hinh)->delete();
    }
}
