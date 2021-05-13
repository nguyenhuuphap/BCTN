<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Order;
use App\Models\CategoryRoom;
// use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Mail;
use App\Mail\mailbooking;
session_start();
class HomeController extends Controller
{
    public function index()
    {

    	return view('pages.home');
    }
    public function service()
    {
    	$service_room = DB::table('tbl_category_service')->where('service_status','0')->orderby('service_id','desc')->get();
    	return view('pages.service')->with('service',$service_room);
    }
    public function room_index()
    {
    	$rooms = DB::table('tbl_room')
    	->join('tbl_category_room','tbl_room.category_id','=','tbl_category_room.cate_id')
    	->where('room_status','0')->get();

        $categories = DB::table('tbl_category_room')->get();
    	return view('pages.room')->with(compact('rooms'))->with(compact('categories'));
    }
    public function booking($id)
    {
        $index = $id;
        // $room = Room::with('category_room')->get();
        $room = DB::table('tbl_room')->join('tbl_category_room','tbl_room.category_id','=','tbl_category_room.cate_id')->where('room_id',$id)->first();
        // dd($room);die();
        $room_kind = CategoryRoom::get();
        // $room = Room::where('room_id',$id)->first();
        // dd($room);die();
        // $price = $request->price;
        // dd($room->toArray()); 
        return view('pages.book',compact('index','room','room_kind'));
    }
    public function bookingpost(Request $requests)
    {
        // dd($requests->all());
        $booking = Booking::create($requests->all());
        // dd($booking->name);
        // die();
        $room_id = $booking['room_id'];
        $category_kind = $requests->loaiphong;
        $phuongthuc = $requests->phuongthuc;
        if($booking){

            //$this->logic($requests->all());
            $room = CategoryRoom::findOrFail($category_kind);
            if($phuongthuc==1){
                $price = $room->price_gio;
            }
            else {
                $price = $room->price_ngay;
            }
            $price = $price*$requests->thoigian;
            // dd($price,$booking->id);
            $order = Order::create([
                "book_id"=>$booking->id,
                "price"=>$price
            ]);
            // dd($order);
            $room = Room::updateOrCreate(
                ['room_id' =>  $room_id],
                ['room_status' => 1]
            );
            Session::flash('name',$booking->name);
            Mail::to($order->book->email)->send(new mailbooking($order));
            return redirect('/phong')->with('success',"Đặt phòng thành công");
        }
    }
    
    public function logic(array $data)
    {

        
    }

    public function category_kind($id)
    {
        
        $rooms = DB::table('tbl_room')
        ->join('tbl_category_room','tbl_room.category_id','=','tbl_category_room.cate_id')->where('cate_id',$id)
        ->get();
        
        $categories = DB::table('tbl_category_room')->get();
        return view('pages.roomByCategory')->with(compact('rooms'))->with(compact('categories'));
    }
}
