<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use URL;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Comment;
use App\User;
use Session;
class HomeController extends Controller
{
    public function index(){
        $slide=DB::table('slide')->get();
        $tintuc=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang')
            ->get();
        $hinhanh=DB::table('hinhanh')->get();
        return view('pages.home',compact('slide','tintuc','hinhanh'));
    }
    public function getPost($id){
        $tintuc=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')->where('tintuc.id_tintuc',$id)
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang')
            ->get();
        $tintuclq=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang')->whereNotIn('tintuc.id_tintuc',[$id])
            ->limit(3)->get();
        $comment=DB::table('gopy')->join('taikhoan','gopy.id_taikhoan','=','taikhoan.id_taikhoan')->where('gopy.id_tintuc',$id)->get();
        return view('pages.singlepost',compact('tintuc','tintuclq','comment'));
    }
    public function getTinTuc(){
         $tintuc=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang')->paginate(4);
        return view('pages.tintuc',compact('tintuc'));
    }
     public function getGioithieu(){
        return view('pages.gioithieu');
    }
     public function getGopy(){
        return view('pages.gopy');
    }

    public function postComment($id,Request $rq)
    {
        $comment=new Comment;
        $comment->id_tintuc=$id;
        $comment->noidung=$rq->noidung;
        $comment->id_taikhoan=Session::get('tk')->id_taikhoan;
        $comment->save();
        return back();
    }

}
