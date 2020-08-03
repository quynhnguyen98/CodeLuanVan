<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Comment;
use Redirect;

class CommentController extends Controller
{
     public function getcomment()
    {
        $admin = Session::get('admin')->tendangnhap;
        if ($admin!='') {
        	$cmt=DB::table('gopy')
        	->join('taikhoan','gopy.id_taikhoan','=','taikhoan.id_taikhoan')
        	->leftjoin('tintuc','gopy.id_tintuc','=','tintuc.id_tintuc')
        	->select('gopy.id_gopy','gopy.noidung','gopy.created_at','taikhoan.tendangnhap','tintuc.tieude','gopy.status')->orderBy('tintuc.tieude','desc')
        	->get();
            return view('admin.qlcomment',compact('cmt'));
        }else
            return Redirect('/login_');
    }
    public function active($id_gopy)
    {
    		$a=DB::table('gopy')->where('id_gopy',$id_gopy)->update(['status'=>1]);
    		//return $a;
    		return Redirect('/quan-ly-comment');
    	    	
    }
     public function unactive($id_gopy)
    {
    		$a=DB::table('gopy')->where('id_gopy',$id_gopy)->update(['status'=>0]);
    		//return $a;
    		return Redirect('/quan-ly-comment');
    	    	
    }
    public function postGopy(Request $rq)
    {
         if(Session::has('tk'))
        {
                $comment=new Comment;
                $comment->noidung=$rq->noidung;
                $comment->id_taikhoan=Session::get('tk')->id_taikhoan;
                $comment->status=1;
                $comment->save();
                return Redirect()->back()->with('success','Gửi Thành Công');
        }
        else
        {
            return Redirect('/login')->with('loi','Đăng Nhập khi bình luận');
        }
    }

}
