<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectiveFeature extends Model
{
    //
    protected $fillable = [
        'elective_id',
        'unit',
        'semester',
        'test',
        'field_trip',
        'payment',
        'material',
        'attendance',
        'practical_class',
        'exam'
    ];
}
