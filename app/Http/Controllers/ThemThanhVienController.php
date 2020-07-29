<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;

class ThemThanhVienController extends Controller
{
    public function them_thanh_vien()
    {
        $admin = Session::get('admin')->tendangnhap;
        if ($admin!='') {
            $all_thanhvien = DB::table('nguoi')->join('tinh', 'nguoi.id_tinh', '=', 'tinh.id_tinh')->get();
            $tinh = DB::table('tinh')->get();
            return view('admin.addperson', compact('all_thanhvien', 'tinh'));
        } else
            return Redirect('/login_');
    }

    public function save_person(Request $request)
    {
        //  dd($request->all());

        $_nguoi = DB::select("SHOW TABLE STATUS LIKE 'nguoi'");
        $_id = $_nguoi[0]->Auto_increment;
        $id = (int) $_id;
        if ($request->IsAlive)
            $t = 'Sống';
        else
            $t = 'Chết';


        if (strtotime($request->ngaymat) == '') {
            $ngay = null;
        } else {
            $ngay = date('yy-m-d', strtotime($request->ngaymat));
        }

        $arr = [
            'hoten' => $request->hoten,
            'gioitinh' => $request->gioitinh,
            'ngaysinh' => date('yy-m-d', strtotime($request->ngaysinh)),
            'ngaymat' => $ngay,
            'hinh' => $request->PhotoFileName,
            'tieusu' => $request->tieusu,
            'id_tinh' => $request->tinh,
            'tinhtrang' => $t,
        ];
        // print_r($request->all());
        print_r($arr);
        // print_r($arr);
        DB::table('nguoi')->insert($arr);


        $dataNguonGoc['id'] =$id ;
        $dataNguonGoc['pid'] = $request->FatherID;
        DB::table('nguongoc')->insert($dataNguonGoc);

        if ($request->ngaymat == null) {
            $start = Carbon::now()->year . '-' . date('m-d', strtotime($request->ngaysinh));
            $insertArr = [
                'title' => 'Sinh nhật của ' . $request->hoten,
                'start' => $start,
                'id_nguoi' => $id,
            ];
            DB::table('sukien')->insert($insertArr);
        } else {
            $start = Carbon::now()->year . '-' . date('m-d', strtotime($request->ngaysinh));
            $insertArr = [
                'title' => 'Sinh nhật của ' . $request->hoten,
                'start' => $start,
                'id_nguoi' => $id,
            ];
            DB::table('sukien')->insert($insertArr);
            $end = Carbon::now()->year . '-' . date('m-d', strtotime($request->ngaymat));
            $insertArr_ = [
                'title' => 'Giổ tổ của ' . $request->hoten,
                'start' => $end,
                'id_nguoi' => $id,
            ];
            DB::table('sukien')->insert($insertArr_);
        }

        
        return redirect('/quan-ly-thanh-vien');
    }
}
