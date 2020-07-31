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
        $slide=DB::table('slide')->get();
        $tintuc=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem')->limit(8)
            ->get();
        $hinhanh=DB::table('hinhanh')->get();
        $sukien=DB::table('sukien')->select('sukien.title','nguoi.ngaymat','sukien.start')->join('nguoi','sukien.id','=','nguoi.id')->orderBy('nguoi.ngaymat','asc')->get();
        $mang1 = array();
        $now=strtotime(Carbon::now('Asia/Ho_Chi_Minh'));
        foreach($sukien as $sk)
        {
            $start=date('d-m',strtotime($sk->start)).'-'.Carbon::now()->year.'00:00:00';
            $end=date('d-m',strtotime($sk->start)).'-'.Carbon::now()->year.'23:59:59';
            $eventstart=strtotime($start);
            $eventend=strtotime($end);
            if($eventend>=$now)
            {
                    array_push($mang1,$sk);
            }                   
        }
        $sortedArr = collect($mang1)->sortBy('start')->all();
        //dd($sortedArr);
        return $mang1;
        return view('pages.home',compact('slide','tintuc','hinhanh','mang1','now'));
    }

    public function getPost($id,Request $rq){
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
        $comment=DB::table('gopy')->join('taikhoan','gopy.id_taikhoan','=','taikhoan.id_taikhoan')->where('gopy.id_tintuc',$id)->where('gopy.status','1')->get();
        $sessionKey='tintuc_'.$id;
        $sessionview=Session::get('sessionKey');
        if(!$sessionview)
        {
             Session::put($sessionKey, 1);
             DB::table('tintuc')->where('tintuc.id_tintuc',$id)->increment('luotxem');
        }
        foreach($tintuc as $tt)
        {
            $data=(explode(',',$tt->images));
            $meta_desc=$tt->tieude;
            $url_canonical=$rq->url();
            $meta_content=$tt->noidung_tt;
            $meta_img=$data[0];
        }
        //  return $url_canonical;
        return view('pages.singlepost',compact('meta_desc','meta_content','meta_img','tintuc','tintuclq','comment','url_canonical'));
    }
    public function getTinTuc(){

         $tintuc=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem')->paginate(5);
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

    public function getPhaDo()
    {
        return view('pages.phado');
    }
    public function getLich()
    {
        
        return view('pages.lich');
    }

}
