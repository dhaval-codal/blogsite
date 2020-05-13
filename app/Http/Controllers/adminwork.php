<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\blog;
use Hash;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Socialite;
use Cache;

class adminwork extends Controller
{
    
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        //dd($user);
        $user->token;
        $use = User::where('email',$user->getEmail())->first();
        if(!$use){
            $use = new User;
            $use->name=$user->getName();
            $use->email=$user->getEmail();
            $password = Hash::make($user->getName());
            $use->password= $password;
            $use->provider_id=$user->getId();
            $use->type=0;
            $use->save();
        }

        Auth::loginUsingId($use->id);
        return redirect('/home');
        
    }


    public function gredirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function ghandleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        //dd($user);
        $user->token;
        $use = User::Where('email',$user->getEmail())->first();
        if(!$use){
            $use = new User;
            $use->name=$user->getName();
            $use->email=$user->getEmail();
            $password = Hash::make($user->getName());
            $use->password= $password;
            $use->provider_id=$user->getId();
            $use->type=0;
            $use->save();
        }

        Auth::loginUsingId($use->id);
        return redirect('/home');
        
    }


    public function tredirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function thandleProviderCallback()
    {
        $user = Socialite::driver('twitter')->user();
        //dd($user);
        $user->token;
        $use = User::Where('email',$user->getEmail())->first();
        if(!$use){
            $use = new User;
            $use->name=$user->getName();
            $use->email=$user->getEmail();
            $password = Hash::make($user->getName());
            $use->password= $password;
            $use->provider_id=$user->getId();
            $use->type=0;
            $use->save();
        }

        Auth::loginUsingId($use->id);
        return redirect('/home');
        
    }


    public function login(Request $req)
    {
    	// dd($req->input());
    	$input = $req->only(['name'=>'name','password'=>'password']);
        if (Auth::guard('web')->attempt($input)) {
            $user = Auth::user();
            $req->session()->put(['name'=>$user['name']]);
            if($user->type == 1) {
                return redirect()->to('/adminhome');    
            } else {
                return redirect('/home');
            }
            
        } else {
            return back()->withErrors(['UserName Or Password Is Wrong.']);
        }
    }

    public function crtblog(Request $req)
    {
    	//dd($req->input());
    	$user = Auth::user();
		if($user){
			$post = new blog;
			$post->ptitle = $req->input('btitle');
			$post->psummary = $req->input('bsummary');
			$post->author = $user->name;
			$mytime = Carbon::now();
			$post->createdate = date_format($mytime,"d M,Y H:i A");
			$post->posttext = $req->input('posttext');
			$post->save();
			return redirect()->to('/adminhome');
		} else {
			return redirect('/owner')->withErrors(['First Login']);
		}
    }

    public function logout(Request $req)
    {
        Auth::logout();
        Cache::flush();
        $req->session()->flush();
        return redirect()->to('/');
    }
}
