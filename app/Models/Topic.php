<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [ // 允许插入数据库的字段
        'title',
        'content'
    ];
    // protected $guarded = [ // 不允许插入数据库的字段
    //     'id',
    //     'user_id'
    // ];
}
