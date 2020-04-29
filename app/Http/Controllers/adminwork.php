<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\blog;
use Hash;
use Auth;
use Carbon\Carbon;

class adminwork extends Controller
{
    public function login(Request $req)
    {
    	// dd($req->input());
    	$input = $req->only(['name'=>'name','password'=>'password']);
        if (Auth::guard('web')->attempt($input)) {
            $user = Auth::user();
            $req->session()->put(['name'=>$user['name']]);
            return redirect()->to('/adminhome');
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
        $req->session()->flush();
        return redirect()->to('/owner');
    }
}
