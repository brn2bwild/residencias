<?php

namespace App\Http\Controllers\Admin\Vinculacion;

use App\Http\Controllers\Controller;
use App\Models\Convenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $convenios = Convenio::all();
      return view('admin/vinculacion/convenios/index', compact('convenios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/vinculacion/convenios/crear');
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
        'nombre' => 'required|unique:convenios|max:255',
        'descripcion' => 'required|max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      Convenio::create($request->all());
      
      return to_route('convenios.index')
            ->with(['mensaje' => 'Convenio registrado correctamente']);
    }

    public function edit($id)
    {
      $convenio = Convenio::find($id);
      return view('admin/vinculacion/convenios/editar', compact('convenio'));
    }

    public function update(Request $request, $id)
    {
      $validacion = Validator::make($request->all(), [
        'nombre' => 'required|unique:convenios|max:255',
        'descripcion' => 'required|max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $convenio = Convenio::find($id);
      $convenio->update($request->all());

      return to_route('convenios.index')
            ->with(['mensaje' => 'Convenio actualizado correctamente']);
    }

    public function destroy($id)
    {
      Convenio::destroy($id);
      return to_route('convenios.index')
            ->with(['mensaje' => 'Convenio eliminado correctamente']);
    }
}
