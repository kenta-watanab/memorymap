<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gaishutsu_kiroku extends Model
{
    // ƒf[ƒ^‚Ì‘}“ü‚ð‹–‰Â‚·‚é
    protected $fillable = [
        'user_id','place_name','place_comment','ido','keido','place_date','file_name',
    ];
    
}