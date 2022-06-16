<?php

namespace App\Http\Controllers\Admin\Residencia;

use App\Http\Controllers\Controller;
use App\Models\Residencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResidenciaController extends Controller
{
    public function index()
    {
      $residencias = Residencia::all();
      return view('admin/profesional/residencias/index', compact('residencias'));
    }

    public function create()
    {
      return view('admin/profesional/residencias/crear');
    }

    public function store(Request $request)
    {
      $validacion = Validator::make($request->all(),[
        'nombres' => 'required|max:255',
        'apellido_paterno' => 'required|max:255',
        'apellido_materno' => 'required|max:255',
        'matricula' => 'required|unique:residencias|max:255',
        'carrera' => 'required',
        'email' => 'email|required|unique:users',
        'numero_tel' => 'required|digits|max:255',
        'genero' => 'required',
        'lugar_residencia' => 'required|max:255',
        'direccion_lugar' => 'required|max:255',
        'sector' => 'required',
        'giro' => 'required',
        'tipo' => 'required',
        'asesor_externo' => 'required|max:255',
        'cargo_asesor_externo' => 'required|max:255',
        'nombre_proyecto' => 'required',
        'opcion' => 'required',
        'fecha_inicio' => 'date|required',
        'fecha_termino' => 'date|required',
        'modalidad' => 'required',
        'estancia' => 'required',
        'observaciones' => 'max:255'
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      Residencia::create($request->all());
      return to_route('residencias.index')
            ->with(['mensaje' => 'Residencia registrada correctamente']);
    }

    public function edit($id)
    {
      $residencia = Residencia::find($id);
      return view('admin/profesional/residencias/editar', compact('residencia'));
    }

    public function update(Request $request, $id)
    {
      $validacion = Validator::make($request->all(),[
        'nombre' => 'required|max:255',
        'apellido_paterno' => 'required|max:255',
        'apellido_materno' => 'required|max:255',
        'matricula' => 'required|unique:residencias|max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $residencia = Residencia::find($id);
      $residencia->update($request->all());

      return to_route('residencias.index')
            ->with(['mensaje' => 'Residencia actualizada correctamente']);
    }

    public function destroy($id)
    {
      Residencia::destroy($id);
      return to_route('residencias.index')
            ->with(['mensaje' => 'Residencia eliminada correctamente']);
    }
}
