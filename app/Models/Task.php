<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['activity_id','title','description','evaluate','punctuation','evidence'];
    
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    
    public function evidences()
    {
        return $this->hasMany(Evidence::class);
    }
    
    
    
}
