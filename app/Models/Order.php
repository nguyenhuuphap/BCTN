<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\Room;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'book_id',
        'price'
    ];
    public function book()
    {
        // dd(1);
    	return $this->belongsTo(Booking::class,'book_id','id');
    }
}
