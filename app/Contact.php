<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'company', 'phone', 'email'
    ];
}
