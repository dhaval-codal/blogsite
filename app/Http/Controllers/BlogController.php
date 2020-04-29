<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\comments;
use App\blog;
use Hash;


class BlogController extends Controller
{
    public function index()
    {
    	$data = blog::all();
    	foreach ($data as $d ) {
    		$cnt = count(comments::where('bid',$d->id)->get());
    		$d->comments = $cnt;
    	}
    	return view('blog.bloghome',['data'=>$data]);
    }

    public function bdetail($id)
    {
    	$data = blog::where('id',$id)->first();
    	$cnt = count(comments::where('bid',$data->id)->get());
    	$data->comments = $cnt;
    	$cdata = comments::where('bid',$data->id)->get();
    	if(count($cdata) > 0){
    		foreach ($cdata as $d) {
    			$user = User::where('id',$d->uid)->first();
	    		$d->user = $user->name;
	    	}	
    	}
    	return view('blog.blogsingle',['data'=>$data,'cdata'=>$cdata]);
    }

    public function setcomment(Request $req)
    {
    	// dd($req->input());
    	$bid = $req->input('blogid');
    	$user = User::where('email',$req->input('email'))->first();
        if(!$user){
            $user = new User;
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            $user->password = Hash::make(rand(999999,9999999));
            $user->type = 0;       
            $user->save();
        }
    	$user = User::where('email',$req->input('email'))->first();
    	$comment = new comments;
    	$comment->uid = $user->id;
    	$comment->bid = $bid;
    	$comment->comment = $req->input('message');
    	$comment->save();

    	return redirect("/bdetail/$bid");
    }
}
