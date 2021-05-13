<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use APP\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
	public function AuthLogin()
	{
		$admin_id = Session::get('admin_id');
		if($admin_id)
		{
			return	Redirect::to('admin-dashboard');
		}else
		{
			return	Redirect::to('admin-login')->send();
		}
	}
    public function login()
    {
    	return view ('admin_login');
    }
    public function index()
	{
		$this-> AuthLogin();
		return view('admin_layout');
	}
	public function show_dashboard()
	{
		$this-> AuthLogin();
		return view('admin.dashboard');
	}
	public function dashboard(Request $request)
	{
		$admin_email = $request ->admin_email;
		$admin_password = $request ->admin_password;
		$result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
		    	if($result){
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->admin_id);
    		return Redirect::to('/admin-dashboard');
    	} else
    		Session::put('message','e-mail hoặc password không đúng');
    		return Redirect::to('/admin-login');
    
	}
	public function logout()
	{
				$this-> AuthLogin();
			Session::put('admin_name',null);
    		Session::put('admin_id',null);
    		return Redirect::to('/admin-login');
	}
	
}
