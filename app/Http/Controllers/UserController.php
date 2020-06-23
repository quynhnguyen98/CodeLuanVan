<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Auth,Redirect;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getLogin(){
    	return view('user.dangnhap');
    }
     public function getSignup(){
        return view('user.dangky');
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
        if(Auth::attempt($arr))
        {
            Session::put('name',$user);
            return redirect('/');
            // return view('pages.home',['user'=>Auth::user()]);
        }
        else
            return view('user.dangnhap',['loi'=>'Sai mật khẩu hoặc tài khoản']);
    }
    public function Signup(Request $rq){
              $validatedData = $rq->validate([
                'username' => 'required|min:6|max:12',
                'password' => 'required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                'email'=>'email',
                'checkbox'=>'required',
                ]);
        $user=$rq->username;
        $pass=$rq->password;
        $cfpass=$rq->cfpassword;
        $ema=$rq->email;
        $arr=[
            'tendangnhap'=>$user,
            'password'=>bcrypt($pass),
            'email'=>$ema,
        ];
        $user = DB::table('taikhoan')->where('tendangnhap', $user)->first();
        if($user)
        {
             return view('user.dangky',['mess'=>'Tài khoản đã có người sử dụng']);
        }
        else
        {
            DB::table('taikhoan')->insert($arr);
             return view('user.dangky',['mess'=>'Đăng Ký thành công']);
        }
    }
    public function Logout()
    {
        Auth::Logout();
        Session::forget('name');
        return redirect('/');
    }
}
