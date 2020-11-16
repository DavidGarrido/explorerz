<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Thematic extends Model
{
    use HasFactory;
    public function schedules (){
        return $this->belongsToMany('App\Models\Schedule')->withTimestamps();
    }
    public function activities(){
        return $this->belongsToMany('App\Models\Activity')->withTimestamps();
    }
    public function courses (){
        return $this->belongsToMany('App\Models\Course')->withTimestamps();
    }
}
