<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\comments;
use App\blog;
use Hash;
use Auth;

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
                if($d->imgurl != null ) {
                    $thname = explode('.',$d->imgurl);
                    $d->thmbpath  = $thname[0].'-thmb.'.$thname[1];
                }
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
                if($d->imgurl != null ) {
                    $thname = explode('.',$d->imgurl);
                    $d->thmbpath  = $thname[0].'-thmb.'.$thname[1];
                }
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
        $user = Auth::user();
        if($user){
            
            $bid = $req->input('blogid');
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

        } else {
            return redirect('/loginpage')->withErrors(['First Sing Up / Log in. Only then you can comment on this post.']);;
        }
    
    }


}
