<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $fillable = ['nik','username','email', 'password', 'user_level'];
    protected $primaryKey = 'nik';
    public $timestamps = false;
}
