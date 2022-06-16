<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
      'id_alumno',
      'lugar_servicio',
      'direccion_lugar',
      'responsable',
      'id_sector',
      'id_tipo',
      'id_periodo',
      'numero_oficio',
      'id_modalidad',
      'id_estancia',
      'calificacion',
      'observaciones',
    ];

    public function alumno() {
      return $this->belongsTo(Alumno::class, 'id_alumno');
    }

    public function sector() {
      return $this->belongsTo(Sector::class, 'id_sector');
    }

    public function tipo() {
      return $this->belongsTo(Tipo::class, 'id_tipo');
    }

    public function modalidad() {
      return $this->belongsTo(Modalidad::class, 'id_modalidad');
    }

    public function estancia() {
      return $this->belongsTo(Estancia::class, 'id_estancia');
    }

    public function periodo() {
      return $this->belongsTo(Periodo::class, 'id_periodo');
    }
}
