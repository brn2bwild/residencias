<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    use HasFactory;

    protected $fillable = [
      'nombre',
      'apellido_paterno',
      'apellido_materno',
      'matricula',
    ];
}
