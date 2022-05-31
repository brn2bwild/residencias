<?php

namespace App\Http\Controllers\Admin\Residencia;

use App\Http\Controllers\Controller;
use App\Models\Residencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $residencias = Residencia::all();
      return view('admin/profesional/residencias/index', compact('residencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/profesional/residencias/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

      Residencia::create($request->all());
      return to_route('residencias.index')
            ->with(['mensaje' => 'Residencia registrada correctamente']);
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
      $residencia = Residencia::find($id);
      return view('admin/profesional/residencias/editar', compact('residencia'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Residencia::destroy($id);
      return to_route('residencias.index')
            ->with(['mensaje' => 'Residencia eliminada correctamente']);
    }
}
