<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = "tbl_booking";
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'checkindate',
        'checkintime',
        'loaiphong',
        'phuongthuc',
        'thoigian',
        'room_id'
    ];
}
