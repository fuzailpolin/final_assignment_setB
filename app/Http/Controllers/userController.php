<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\User;

class userController extends Controller
{
    public function index(){
		return view();
	}
	public function adduserIndex(){
		return view('user.addUser');
	}
	public function adduser(Request $req){
		$user = new User();
		$user->username = $req->username;
        $user->password = $req->password;
		$user->name = $req->name;
		$user->contact_info= $req->contact_info;
		$user->type = $req->type;
		$user->company_name = $req->company_name;
		
		if($user->save()){
			return back();
		}
		else{
			echo "Not registered.";
		}
	}
	
	public function showUser(){
		$users = User::all();
		return view('user.showUser')->with('users', $users);
	}
	public function editIndex($id){
		$user = User::where('id', $id)->get();
		return view('user.userEdit')->with('users', $user);
	}
	public function edit(Request $req, $id){
		User::where('id', $id)->update([
						'name' => $req->name,
						'contact_info' => $req->contact_info,
						'company_name' => $req->company_name,
						'type' => $req->type,
						]);
			return back();
	}
	public function destroy($id){
		User::where('id', $id)->delete();
		return back();
	}
	public function details($id){
		$user = User::where('id', $id)->get();
		return view('user.userDetails')->with('users', $user);
	}
}
