<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

class Giphy extends Model
{
	use SoftDeletes;

    protected $fillable = ['title','description','url','rating','copies_number'];
    protected $dates = ['deleted_at'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    /*
    * Mutators
    */
    public function getUrlLocalFileAttribute($value)
    {
        return URL::to('/').'/images/giphies/'. $this->local_file;
    }
    

    /*
    * Custom Methods
    */
    public function downloadGiphy() {
        $oldFile = $this->local_file;
        $file = file_get_contents($this->url);
        $extension = pathinfo($this->url, PATHINFO_EXTENSION);
        $newName = str_slug($this->title).'.'.$extension;
        $pathToSave = 'images/giphies/';
        if ($oldFile !== 'default.gif') {
            unlink($pathToSave.$oldFile);
        }
        $ok = file_put_contents($pathToSave.$newName, $file);
        return ($ok) ? $newName : false;
    }
}
