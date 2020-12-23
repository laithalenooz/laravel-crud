<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
    protected $fillable = [
        'NID', 'name', 'mobile', 'email', 'address', 'image',
    ];
}
