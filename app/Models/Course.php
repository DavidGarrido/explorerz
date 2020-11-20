<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    public function users (){
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
    public function schedule () {
        return $this->belongsToMany('App\Models\Schedule')->withTimestamps();
    }
    public function thematics (){
        return $this->belongsToMany('App\Models\Thematic')->withTimestamps();
    }
    public function model(){
        return $this->belongsTo(Model_course::class);
        // return $this->belongsToMany(Model_course::class, 'course_dimension_teacher')->withTimestamps();
    }
}
