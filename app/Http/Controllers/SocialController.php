<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Socialite;
use redirect;
use App\User;
use Auth;
use Session;
class SocialController extends Controller
{
 	public function redirect($provider)
 	{
 		return Socialite::driver($provider)->redirect();

 	}
 	public function callback($provider)
 	{
 		$getInfo=Socialite::driver($provider)->user();
 		$user = $this->createUser($getInfo,$provider); 
   		Auth::login($user);
   		Session::put('tk',auth()->user());
   		return redirect()->to('/');
 	}
 	function createUser($getInfo,$provider){
		 $user = User::where('provider_id', $getInfo->id)->first();
		 if (!$user) {
		      $array = [	
		         'email'    => $getInfo->email,
		         'vaitro'=>0,
		         'avatar'=>$getInfo->avatar,
		         'provider' => $provider,
		         'provider_id' => $getInfo->id
		     ];
		     $check=DB::table('taikhoan')->insert($array);
		   }
		   return $user;
 	}
}
