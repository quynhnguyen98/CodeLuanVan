<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Auth,Redirect;
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
            Session::put('name',$user);
            return redirect('/');
            // return view('pages.home',['user'=>Auth::user()]);\
        }
        else
            return view('user.login',['loi'=>'Sai mật khẩu hoặc tài khoản']);
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
        $tthn=$rq->tinhtranghonnhan;
        $arr1=[
            'hoten'=>$ht,
            'gioitinh'=>$sex,
            'ngaysinh'=>$ns,
            'tinhtrang_honnhan'=>$tthn,
        ];
        $user1 = DB::table('taikhoan')->where('tendangnhap', $user)->first();
        if($user1)
        {
             return redirect('/signup')->with('mess','Tài khoản có người sử dụng');
        }
        else
        {
            DB::table('nguoi')->insert($arr1);
            $new=DB::table('nguoi')->latest('id_nguoi')->first();

            $arr=[
            'tendangnhap'=>$user,
            'password'=>bcrypt($pass),
            'email'=>$ema,
            'vaitro'=>0,
            'id_nguoi'=>$new->id_nguoi,
            ];
            DB::table('taikhoan')->insert($arr);
              return redirect('/signup')->with('mess','Đăng Ký Thành Công');
        }
    }
    public function Logout()
    {
        Auth::Logout();
        Session::forget('name');
        return redirect('/');
    }
}
