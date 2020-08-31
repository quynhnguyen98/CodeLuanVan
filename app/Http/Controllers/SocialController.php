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
use File;
class SocialController extends Controller
{
 	public function redirect($provider)
 	{
 		return Socialite::driver($provider)->redirect();

 	}
 	public function callback($provider)
 	{
 		try{
            $getInfo = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            $getInfo = Socialite::driver($provider)->stateless()->user();
        }
 		$user = $this->createUser($getInfo,$provider); 		 	
   		Auth::login($user,true);
   		Session::put('tk',auth()->user());
   		return redirect()->to('/');
 	}
 	function createUser($getInfo,$provider){
		 $user = User::where('provider_id', $getInfo->id)->first();
		 if (!$user) {   
		 	$fileContents=file_get_contents($getInfo->avatar);
 			File::put(public_path() . '/frontend/images/core-img/avt' . $getInfo->id . ".jpg", $fileContents);
 			$picture = public_path('/frontend/images/core-img/avt' . $getInfo->id . ".jpg");
		     return User::create([
		            'email' => $getInfo->email,
		            'vaitro' => 0,
		            'avatar'=>"avt". $getInfo->id . ".jpg",
		        ]);
		}
		else{
		   return $user;
		}
 	}
}
