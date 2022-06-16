<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'nombres',
      'apellido_paterno',
      'apellido_materno',
      'matricula',
      'id_carrera',
      'email',
      'numero_tel',
      'sexo',
    ];

    public function carrera() {
      return $this->belongsTo(Carrera::class, 'id_carrera');
    }
}
