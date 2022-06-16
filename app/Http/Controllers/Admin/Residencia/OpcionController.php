<?php

namespace App\Http\Controllers\Admin\Residencia;

use App\Http\Controllers\Controller;
use App\Models\Opcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OpcionController extends Controller
{
  public function index() {
    $opciones = Opcion::all();
    return view('admin/profesional/datos/opciones/index', compact('opciones'));
  }

  public function create() {
    return view('admin/profesional/datos/opciones/crear');
  }

  public function store(Request $request) {
    $validacion = Validator::make($request->all(), [
      'nombre' => 'required|max:255',
      'descripcion' => 'required|max:255',
    ]);

    if($validacion->fails()){ return back()->withErrors($validacion)->withInput(); }

    Opcion::create($request->all());
    return to_route('opciones.index')
        ->with(['mensaje' => 'Opción registrada correctamente']);
  }

  public function edit($id) {
    $opcion = Opcion::find($id);
    return view('admin/profesional/datos/opciones/editar', compact('opcion'));
  }

  public function update(Request $request, $id){
    $validacion = Validator::make($request->all(), [
      'nombre' => 'required|max:255',
      'descripcion' => 'required|max:255',
    ]);

    if($validacion->fails()){ return back()->withErrors($validacion)->withInput(); }

    $opcion = Opcion::find($id);
    $opcion->update($request->all());

    return to_route('opciones.index')
        ->with(['mensaje' => 'Opción actualizada correctamente']);
  }

  public function destroy($id) {
    Opcion::destroy($id);
    return to_route('opciones.index')
        ->with(['mensaje' => 'Opción eliminada correctamente']);
  }
}
