<?php

namespace App\Http\Controllers\Admin\Residencia;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $servicios = Servicio::all();
      return view('admin/profesional/servicios/index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/profesional/servicios/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:255',
        'apellido_paterno' => 'required|max:255',
        'apellido_materno' => 'required|max:255',
        'matricula' => 'required|max:8|unique:servicios',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      Servicio::create($request->all());
      return to_route('servicios.index')
            ->with(['mensaje' => 'Servicio Social registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $servicio = Servicio::find($id);
      return view('admin/profesional/servicios/editar', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:255',
        'apellido_paterno' => 'required|max:255',
        'apellido_materno' => 'required|max:255',
        'matricula' => 'required|max:8',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $servicio = Servicio::find($id);
      $servicio->update($request->all());
      
      return to_route('servicios.index')
            ->with(['mensaje' => 'Servicio social actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Servicio::destroy($id);
      return to_route('servicios.index')
            ->with(['mensaje' => 'Servicio social eliminado correctamente']);
    }
}
