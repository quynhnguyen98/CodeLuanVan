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
                'ngaysinh'=>'before:today|nullable',
                'checkbox'=>'required',
                'tieusu'=>'required|min:6',
                ]);
        $_nguoi = DB::select("SHOW TABLE STATUS LIKE 'nguoi'");
        $_id = $_nguoi[0]->Auto_increment;
        $id = (int) $_id;

        $user=$rq->username;
        $pass=$rq->password;
        $cfpass=$rq->cfpassword;
        $ema=$rq->email;
        $ht=$rq->hoten;
        $ns=$rq->ngaysinh;
        $sex=$rq->gioitinh;
        $tinh=$rq->tinh;
        $tieusu=$rq->tieusu;
        $arr1=[
            'hoten'=>$ht,
            'gioitinh'=>$sex,
            'ngaysinh'=>$ns,
            'tinhtrang'=>'Sống',
            'tieusu'=>strip_tags($tieusu),
            'id_tinh'=>$tinh,
            'hinhanh'=>"user.png"
        ];
       
        $user1 = DB::table('taikhoan')->where('tendangnhap', $user)->first();
        if($user1)
        {
             return redirect('/signup')->with('mess','Tài khoản có người sử dụng');
        }
        else
        {
            DB::table('nguoi')->insert($arr1);
            $new=DB::table('nguoi')->latest('id')->first();

            $arr=[
            'tendangnhap'=>$user,
            'password'=>bcrypt($pass),
            'email'=>$ema,
            'vaitro'=>0,
            'avatar'=>"user.png",
            'id'=>$id,
            ];
            DB::table('taikhoan')->insert($arr);
             $dataNguonGoc['id'] =$id ;
            $dataNguonGoc['pid'] = $rq->FatherID;

            DB::table('nguongoc')->insert($dataNguonGoc);
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
    public function edituser($id_taikhoan)
    {   $taikhoan=DB::table('taikhoan')->join('nguoi','taikhoan.id','=','nguoi.id')->where('id_taikhoan',$id_taikhoan)->get();
        $tinh=DB::table('tinh')->get();
        return view('user.edituser',compact('taikhoan','tinh'));    
    }
     public function checkedit(Request $rq,$id_taikhoan)
    {  
        $file=$rq->filehinh;
        $hoten=$rq->hoten;
        $gioitinh=$rq->gioitinh;
        $ngaysinh=$rq->ngaysinh;
        if($file)
        {
        $arr=[
            'avatar'=>$file,
        ];
        DB::table('taikhoan')->where('id_taikhoan',$id_taikhoan)->update($arr);
        Session::put('tk',auth()->user());
        }
        $arr1=[
            'hoten'=>$rq->hoten,
            'tieusu'=>strip_tags($rq->tieusu),
            'ngaysinh'=>$ngaysinh,
            'gioitinh'=>$gioitinh,
            'id_tinh'=>$rq->tinh,
        ];
    $id=DB::table('taikhoan')->select('taikhoan.id')->where('id_taikhoan',$id_taikhoan)->first();
    DB::table('nguoi')->where('id',$id->id)->update($arr1);
    return Redirect()->back()->with('mess','Sửa thành công');
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
}
