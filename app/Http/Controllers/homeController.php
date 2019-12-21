<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\User;

class homeController extends Controller
{
    public function index(Request $req){
		$user = User::where('username', $req->session()->get('name'))
					->first();
		return view('home.index')->with('users', $user);
	}
}
