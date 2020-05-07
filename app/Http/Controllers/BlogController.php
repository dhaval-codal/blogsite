<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\comments;
use App\blog;
use Hash;


class BlogController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax()){
            $word = $request->id;
            //dd($search);
            $datas = blog::where('ptitle', 'LIKE', '%'.$word.'%')
                                ->orWhere('psummary', 'LIKE', '%'.$word.'%')
                                ->orWhere('posttext', 'LIKE', '%'.$word.'%')
                                ->orWhere('author', $word)    
                                ->paginate(10);
                
            foreach ($datas as $d ) {
                $cnt = count(comments::where(['bid'=>$d->id,'cmttype'=>0])->get());
                $reply = count(comments::where('bid',$d->id)->where('cmttype',"!=",0)->get());
                $d->comments = $cnt;
                $d->reply = $reply;
            }
            return view('blog.bsearch',['datas'=>$datas]);
        } else {
            $data = blog::paginate(10);
            // $data = blog::all();
            foreach ($data as $d ) {
                $cnt = count(comments::where(['bid'=>$d->id,'cmttype'=>0])->get());
                $reply = count(comments::where('bid',$d->id)->where('cmttype',"!=",0)->get());
                $d->comments = $cnt;
                $d->reply = $reply;
            }
            return view('blog.bloghome',['data'=>$data]);
        }
    }

    public function bdetail($id)
    {
    	$data = blog::where('id',$id)->first();
    	$cnt = count(comments::where(['bid'=>$data->id,'cmttype'=>0])->get());
        $reply = count(comments::where('bid',$data->id)->where('cmttype',"!=",0)->get());
    	$data->comments = $cnt;
        $data->replys = $reply;
    	$cdata = comments::where(['bid'=>$data->id,'cmttype'=>0])->get();
        $cid = comments::where('bid',$data->id)->get(['id']);
    	if(count($cdata) > 0){
    		foreach ($cdata as $d) {
    			$user = User::where('id',$d->uid)->first();
	    		$d->user = $user->name;
                $ruser = comments::where('cmttype',$d->id)->get();
                $d->rcnt = count($ruser);
	    	}	
    	}
        $reply = comments::where('bid',$data->id)->where('cmttype',"!=",0)->get();
        if(count($reply) > 0){
            foreach ($reply as $r) {
                $user = User::where('id',$r->uid)->first();
                $r->user = $user->name;
            }   
        }
    	return view('blog.blogsingle',['data'=>$data,'cdata'=>$cdata,'cid'=>$cid,'reply'=>$reply]);
    }

    public function setcomment(Request $req)
    {
    	//dd($req->input());
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
    
    	$comment = new comments;
    	$comment->uid = $user->id;
    	$comment->bid = $bid;
    	$comment->comment = $req->input('message');
        if($req->input('cntid') == 0){
            $comment->cmttype = 0;
        } else {
            $comment->cmttype = $req->input('cntid');
        }
    	$comment->save();

    	return redirect("/bdetail/$bid");
    }


    public function liveSearch(Request $request)
    { 
        
    }

}
