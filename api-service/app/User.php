<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;


    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'activation_token'
    ];


    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];


    protected $dates = ['deleted_at'];
}
