<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\blog;
use App\comments;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'BlogController@index');

Route::get('/bdetail/{d}', 'BlogController@bdetail');

Route::get('/owner', function () {
    return view('adminlogin');
});

Route::get('/cmtlist', function () {
	$user = Auth::user();
	if($user){
		$data = comments::all();
		foreach ($data as $d) {
			$uname = User::where('id',$d->uid)->first();
			$d->uname = $uname->name;
			$bname = blog::where('id',$d->bid)->first();
			$d->bname = $bname->ptitle;
		}
		return view('admin.admin_cmtlist',['data'=>$data]);	
	} else {
		return redirect('/owner')->withErrors(['First Login']);
	}
});

Route::get('/users', function () {
	$user = Auth::user();
	if($user){
		$data = User::where('type',0)->get();
		return view('admin.admin_userlist',['data'=>$data]);	
	} else {
		return redirect('/owner')->withErrors(['First Login']);
	}
});

Route::get('/adminhome', function () {
	$user = Auth::user();
	if($user){
		$data = blog::all();
		return view('admin.adminhome',['data'=>$data]);	
	} else {
		return redirect('/owner')->withErrors(['First Login']);
	}
});

Route::post('/adminlogin', 'adminwork@login');
Route::post('/crtblog', 'adminwork@crtblog');
Route::post('/setcomment', 'BlogController@setcomment');
Route::post('/bsearch', 'BlogController@bsearch');
Route::get('/bsearch', 'BlogController@bsearch');
Route::get('/logout', 'adminwork@logout');

Route::get('demos/livesearch','BlogController@liveSearch');        
