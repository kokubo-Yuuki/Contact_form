<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{

    protected $fillable = [
        'name',
        'email',
        'sex',
        'category',
        'play_env',
        'message',
        'image_path',
    ];

}
