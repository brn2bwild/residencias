<?php

namespace App\Http\Controllers\Admin\Vinculacion;

use App\Http\Controllers\Controller;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipos = Tipo::all();
      return view('admin/vinculacion/datos/tipos/index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/vinculacion/datos/tipos/crear');
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
        'nombre' => 'required|unique:tipos|max:255',
        'descripcion' => 'required|max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      Tipo::create($request->all());
      return to_route('tipos.index')
            ->with(['mensaje' => 'Tipo registrado correctamente']);
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
      $tipo = Tipo::find($id);
      return view('admin/vinculacion/datos/tipos/editar', compact('tipo'));
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
        'descripcion' => 'required|max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $tipo = Tipo::find($id);
      $tipo->update($request->all());

      return to_route('tipos.index')
            ->with(['mensaje' => 'Tipo actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Tipo::destroy($id);
      return to_route('tipos.index')
            ->with(['mensaje' => 'Tipo eliminado correctamente']);
    }
}
