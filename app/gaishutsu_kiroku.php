<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gaishutsu_kiroku extends Model
{
    // データの挿入を許可する
    protected $fillable = [
        'user_id','place_name','place_comment','ido','keido','place_date','file_name',
    ];
    
}