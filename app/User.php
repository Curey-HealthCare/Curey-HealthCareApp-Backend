<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    public $table = "users";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token', 'first_login', 'password'
    ];
}
