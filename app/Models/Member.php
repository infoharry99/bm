<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name','email','phone','location','image','password','confirm_password','postcode','status','country'
    ];
}

