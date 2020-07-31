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
        return view('user.signup');
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
                ]);
        $user=$rq->username;
        $pass=$rq->password;
        $cfpass=$rq->cfpassword;
        $ema=$rq->email;
        $ht=$rq->hoten;
        $ns=$rq->ngaysinh;
        $sex=$rq->gioitinh;
        $arr1=[
            'hoten'=>$ht,
            'gioitinh'=>$sex,
            'ngaysinh'=>$ns,
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
            'id'=>$new->id,
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
}
