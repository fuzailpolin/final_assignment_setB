<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\User;

class loginController extends Controller
{
	public function index(){
		return view('login.loginIndex');
	}
	
	public function verify(Request $req){
		$user = User::where('username', $req->username)
					->where('password', $req->password)
					->first();					
		if(count($user) > 0 ){
	
			$req->session()->put('name', $req->input('username'));
			$req->session()->put('user', $user->type);
			
			return redirect()->route('home.index');
		}else{
			$req->session()->flash('msg', 'invalid username/password');
			return redirect('/login');
		}

	}
}
