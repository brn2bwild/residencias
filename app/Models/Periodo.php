<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $fillable = [
      'nombre',
      'fecha_inicio',
      'fecha_aceptacion',
      'fecha_documentacion',
      'fecha_termino',
    ];
}
