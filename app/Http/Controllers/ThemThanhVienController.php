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
        $validatedData = $request->validate([
            'username' => 'required|min:6|max:12',
            'password' => 'required|min:6',
            'tieusu'=>'required|min:12',
            'ngaysinh'=>'before:today|date',
            'ngaymat'=>'before:today|nullable|date|after:ngaysinh',
            'PhotoFileSelector' => 'image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'username.required' => 'Bắt Buộc Nhập Tên',
            'username.min'=>'Độ dài tên ít nhất 6 ký tự',
            'username.max'=>'Độ dài tên dài nhất 12 ký tự',
            'password.required'=>'Password ít nhất 6 ký tự',
            'tieusu.required'=>'Bắt buộc nhập tiểu sử',
            'ngaysinh.before' => 'Ngày sinh phải trước hiện tại',
            'ngaysinh.date'=>'Ngày sinh không được bỏ trống',
            'ngaymat.before' => 'Ngày mất phải trước hiện tại',
            'ngaymat.after' => 'Năm mất phải sau năm sinh',
            'PhotoFileSelector.mimes' => 'Phải thuộc định dạng:jpeg,png,jpg',
        ]);
       
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
            'hinhanh' => $request->PhotoFileName,
            'tieusu' => strip_tags($request->tieusu),
            'id_tinh' => $request->tinh,
            'tinhtrang' => $t,
        ];
      
     
            $destinationPath = 'public/img_person/';
            $files = $request->file('PhotoFileSelector');
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath , $file_name);
 
       
        // print_r($request->all());
        // print_r($arr);
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
