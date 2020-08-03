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
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')->orderBy('tintuc.id_tintuc','desc')
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem')->limit(8)
            ->get();
        $hinhanh=DB::table('hinhanh')->get();
        $sukien=DB::table('sukien')->select('sukien.title','sukien.start','sukien.id','sukien.noidung')->leftjoin('nguoi','sukien.id_nguoi','=','nguoi.id')->get();
         $tintucnoibat=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','tintuc.noibat',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')->where('tintuc.noibat',1)
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','tintuc.noibat')->limit(8)
            ->get();
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
        array_splice($sortedArr,3);
        return view('pages.home',compact('slide','tintuc','hinhanh','sortedArr','now','tintucnoibat'));
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
        $comment=Comment::with('replies')->join('taikhoan','gopy.id_taikhoan','=','taikhoan.id_taikhoan')->where('id_tintuc','=',$id)->where('comment_id','=',null)->get();
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
        //return $comment;
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
                $rq->validate([
                    'noidung'=>'required',
                ]);
                $comment=new Comment;
                $comment->id_tintuc=$id;
                $comment->noidung=$rq->noidung;
                $comment->id_taikhoan=Session::get('tk')->id_taikhoan;
                $comment->status=1;
                $comment->save();
                return back();
        }
        else
        {
            return Redirect('/login')->with('loi','Đăng Nhập khi bình luận');
        }
    }
    public function postReply($id,Request $rq)
    {
        if(Session::has('tk'))
        {
                $rq->validate([
                    'binhluan'=>'required',
                ]);
                $reply=new Comment;
                $reply->id_tintuc=$id;
                $reply->noidung=$rq->binhluan;
                $reply->id_taikhoan=Session::get('tk')->id_taikhoan;
                $reply->comment_id=$rq->idgopy;
                $reply->status=1;
                $reply->save();
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
         $sukien=DB::table('sukien')->select('sukien.title','sukien.start','sukien.id','sukien.noidung')->leftjoin('nguoi','sukien.id_nguoi','=','nguoi.id')->get();
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
        array_splice($sortedArr,3);
         $tintucnoibat=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','tintuc.noibat',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')->where('tintuc.noibat',1)
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','tintuc.noibat')->limit(8)
            ->get();
        return view('pages.lich',compact('sortedArr','now','tintucnoibat'));
    }

}
