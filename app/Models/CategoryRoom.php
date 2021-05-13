<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRoom extends Model
{
    use HasFactory;
    protected $table = "tbl_category_room";
    protected $primaryKey = "cate_id";
    protected $fillable = [
        'cate_id',
        'category_kind',
        'category_desc',
        'category_status',
        'price_gio',
        'price_ngay',
    ];
}
