<?php

namespace App\Http\Controllers\Admin\Residencia;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Estancia;
use App\Models\Modalidad;
use App\Models\Periodo;
use App\Models\Sector;
use App\Models\Servicio;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicioController extends Controller
{
    public function index()
    {
      $servicios = Servicio::all();
      return view('admin/profesional/servicios/index', compact('servicios'));
    }

    public function create()
    {
      $sectores = Sector::all();
      $tipos = Tipo::all();
      $carreras = Carrera::all();
      $modalidades = Modalidad::all();
      $estancias = Estancia::all();
      $periodos = Periodo::all();

      return view('admin/profesional/servicios/crear', compact('sectores', 'tipos', 'carreras', 'modalidades', 'estancias', 'periodos'));
    }

    public function store(Request $request)
    {
      $validacion = Validator::make($request->all(), [
        'nombres' => 'required|max:255',
        'apellido_paterno' => 'required|max:255',
        'apellido_materno' => 'required|max:255',
        'matricula' => 'required|max:8|unique:alumnos',
        'carrera' => 'required',
        'email' => 'required|unique:alumnos',
        'numero_tel' => 'required',
        'sexo' => 'required',
        'lugar_servicio' => 'required',
        'direccion_lugar' => 'required',
        'responsable' => 'required',
        'sector' => 'required',
        'tipo' => 'required',
        'fecha_inicio' => 'date',
        'fecha_termino' => 'date',
        'numero_oficio' => 'required',
        'modalidad' => 'required',
        'estancia' => 'required',
        'calificacion' => 'numeric|min:0|max:100',
        'observaciones' => 'max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $carrera = Carrera::where('nombre', $request->carrera)->first();
      $alumno = Alumno::create([
        'nombres' => $request->nombres,
        'apellido_paterno' => $request->apellido_paterno,
        'apellido_materno' => $request->apellido_materno,
        'matricula' => $request->matricula,
        'id_carrera' => $carrera->id,
        'email' => $request->email,
        'numero_tel' => $request->numero_tel,
        'sexo' => $request->sexo,
      ]);

      $sector = Sector::where('nombre', $request->sector)->first();
      $tipo = Tipo::where('nombre', $request->tipo)->first();
      $modalidad = Modalidad::where('nombre', $request->modalidad)->first();
      $estancia = Estancia::where('nombre', $request->estancia)->first();

      Servicio::create([
        'id_alumno' => $alumno->id,
        'id_sector' => $sector->id,
        'id_tipo' => $tipo->id,
        'id_modalidad' => $modalidad->id,
        'id_estancia' => $estancia->id,
        'lugar_servicio' => $request->lugar_servicio,
        'direccion_lugar' => $request->direccion_lugar,
        'responsable' => $request->responsable,
        'fecha_inicio' => $request->fecha_inicio,
        'fecha_termino' => $request->fecha_termino,
        'numero_oficio' => $request->numero_oficio,
        'calificacion' => $request->calificacion,
        'observaciones' => $request->observaciones,
      ]);

      return to_route('servicios.index')
            ->with(['mensaje' => 'Servicio social registrado correctamente']);
    }

    public function edit($id)
    {
      $sectores = Sector::all();
      $tipos = Tipo::all();
      $carreras = Carrera::all();
      $modalidades = Modalidad::all();
      $estancias = Estancia::all();
      $servicio = Servicio::find($id);
      return view('admin/profesional/servicios/editar', compact('servicio', 'sectores', 'tipos', 'carreras', 'modalidades', 'estancias'));
    }

    public function update(Request $request, $id)
    {
      $validacion = Validator::make($request->all(), [
        'nombres' => 'required|max:255',
        'apellido_paterno' => 'required|max:255',
        'apellido_materno' => 'required|max:255',
        'matricula' => 'required|max:8',
        'carrera' => 'required',
        'email' => 'required',
        'numero_tel' => 'required',
        'sexo' => 'required',
        'lugar_servicio' => 'required',
        'direccion_lugar' => 'required',
        'responsable' => 'required',
        'sector' => 'required',
        'tipo' => 'required',
        'fecha_inicio' => 'date',
        'fecha_termino' => 'date',
        'numero_oficio' => 'required',
        'modalidad' => 'required',
        'estancia' => 'required',
        'calificacion' => 'numeric|min:0|max:100',
        'observaciones' => 'max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $sector = Sector::where('nombre', $request->sector)->first();
      $tipo = Tipo::where('nombre', $request->tipo)->first();
      $modalidad = Modalidad::where('nombre', $request->modalidad)->first();
      $estancia = Estancia::where('nombre', $request->estancia)->first();
      // $carrera = Carrera::where('nombre', $request->carrera)->first();
      // $alumno = Alumno::where('matricula', $request->matricula)->first();

      // $alumno->update([
      //   'nombres' => $request->nombres,
      //   'apellido_paterno' => $request->apellido_paterno,
      //   'apellido_materno' => $request->apellido_materno,
      //   'matricula' => $request->matricula,
      //   'id_carrera' => $carrera->id,
      //   'email' => $request->email,
      //   'numero_tel' => $request->numero_tel,
      //   'sexo' => $request->sexo,
      // ]);

      $servicio = Servicio::find($id);
      $servicio->update([
        // 'id_alumno' => $alumno->id,
        'id_sector' => $sector->id,
        'id_tipo' => $tipo->id,
        'id_modalidad' => $modalidad->id,
        'id_estancia' => $estancia->id,
        'lugar_servicio' => $request->lugar_servicio,
        'direccion_lugar' => $request->direccion_lugar,
        'responsable' => $request->responsable,
        'fecha_inicio' => $request->fecha_inicio,
        'fecha_termino' => $request->fecha_termino,
        'numero_oficio' => $request->numero_oficio,
        'calificacion' => $request->calificacion,
        'observaciones' => $request->observaciones,
      ]);
      
      return to_route('servicios.index')
            ->with(['mensaje' => 'Servicio social actualizado correctamente']);
    }

    public function destroy($id)
    {
      Servicio::destroy($id);
      return to_route('servicios.index')
            ->with(['mensaje' => 'Servicio social eliminado correctamente']);
    }
}
