<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'utc_inicial', 'utc_final', 'day'];

    public function schedule(){
        return $this->belongsToMany('App\Models\Schedule')->withTimestamps();
    }
    
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
}
