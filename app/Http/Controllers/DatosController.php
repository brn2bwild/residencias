<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class DatosController extends Controller
{
  public function periodo_datos($periodo) {
    $periodo = Periodo::where('nombre', $periodo)->first();
    return json_encode($periodo->makeHidden(['id', 'created_at', 'updated_at']));
  }
}
