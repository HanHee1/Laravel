<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    use HasFactory;
    // created_at, updated_at을 넣어주는 기능 끄기.
    public $timestamps = false;

    protected $fillable = [
        'type', 'content', 'created_at'
    ];

    public static function boot()
    {
        parent::boot();
        // created_at을 자동으로 넣어줍니다.
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
