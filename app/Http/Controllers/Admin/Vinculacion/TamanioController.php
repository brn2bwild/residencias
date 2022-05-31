<?php

namespace App\Http\Controllers\Admin\Vinculacion;

use App\Http\Controllers\Controller;
use App\Models\Tamanio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TamanioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tamanios = Tamanio::all();
      return view('admin/vinculacion/datos/tamanios/index', compact('tamanios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/vinculacion/datos/tamanios/crear');
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
        'nombre' => 'required|unique:tamanios|max:255',
        'descripcion' => 'required|max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      Tamanio::create($request->all());
      return to_route('tamanios.index')
            ->with(['mensaje' => 'Tamaño registrado correctamente']);
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
      $tamanio = Tamanio::find($id);
      return view('admin/vinculacion/datos/tamanios/editar', compact('tamanio'));
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
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $tamanio = Tamanio::find($id);
      $tamanio->update($request->all());
      return to_route('tamanios.index')
            ->with(['mensaje' => 'Tamaño actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Tamanio::destroy($id);
      return to_route('tamanios.index')
            ->with(['mensaje' => 'Tamaño eliminado correctamente']);
    }
}
