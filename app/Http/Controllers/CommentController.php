    <?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class CommentController extends Controller
{
     public function getcomment()
    {
        $admin = Session::get('hoten');
        if($admin){
        	$cmt=DB::table('gopy')
        	->join('taikhoan','gopy.id_taikhoan','=','taikhoan.id_taikhoan')
        	->join('tintuc','gopy.id_tintuc','=','tintuc.id_tintuc')
        	->select('gopy.id_gopy','gopy.noidung','gopy.created_at','taikhoan.tendangnhap','tintuc.tieude','gopy.status')
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

}
