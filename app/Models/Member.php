<?php

namespace App\Models;

use App\User;

class Member extends User
{
    /**
     * Mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
