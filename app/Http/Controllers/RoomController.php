<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use APP\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();
class RoomController extends Controller
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
    public function add_room()
    {
        $this-> AuthLogin();
     //    $cate_room = DB::table('tbl_category_room')->orderby('category_id','desc')->get();
     //    $service_room = DB::table('tbl_category_service')->orderby('service_id','desc')->get();
    	// return view ('admin.add_room')->with('cate_room',$cate_room)->with('service_room',$service_room);
        $cate_room = DB::table('tbl_category_room')->get();
        $service_room = DB::table('tbl_category_service')->get();
        return view ('admin.add_room')
        ->with(compact('cate_room'))
        ->with(compact('service_room'));
    }
    public function all_room()
    {
        $this-> AuthLogin();
    	$all_room = DB::table('tbl_room')
            ->join('tbl_category_room','tbl_room.category_id','=','tbl_category_room.cate_id')
            ->join('tbl_category_service','tbl_room.service_id','=','tbl_category_service.service_id')
            ->orderby('room_id','desc')->get();

        return view('admin.all_room')->with(compact('all_room'));
    	// $manager_room = view('admin.all_room')->with('all_room',$all_room);
    	// return view('admin_layout')->with('admin.all_room',$manager_room);
    }
    public function save_room(Request $request)
    {
        $this-> AuthLogin();
    	$data = array();
    	$data['category_id'] = $request ->room_cate;
    	$data['service_id'] = $request ->room_service;
        $data['room_name'] = $request ->room_name;
    	$data['room_price'] = $request ->room_price;
    	$data['room_desc'] = $request ->room_desc;
    	$data['room_status'] = $request ->room_status;
        

            $target_dir = "public/uploads/room/";
            $target_file = $target_dir . basename($_FILES["room_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES["room_image"]["tmp_name"]);
              if($check !== false) {
                $uploadOk = 1;
              } else {
                $uploadOk = 0;
              }
            }
            if ($uploadOk == 0) {
            } else {
              if (move_uploaded_file($_FILES["room_image"]["tmp_name"], $target_file)) {
                 $imageName = htmlspecialchars( basename( $_FILES["room_image"]["name"]));
              } else {
                    $imageName = "";
              }
            }
        
        $data['room_image'] = $imageName;
    	// echo '<pre>';
    	// print_r($data);
    	// echo'</pre>';
     //    die();
    	DB::table('tbl_room')->insert($data);
    	Session::put('message','Thêm phòng thành công');
    	return Redirect::to('add-room');
    }
    public function unactive_room($room_id)
    {
        $this-> AuthLogin();
    	DB::table('tbl_room')->where('room_id',$room_id)->update(['room_status'=>1]);
    	Session::put('message','Không hiển thị phòng');
    	return Redirect::to('all-room');
    }
    public function active_room($room_id)
    {
        $this-> AuthLogin();
    	DB::table('tbl_room')->where('room_id',$room_id)->update(['room_status'=>0]);
    	Session::put('message','Hiển thị phòng');
    	return Redirect::to('all-room');
    }
    public function edit_room($room_id)
    {
        $this-> AuthLogin();
        $cate_room = DB::table('tbl_category_room')->get();
        $service_room = DB::table('tbl_category_service')->get();
        $edit_room_cate = DB::table('tbl_room')
        ->limit(1)
        ->where('tbl_room.room_id', $room_id)
        ->get();
        // $edit_room_service = DB::table('tbl_room')->where('category_id', $room_id)->get();
        return view('admin.edit_room')->with(compact('edit_room_cate'))->with(compact('cate_room'))->with(compact('service_room'));
    }
    public function update_room(Request $request,$room_id)
    {

        $this-> AuthLogin();

        $target_dir = "public/uploads/room/";
            $target_file = $target_dir . basename($_FILES["room_img"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES["room_img"]["tmp_name"]);
              if($check !== false) {
                $uploadOk = 1;
              } else {
                $uploadOk = 0;
              }
            }
            if ($uploadOk == 0) {
            } else {
              if (move_uploaded_file($_FILES["room_img"]["tmp_name"], $target_file)) {
                 $imageName = htmlspecialchars( basename( $_FILES["room_img"]["name"]));
              } else {
                    $imageName = $request->room_img_old;
              }
            }


        $data = array();
        $data['room_name'] = $request ->room_name;
        $data['category_id'] = $request ->room_cate;
        $data['service_id'] = $request ->room_service;
        $data['room_price'] = $request ->room_price;
        
        $data['room_desc'] = $request ->room_desc;
        $data['room_image'] = $imageName;

        DB::table('tbl_room')->where('room_id',$room_id)->update($data);
        Session::put('message','Cập nhật danh mục phòng thành công');
        return Redirect::to('all-room');
    }
    public function delete_room(Request $request,$room_id)
    {
        $this-> AuthLogin();
        DB::table('tbl_room')->where('room_id',$room_id)->delete();
        Session::put('message','Xoá danh mục phòng thành công');
        return Redirect::to('all-room');
    }
}
