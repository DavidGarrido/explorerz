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
}
