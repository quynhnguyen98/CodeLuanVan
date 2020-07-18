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
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index(){
        $i=0;
        $slide=DB::table('slide')->get();
        $tintuc=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang')
            ->get();
        $hinhanh=DB::table('hinhanh')->get();
        $sukien=DB::table('sukien')->select('sukien.tensukien','nguoi.ngaymat')->join('nguoi','sukien.id_nguoi','=','nguoi.id_nguoi')->orderBy('nguoi.ngaymat','asc')->get();
        $mang1 = array();
        $now=strtotime(Carbon::now('Asia/Ho_Chi_Minh'));
        foreach($sukien as $sk)
        {
            $po=date('d-m',strtotime($sk->ngaymat)).'-2020';
            $event=strtotime($po);
            if($event>$now)
                {
                    $mang1[]=$sk;
                    }                
                    
            
        }
        return view('pages.home',compact('slide','tintuc','hinhanh','mang1'));
    }
    public function sort($mang1,$mang2)
    {
        $po=date('d-m',strtotime($mang1["ngaymat"])).'-2020';
        $po1=date('d-m',strtotime($mang2["ngaymat"])).'-2020';
        return (strtotime($po)-strtotime($po1));

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
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang')->paginate(5);
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
        if(Session::has('tk'))
        {
                $comment=new Comment;
                $comment->id_tintuc=$id;
                $comment->noidung=$rq->noidung;
                $comment->id_taikhoan=Session::get('tk')->id_taikhoan;
                $comment->save();
                return back();
        }
        else
        {
            return Redirect('/login')->with('loi','Đăng Nhập khi bình luận');
        }
    }

}
