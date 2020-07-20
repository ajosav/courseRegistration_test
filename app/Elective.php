<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elective extends Model
{
    //
    protected $fillable = [
        'session_id',
        'course_code',
        'title',
        'reg_count',
        'faculty'
    ];

    public function features() {
        return $this->belongsTo('App\ElectiveFeature');
    }
}
