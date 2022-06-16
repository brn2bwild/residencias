<?php

namespace App\Http\Controllers\Admin\Residencia;

use App\Http\Controllers\Controller;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeriodoController extends Controller
{
    public function index()
    {
      $periodos = Periodo::all();
      return view('admin/profesional/datos/periodos/index', compact('periodos'));
    }

    public function create()
    {
      return view('admin/profesional/datos/periodos/crear');
    }

    public function store(Request $request)
    {
      $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:30',
        'fecha_inicio' => 'required|date',
        'fecha_aceptacion' => 'required|date',
        'fecha_documentacion' => 'required|date',
        'fecha_termino' => 'required|date',
      ]);

      if($validacion->fails()){ return back()->withErrors($validacion)->withInput(); }

      Periodo::create($request->all());
      return to_route('periodos.index')->with(['mensaje' => 'Periodo registrado correctamente']);
    }

    public function edit($id)
    {
      $periodo = Periodo::find($id);
      return view('admin/profesional/datos/periodos/editar', compact('periodo'));
    }

    public function update(Request $request, $id)
    {
      $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:30',
        'fecha_inicio' => 'required|date',
        'fecha_aceptacion' => 'required|date',
        'fecha_documentacion' => 'required|date',
        'fecha_termino' => 'required|date',
      ]);

      if($validacion->fails()){ return back()->withErrors($validacion)->withInput(); }

      $periodo = Periodo::find($id);
      $periodo->update($request->all());

      return to_route('periodos.index')->with(['mensaje' => 'Periodo actualizado correctamente']);
    }

    public function destroy($id)
    {
      Periodo::destroy($id);
      return to_route('periodos.index')->with(['mensaje' => 'Periodo eliminado correctamente']);
    }
}
