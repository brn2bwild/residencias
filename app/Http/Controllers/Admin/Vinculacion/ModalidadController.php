<?php

namespace App\Http\Controllers\Admin\Vinculacion;

use App\Http\Controllers\Controller;
use App\Models\Modalidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $modalidades = Modalidad::all();
      return view('admin/vinculacion/datos/modalidades/index', compact('modalidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/vinculacion/datos/modalidades/crear');
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
        'nombre' => 'required|unique:modalidads|max:255',
        'descripcion' => 'required|max:255'
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      Modalidad::create($request->all());
      return to_route('modalidades.index')
            ->with(['mensaje' => 'Modalidad registrada correctamente']);
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
      $modalidad = Modalidad::find($id);
      return view('admin/vinculacion/datos/modalidades/editar', compact('modalidad'));
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
        'descripcion' => 'required|max:255'
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $modalidad = Modalidad::find($id);
      $modalidad->update($request->all());

      return to_route('modalidades.index')
            ->with(['mensaje' => 'Modalidad actualizada correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Modalidad::destroy($id);
      return to_route('modalidades.index')
            ->with(['mensaje' => 'Modalidad eliminada correctamente']);
    }
}
