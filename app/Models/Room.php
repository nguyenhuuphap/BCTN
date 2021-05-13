<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = "tbl_room";
    protected $primaryKey = "room_id";
    protected $fillable = [
        'room_id',
        'room_name',
        'category_id',
        'service_id',
        'room_desc',
        'room_price',
        'room_image',
        'room_status',
    ];
    public function category_room()
    {
        return $this->hasOne('App\Models\CategoryRoom','cate_id','category_id');
    }
}
