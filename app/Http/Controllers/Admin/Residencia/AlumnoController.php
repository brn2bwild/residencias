<?php

namespace App\Http\Controllers\Admin\Residencia;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Residencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AlumnoController extends Controller
{
    public function index()
    {
      $alumnos = Residencia::all();
      return view('admin/profesional/alumnos/index', compact('alumnos'));
    }

    public function create()
    {
      // return view('admin/profesional/alumnos/crear');
    }

    public function store(Request $request)
    {
      $validacion = Validator::make($request->all(),[
        'nombre' => 'required|max:255',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'required',
        'matricula' => 'required|max:8',
        'semestre' => 'required|digits:1',
        'grupo' => 'required|max:1',
        'carrera' => 'required'
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $datos = $request->all();
      $datos['nombre'] = Str::upper($datos['nombre']);
      $datos['apellido_paterno'] = Str::upper($datos['apellido_paterno']);
      $datos['apellido_materno'] = Str::upper($datos['apellido_materno']);
      $datos['matricula'] = Str::upper($datos['matricula']);

      Alumno::create($datos);
      return to_route('alumnos.index')
          ->with(['mensaje' => 'Alumno registrado correctamente']);
    }

    public function edit($id)
    {
      $alumno = Alumno::find($id);
      return view('admin/profesional/alumnos/editar', compact('alumno'));
    }

    public function update(Request $request, $id)
    {
      $validacion = Validator::make($request->all(),[
        'nombre' => 'required|max:255',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'required',
        'matricula' => 'required|max:8',
        'semestre' => 'required|digits:1',
        'grupo' => 'required|max:1',
        'carrera' => 'required'
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $datos = $request->all();
      $datos['nombre'] = Str::upper($datos['nombre']);
      $datos['apellido_paterno'] = Str::upper($datos['apellido_paterno']);
      $datos['apellido_materno'] = Str::upper($datos['apellido_materno']);
      $datos['matricula'] = Str::upper($datos['matricula']);

      $alumno = Alumno::find($id);
      $alumno->update($datos);

      return to_route('alumnos.index')
          ->with(['mensaje' => 'Alumno actualizado correctamente']);
    }

    public function destroy($id)
    {
      Alumno::destroy($id);
      return to_route('alumnos.index');
    }
}
