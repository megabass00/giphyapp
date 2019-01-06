<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

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


    /*
    * Mutators
    */
    public function getUrlImageAttribute($value)
    {
        return URL::to('/').'/images/users/'. $this->image;
    }
}
