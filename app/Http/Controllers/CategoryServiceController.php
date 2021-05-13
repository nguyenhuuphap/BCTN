<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use APP\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryServiceController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id)
        {
            return  Redirect::to('admin-dashboard');
        }else
        {
            return  Redirect::to('admin-login')->send();
        }
    }
    public function add_category_service()
    {
        $this-> AuthLogin();
    	return view ('admin.add_category_service');
    }
    public function all_category_service()
    {
        $this-> AuthLogin();
    	$all_category_service = DB::table('tbl_category_service')->get();
    	$manager_category_service = view('admin.all_category_service')->with('all_category_service',$all_category_service);
    	return view('admin_layout')->with('admin.all_category_service',$manager_category_service);
    }
    public function save_category_service(Request $request)
    {
        $this-> AuthLogin();
    	$data = array();
    	$data['service_id'] = $request ->category_service_id;
    	$data['service_name'] = $request ->category_service_name;
    	$data['service_desc'] = $request ->category_service_desc;
    	$data['service_status'] = $request ->category_service_status;
    	// echo '<pre>';
    	// print_r($data);
    	// echo'</pre>';
    	DB::table('tbl_category_service')->insert($data);
    	Session::put('message','Thêm danh mục dịch vụ thành công');
    	return Redirect::to('add-category-service');
    }
    public function unactive_category_service($category_service_id)
    {
        $this-> AuthLogin();
    	DB::table('tbl_category_service')->where('service_id',$category_service_id)->update(['service_status'=>1]);
    	Session::put('message','Không hiển thị phòng');
    	return Redirect::to('all-category-service');
    }
    public function active_category_service($category_service_id)
    {
        $this-> AuthLogin();
    	DB::table('tbl_category_service')->where('service_id',$category_service_id)->update(['service_status'=>0]);
    	Session::put('message','Hiển thị phòng');
    	return Redirect::to('all-category-service');
    }
    public function edit_category_service($category_service_id)
    {
        $this-> AuthLogin();
        $edit_category_service = DB::table('tbl_category_service')->where('service_id', $category_service_id)->get();
        $manager_category_service = view('admin.edit_category_service')->with('edit_category_service',$edit_category_service);
        return view('admin_layout')->with('admin.edit_category_service',$manager_category_service);
    }
    public function update_category_service(Request $request,$category_service_id)
    {
        $this-> AuthLogin();
        $data = array();
        $data['service_name'] = $request ->category_service_name;
        $data['service_desc'] = $request ->category_service_desc;
        DB::table('tbl_category_service')->where('service_id',$category_service_id)->update($data);
        Session::put('message','Cập nhật danh mục phòng thành công');
        return Redirect::to('all-category-service');
    }
    public function delete_category_service(Request $request,$category_service_id)
    {
        $this-> AuthLogin();
        DB::table('tbl_category_service')->where('service_id',$category_service_id)->delete();
        Session::put('message','Xoá danh mục phòng thành công');
        return Redirect::to('all-category-service');
    }

}
