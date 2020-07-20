<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $path = '/images/profile/';
    protected $fillable = ['file'];

    
    public function getFileAttribute($photo) {
        return $this->path . $photo;
    }
}
