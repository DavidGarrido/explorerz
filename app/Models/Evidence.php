<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'file', 'user_id', 'task_id', 'calification', 'observations'];
    
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    
    public function user()
    {
        return $this->hasOne(User::class);
    }
    
}
