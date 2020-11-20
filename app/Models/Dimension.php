<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;

    public function course(){
        return $this->belongsToMany(Model_course::class)->withTimestamps();
    }
}
