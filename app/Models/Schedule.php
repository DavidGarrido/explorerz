<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function courses (){
        return $this->belongsToMany('App\Models\Course')->withTimestamps();
    }
    public function thematics(){
        return $this->belongsToMany('App\Models\Thematic')->withTimestamps();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
