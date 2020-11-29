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
        return $this->belongsToMany(Schedule::class)->orderBy('day');
    }
    public function thematics (){
        return $this->belongsToMany('App\Models\Thematic')->withTimestamps();
    }
    public function model(){
        return $this->belongsTo(Model_course::class);
    }
}
