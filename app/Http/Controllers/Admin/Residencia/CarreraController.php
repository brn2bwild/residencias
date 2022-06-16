<?php

namespace App\Http\Controllers\Admin\Residencia;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class CarreraController extends Controller
{
    public function index()
    {
      $carreras = Carrera::all();
      return view('admin/profesional/datos/carreras/index', compact('carreras'));
    }

    public function create()
    {
      return view('admin/profesional/datos/carreras/crear');
    }

    public function store(Request $request)
    {
      $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:255|unique:carreras',
        'descripcion' => 'required|max:255',
      ]);

      if($validacion->fails()){
        return back()
            ->withErrors($validacion)
            ->withInput();
      }

      Carrera::create($request->all());
      return to_route('carreras.index')
            ->with(['mensaje' => 'Carrera registrada correctamente']);
    }

    public function edit($id)
    {
      $carrera = Carrera::find($id);
      return view('admin/profesional/datos/carreras/editar', compact('carrera'));
    }

    public function update(Request $request, $id)
    {
      $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:255|unique:carreras',
        'descripcion' => 'required|max:255',
      ]);

      if($validacion->fails()){
        return back()
            ->withErrors($validacion)
            ->withInput();
      }

      $carrera = Carrera::find($id);
      $carrera->update($request->all());

      return to_route('carreras.index')
            ->with(['mensaje' => 'Carrera actualizada correctamente']);
    }

    public function destroy($id)
    {
      Carrera::destroy($id);
      return to_route('carreras.index')
            ->with(['mensaje' => 'Carrera eliminada correctamente']);
    }
}
