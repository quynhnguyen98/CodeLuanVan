<?php

namespace App\Http\Controllers;
use DB,Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Carbon\Carbon;
use File;
class TinTucController extends Controller
{

    public function ck_login()
    {
        $admin = Session::get('admin')->tendangnhap;
        if ($admin!='') {
            return view('admin.qltintuc');
        } else {
            return Redirect('/login_');
         }
    }
    public function getIndex(){
            $this->ck_login();
            $tintuc=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','taikhoan.tendangnhap',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')
            ->join('taikhoan','tintuc.id_taikhoan','=','taikhoan.id_taikhoan')
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','taikhoan.tendangnhap')
            ->get();
    	    return view('admin.qltintuc',compact('tintuc'));    
    	
    }
    public function xoa_post($id_tintuc){
         $this->ck_login();
        // $data=AjaxCrud::findOrFail($id_nguoi);
        // $data->delete();
        DB::table('tintuc')->where('id_tintuc',$id_tintuc)->delete();
        //return Redirect::to('/quan-ly-thanh-vien');
    	}
    public function save_post()
    {
        return view('admin.addpost');
    }
    public function utf8convert($str) {

                if(!$str) return false;

                $utf8 = array(

            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'd'=>'đ|Đ',

            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',

                                                );

                foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);

                        return $str;

}
    public function utf8tourl($text){
        $text = strtolower($this->utf8convert($text));
        $text = preg_replace("/[^_a-zA-Z0-9 -] /", "",$text);
        $text = str_replace(array('%20', ' '), '-', $text);
        $text = str_replace("----","-",$text);
        $text = str_replace("---","-",$text);
        $text = str_replace("--","-",$text);
        return $text;
}
    public function save(Request $rq){
        $noidung= htmlentities($rq->noidung_tt) ;
        $a=html_entity_decode($noidung);
        $file=$rq->filehinh; 
        $tenhinh=array();  
        $array=[
            'tieude'=>$rq->tieude,
            'tieudekhongdau'=>$this->utf8tourl($rq->tieude),
            'noidung_tt'=>$a,
            'ngaydang'=>Carbon::now('Asia/Ho_Chi_Minh'),
            'id_taikhoan'=>Session::get('admin')->id_taikhoan,
            'luotxem'=>0,
        ];
        DB::table('tintuc')->insert($array);
        $id=DB::table('tintuc')->latest('id_tintuc')->first();
        if(isset($file))
        {
            for($i=0;$i<count($file);$i++)
            {
                $name=$file[$i]->getClientOriginalName();
                $file[$i]->move("public/frontend/images/",$name);
                array_push($tenhinh, $name);
            }
            for($i=0;$i<count($file);$i++)
            {
                DB::table('hinhanh')->insert(['tenhinh'=>$tenhinh[$i],'id_tintuc'=>$id->id_tintuc]);
            }
        } 
        //return $tenhinh;
        return Redirect('/quan-ly-tin-tuc')->with('mess','Thêm thành công');
    }
    public function edit_post($id_tintuc)
    {
        $tintuc=DB::table('tintuc')
            ->select('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','taikhoan.tendangnhap',DB::raw('GROUP_CONCAT(hinhanh.tenhinh) as images'))
            ->leftjoin('hinhanh','hinhanh.id_tintuc','=','tintuc.id_tintuc')
            ->join('taikhoan','tintuc.id_taikhoan','=','taikhoan.id_taikhoan')->where('tintuc.id_tintuc',$id_tintuc)
            ->groupBy('tintuc.id_tintuc','tintuc.tieudekhongdau','tintuc.tieude','tintuc.noidung_tt','tintuc.ngaydang','tintuc.luotxem','taikhoan.tendangnhap')
            ->get();
        $hinhanh=DB::table('hinhanh')->where('hinhanh.id_tintuc',$id_tintuc)->get();
        return view('admin.editpost',compact('tintuc','hinhanh'));
    }
    public function themhinh($id_tintuc){
        $id=$id_tintuc;
        //return $id;
        return view('admin.addhinh',compact('id'));
    }
    public function saveimage(Request $rq,$id_tintuc){
          $file=$rq->file('filehinh');
          $name=$file->getClientOriginalName();
          $file->move("public/frontend/images/bg-img",$name);
           $array1=['tenhinh'=>$name,
                'id_tintuc'=>$id_tintuc,
        ];
        DB::table('hinhanh')->insert($array1);
        return redirect('/sua-tin-tuc/'.$id_tintuc);
    }
    public function edit(Request $rq,$id_tintuc)
    {   
        $file=$rq->filehinh;
        $tenhinh=array();
        if(isset($file))
        {
            $id=$rq->ImageID;
            for($i=0;$i<count($file);$i++)
            {
                $name=$file[$i]->getClientOriginalName();
                array_push($tenhinh, $name);
            }
            for($i=0;$i<count($file);$i++)
            {
                DB::table('hinhanh')->where('id_hinh',$id[$i])->update(['tenhinh'=>$tenhinh[$i]]);
            }

        }       
        $tieude=$rq->tieude;
        $tieudekd=$rq->tieudekhongdau;
        $ngaydang=$rq->ngaydang;
        $noidung=$rq->noidung_tt;
        $arrayinsert=[
            'tieude'=>$tieude,
            'tieudekhongdau'=>$this->utf8tourl($rq->tieude),
            'ngaydang'=>date('yy-m-d', strtotime($ngaydang)),
            'noidung_tt'=>$noidung,
        ];
        DB::table('tintuc')->where('id_tintuc',$id_tintuc)->update($arrayinsert);
        return Redirect('/quan-ly-tin-tuc');
        //return $id;
    }

}
