<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // 대량 할당이 가능하도록 하는 것, $guarded 와 같이 쓸 수 없지만 둘 중 하나는 사용해야 데이터 추가가 가능.
    protected $fillable = [
        'name', 'content', 'origin_name', 'path'
    ];
}
