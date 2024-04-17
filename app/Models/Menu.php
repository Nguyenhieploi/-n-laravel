<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    // Xóa mêm
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'slug',
        'active',
        'thumb'
    ];

    // Liên kết với bảng product, lấy tất cả sp trong menu - 1 nhiều
    public function products(){
        return $this->hasMany(Product::class,'menu_id','id');
    }


}
