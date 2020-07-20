<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_code',
        'course_title',
        'prerequisite',
        'unit', 
        'group_id',
        'option_id',
        'part_id', 
        'session_id', 
        'description', 
        'reg_count'
    ];

    public function group() {
        return $this->belongsTo('App\Group');
    }
    public function option() {
        return $this->belongsTo('App\Option');
    }
    public function part() {
        return $this->belongsTo('App\Part');
    }
    public function session() {
        return $this->belongsTo('App\Session');
    }
}
