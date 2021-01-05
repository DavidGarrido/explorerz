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
    public function activities(){
        return $this->belongsToMany('App\Models\Activity')->withTimestamps();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
