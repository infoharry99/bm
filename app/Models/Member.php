<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name','email','phone','location','uk_location','Postcode','postcode','image','password','confirm_password','status','country'
    ];
}

