<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Booking;
class OrderController extends Controller
{
    public function index()
    {
    	$items = Order::with('book')->get()->toArray();
    	// dd($items[0]['room']['room_name']); 
    	
    	return view('admin.all_order',compact('items'));
    }
}
