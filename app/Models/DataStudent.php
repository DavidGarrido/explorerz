<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStudent extends Model
{
    use HasFactory;

    protected $fillable = ['full_name','type_document','number_document','utc_nacimiento','age','sex','size','eps','last_certificated'];



    public function users () {
        return $this->morphMany(User::class, 'usertable');
    }
}
