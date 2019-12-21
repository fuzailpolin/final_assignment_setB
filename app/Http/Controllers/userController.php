<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\User;
use Validator;

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
		$validation = Validator::make($req->all(), [
            'name'=>'required',
            'contact_info'=>'required',
            'company_name'=>'required',
			'type'=>'required',
			'password'=>'required',
			'username'=>'required',
            
        ]);
        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
		}
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
	
	public function search(Request $req){
		$check = $req->btnSubmit;
		$item = $req->search;
		if($check=="Search"){
			$users = User::where('username', 'LIKE', "%{$item}%")
				->orWhere('name', 'LIKE', "%{$item}%")
				->orWhere('contact_info', 'LIKE', "%{$item}%")
				->orWhere('type', 'LIKE', "%{$item}%")
				->orWhere('company_name', 'LIKE', "%{$item}%")
				->get();
				
			return view('user.showUser')->with('users', $users);
		}
	}
	
	public function editIndex($id){
		$user = User::where('id', $id)->get();
		return view('user.userEdit')->with('users', $user);
	}
	
	public function edit(Request $req, $id){
		$validation = Validator::make($req->all(), [
            'name'=>'required',
            'contact_info'=>'required',
            'company_name'=>'required',
			'type'=>'required',
            
        ]);
        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
		}
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
