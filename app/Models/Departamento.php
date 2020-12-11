<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    public function municipio(){
        return $this->hasMany(Municipio::class)->orderBy('nombre', 'ASC');
    }
}
