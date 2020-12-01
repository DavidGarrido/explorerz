<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAdmin extends Model
{
    use HasFactory;

    public function users () {
        return $this->morphMany(User::class, 'usertable');
    }
}
