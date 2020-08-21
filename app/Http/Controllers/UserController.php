<?php

namespace App\Http\Controllers;
use DB;
use Mail;
use Session;
use URL;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Hash;
use Monolog\Registry;

class UserController extends Controller
{
    public function getLogin(){
        return view('user.login');
    }
     public function getSignup(){
        $tinh=DB::table('tinh')->get();
        $all_thanhvien = DB::table('nguoi')->join('tinh', 'nguoi.id_tinh', '=', 'tinh.id_tinh')->get();
        //return $all_thanhvien;
        return view('user.signup',compact('tinh','all_thanhvien'));
    }
    public function Login(Request $rq){
        $validatedData = $rq->validate([
                'username' => 'required|min:6|max:12',
                'password' => 'required|min:6',

            ]);
        $user=$rq->username;
        $pass=$rq->password;
        $arr=[
            'tendangnhap'=>$user,
            'password'=>$pass,
        ];
        $remember=$rq->has('remember')?true:false;
        if(Auth::attempt($arr,$remember))
        {
            Session::put('tk',auth()->user());
            //print_r(Session::all());
            return redirect('/');
            
        }
        else
            return redirect()->back()->with('loi','Sai mật khẩu và tài khoản');
    }
    public function Signup(Request $rq){
              $validatedData = $rq->validate([
                'username' => 'required|min:6|max:12',
                'password' => 'required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                'email'=>'email',
                ]);
        $_nguoi = DB::select("SHOW TABLE STATUS LIKE 'nguoi'");
        $_id = $_nguoi[0]->Auto_increment;
        $id = (int) $_id;

        $user=$rq->username;
        $pass=$rq->password;
        $cfpass=$rq->cfpassword;
        $ema=$rq->email;
       
        $user1 = DB::table('taikhoan')->where('tendangnhap', $user)->first();
        if($user1)
        {
             return redirect('/signup')->with('mess','Tài khoản có người sử dụng');
        }
        else
        {
            $arr=[
            'tendangnhap'=>$user,
            'password'=>bcrypt($pass),
            'email'=>$ema,
            'vaitro'=>0,
            'avatar'=>"user.png",
            ];
            DB::table('taikhoan')->insert($arr);
              return redirect('/signup')->with('mess','Đăng Ký Thành Công');
        }
    }
    public function Logout()
    {
        Auth::logout();
        Session::forget('tk');
        return redirect('/login');
    }
    public function getForgot(){
        return view('user.forgot');
    }
    public function getResest1($id_taikhoan =null){
        return view('user.resestpass1')->with('id_taikhoan',$id_taikhoan);
    }
    public function getResest($id_taikhoan =null){
        return view('user/resestpass')->with('id_taikhoan',$id_taikhoan);
    }
    public function sendMail(Request $rq){
        $user=DB::table('taikhoan')->where('email',$rq->email)->first();
        if(($user)==null)
        {
            return Redirect()->back()->with(['error'=>'Email không tồn tại']);
        }
        else
        {   
            $url=URL::to('/resest-pass/'.$user->id_taikhoan);
            $data=['url'=>$url,
                    'email'=>$user->email,
                ];
            Mail::to($user->email)->send(new \App\Mail\MailNotify($data));
            return redirect()->back()->with(['success' => 'Email đã được gửi. Vui lòng kiểm tra mail để lấy lại mật khẩu.']);
        }   
    }
    public function ResestPass(Request $rq)
    {
        $validatedData = $rq->validate([
                'password' => 'required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                ]);
        $input=$rq->all();
        $result=DB::table('taikhoan')->where('id_taikhoan',$input['id_taikhoan'])->update(['password'=>bcrypt($input['password'])]);
        return redirect()->back()->with('mess','Đổi Mật Khẩu Thành Công');

    }
     public function ResestPass1(Request $rq)
    {
        $validatedData = $rq->validate([
                'password' => 'required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                ]);
        $input=$rq->all();
            if(Hash::check($rq->passwordold, Session::get('tk')->password)) {
                   
                    $result=DB::table('taikhoan')->where('id_taikhoan',$input['id_taikhoan'])->update(['password'=>bcrypt($input['password'])]);
                    return redirect()->back()->with('mess','Đổi Mật Khẩu Thành Công');
            }
            else
                return redirect()->back()->with('mess','Đổi Không đúng mật khẩu');
    }
    public function edituser($id_taikhoan)
    {   $taikhoan=DB::table('taikhoan')->leftjoin('nguoi','nguoi.id','=','taikhoan.id')->where('id_taikhoan',$id_taikhoan)->get();
        if($taikhoan[0]->id==null)
        {
            $taikhoan[0]->id=1;
        }
        $cha=DB::table('nguoi')->select('nguoi.hoten','nguoi.id')->leftjoin('nguongoc','nguoi.id','=','nguongoc.pid')->where('nguongoc.id',$taikhoan[0]->id)->get(); 
        $all_thanhvien=DB::table('nguoi')->get();
        $tinh=DB::table('tinh')->get();
        //return $cha;

        return view('user.edituser',compact('taikhoan','tinh','cha','all_thanhvien'));    
    }
     public function checkedit(Request $rq,$id_taikhoan)
    {  
          $validatedData = $rq->validate([
            'tieusu'=>'required|min:12',
            'ngaysinh'=>'before:today|date',
            'filehinh' => 'image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'tieusu.required'=>'Bắt buộc nhập tiểu sử',
            'ngaysinh.before' => 'Ngày sinh phải trước hiện tại',
            'ngaysinh.date'=>'Ngày sinh không được bỏ trống',
            'filehinh.mimes' => 'Phải thuộc định dạng:jpeg,png,jpg',
        ]);
        $file=$rq->file('filehinh');
        $hoten=$rq->hoten;
        $gioitinh=$rq->gioitinh;
        $ngaysinh=$rq->ngaysinh;
        $ts=strip_tags($rq->tieusu);
        $tinh=$rq->tinh; 
            if(!isset($rq->id_nguoi))
            {
                $result=DB::table('nguoi')->join('nguongoc','nguoi.id','=','nguongoc.id')->where('nguoi.hoten',$hoten)->where('nguoi.id_tinh',$tinh)->where('nguongoc.pid',$rq->FatherID)->where('nguoi.ngaysinh',$ngaysinh)->get();
                if(count($result)==0)
                {               
                        $_nguoi = DB::select("SHOW TABLE STATUS LIKE 'nguoi'");
                        $_id = $_nguoi[0]->Auto_increment;
                        $id = (int) $_id;
                        $arr1=[
                            'hoten'=>$rq->hoten,
                            'tieusu'=>strip_tags($rq->tieusu),
                            'ngaysinh'=>$ngaysinh,
                            'gioitinh'=>$gioitinh,
                            'id_tinh'=>$rq->tinh,
                            'tinhtrang'=>'Sống',
                            'hinhanh'=>'user.png',
                        ];
                    DB::table('nguoi')->insert($arr1);
                    $dataNguonGoc['id'] =$id ;
                    $dataNguonGoc['pid'] = $rq->FatherID;
                    DB::table('nguongoc')->insert($dataNguonGoc);
                    // $id1=DB::table('taikhoan')->select('taikhoan.id')->where('id_taikhoan',$id_taikhoan)->first();
                    DB::table('taikhoan')->where('id_taikhoan',$id_taikhoan)->update(['id'=>$id]);
                    if(isset($file))
                    {
                    $name=$file->getClientOriginalName();
                    $file->move("public/frontend/images/core-img",$name);
                    $arr=[
                        'avatar'=>$name,
                    ];
                    DB::table('taikhoan')->where('id_taikhoan',$id_taikhoan)->update($arr);
                    DB::table('nguoi')->where('id',$id)->update(['hinhanh'=>$name]);
                    Session::put('tk',auth()->user());
                    }
                    return Redirect()->back()->with('mess','Sửa thành công');
                }
                else
                {
                    return Redirect()->back()->with('mess','Thông tin bạn đã tồn tại trong cây gia phả');
                }
            }
            else{
                $arr1=[
                    'hoten'=>$rq->hoten,
                    'tieusu'=>strip_tags($rq->tieusu),
                    'ngaysinh'=>$ngaysinh,
                    'gioitinh'=>$gioitinh,
                    'id_tinh'=>$rq->tinh,
                    'tinhtrang'=>'Sống',
                    'hinhanh'=>'user.png',
                ];
            DB::table('nguoi')->where('id',$rq->id_nguoi)->update($arr1);
            // $id1=DB::table('taikhoan')->select('taikhoan.id')->where('id_taikhoan',$id_taikhoan)->first();
            if(isset($file))
            {
            $name=$file->getClientOriginalName();
            $file->move("public/frontend/images/core-img",$name);
            $arr=[
                'avatar'=>$name,
            ];
            DB::table('taikhoan')->where('id_taikhoan',$id_taikhoan)->update($arr);
            DB::table('nguoi')->where('id',$rq->id_nguoi)->update(['hinhanh'=>$name]);
            Session::put('tk',auth()->user());
            }
            return Redirect()->back()->with('mess','Sửa thành công');
        }

        
    }
    public function getIndex(){
        $taikhoan=DB::table('taikhoan')->get();
        return view('admin.qltaikhoan',compact('taikhoan'));
    }
    public function doimatkhau($id_taikhoan)
    {
        $id=$id_taikhoan;
        return view('admin.changepassword',compact('id'));
    }
    public function doipass(Request $rq,$id)
    {
         $validatedData = $rq->validate([              
                'password' => 'required_with:password_confirmation|same:password_confirm',
                'password_confirm' => 'min:6',
                ]);
        $pw=$rq->password;
        $pwcf=$rq->password_confirm;
        echo $pw;
        echo $pwcf;
        $arr=[
            'password'=>bcrypt($pw),
        ];
        $a=DB::table('taikhoan')->where('id_taikhoan',$id)->update($arr);
        print_r($arr);
        return Redirect('/quan-ly-tai-khoan')->with('mess','Đổi Mật Khẩu Thành Công');
    }
    public function phanquyen($id)
    {
        $arr_function=[
            'Tổng Quan',
            'Ngày Sự Kiện',
            'Cây Gia Phả',
            'Quản Lý Thành Viên',
            'Quản Lý Comment',
            'Quản Lý Tin Tức',
            'Quản Lý Hình Ảnh',
            'Quản Lý Tài Khoản',
        ];
        // print_r( $arr_function);
        $x=DB::table('taikhoan')->where('id_taikhoan',$id)->first();
        $vaitro = $x->vaitro;
        // $mang=json_decode($vaitro[0]['vaitro'], true);
      print_r($vaitro);
        return view('admin.phanquyen',compact('arr_function','id','vaitro'));
    }
    public function capnhat_phanquyen(Request $rq,$id)
    {
       $mang=$rq->all();
       unset($mang['sampleTable_length']);
       $js=json_encode($mang);
       DB::table('taikhoan')->where('id_taikhoan',$id)->update(['vaitro'=>$js]);
       return Redirect('/phan-quyen/'.$id);
    }
}
