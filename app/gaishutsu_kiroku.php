<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gaishutsu_kiroku extends Model
{
    // �f�[�^�̑}����������
    protected $fillable = [
        'user_id','place_name','place_comment','ido','keido','place_date','file_name',
    ];
    
}