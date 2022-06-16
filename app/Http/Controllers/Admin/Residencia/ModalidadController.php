<?php

namespace App\Http\Controllers\Admin\Residencia;

use App\Http\Controllers\Controller;
use App\Models\Modalidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModalidadController extends Controller
{
    public function index()
    {
      $modalidades = Modalidad::all();
      return view('admin/profesional/datos/modalidades/index', compact('modalidades'));
    }

    public function create()
    {
      return view('admin/profesional/datos/modalidades/crear');
    }

    public function store(Request $request)
    {
      $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:255|unique:modalidadrs',
        'descripcion' => 'required|max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      Modalidad::create($request->all());
      return to_route('modalidades.index')
            ->with(['mensaje' => 'Modalidad registrada correctamente']);
    }

    public function edit($id)
    {
      $modalidad = Modalidad::find($id);
      return view('admin/profesional/datos/modalidades/editar', compact('modalidad'));
    }

    public function update(Request $request, $id)
    {
      $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:255',
        'descripcion' => 'required|max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $modalidad = Modalidad::find($id);
      $modalidad->update($request->all());

      return to_route('modalidades.index')
            ->with(['mensaje' => 'Modalidad actualizada correctamente']);
    }

    public function destroy($id)
    {
      Modalidad::destroy($id);
      return to_route('modalidades.index')
            ->with(['mensaje' => 'Modalidad eliminada correctamente']);
    }
}
