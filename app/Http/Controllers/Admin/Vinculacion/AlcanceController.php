<?php

namespace App\Http\Controllers\Admin\Vinculacion;

use App\Http\Controllers\Controller;
use App\Models\Alcance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlcanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $alcances = Alcance::all();
      return view('admin/vinculacion/datos/alcances/index', compact('alcances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/vinculacion/datos/alcances/crear');
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
        'nombre' => 'required|unique:alcances|max:255',
        'descripcion' => 'required|max:255',
      ],[
        'nombre.required' => 'Debes especificar un nombre para el alcance',
        'nombre.unique' => 'El nombre ya está siendo utilizado por otro alcance',
        'nombre.max' => 'El máximo de caracteres es de 255',
        'descripcion.required' => 'Debes especificar una descripción para el alcance',
        'descripcion.max' => 'El máximo de caracteres es de 255',
      ]);

      if($validacion->fails()){
        return back()
            ->withErrors($validacion)
            ->withInput();
      }

      Alcance::create($request->all());
      return to_route('alcances.index')
          ->with(['mensaje' => 'Alcance registrado correctamente']);
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
      $alcance = Alcance::find($id);
      return view('admin/vinculacion/datos/alcances/editar', compact('alcance'));
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
        'descripcion' => 'required|max:255',
      ],[
        'nombre.required' => 'Debes especificar un nombre para el alcance',
        'nombre.unique' => 'El nombre ya está siendo utilizado por otro alcance',
        'nombre.max' => 'El máximo de caracteres es de 255',
        'descripcion.required' => 'Debes especificar una descripción para el alcance',
        'descripcion.max' => 'El máximo de caracteres es de 255',
      ]);

      if($validacion->fails()){
        return back()
            ->withErrors($validacion)
            ->withInput();
      }

      $alcance = Alcance::find($id);
      $alcance->update($request->all());
      
      return to_route('alcances.index')
          ->with(['mensaje' => 'Alcance actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Alcance::destroy($id);
      return to_route('alcances.index')
          ->with(['mensaje' => 'Alcance borrado con éxito']);
    }
}
