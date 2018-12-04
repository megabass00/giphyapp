<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giphy extends Model
{
	use SoftDeletes;

    protected $fillable = ['title','description','url','rating','copies_number'];
    protected $dates = ['deleted_at'];
}
