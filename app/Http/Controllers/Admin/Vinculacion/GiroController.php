<?php

namespace App\Http\Controllers\Admin\Vinculacion;

use App\Http\Controllers\Controller;
use App\Models\Giro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $giros = Giro::all();
      return view('admin/vinculacion/datos/giros/index', compact('giros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/vinculacion/datos/giros/crear');
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
        'nombre' => 'required|unique:giros|max:255',
        'descripcion' => 'required|max:255'
      ]);
      
      if($validacion->fails()){
        return back()
        ->withErrors($validacion)
        ->withInput();
      }
      Giro::create($request->all());
      return to_route('giros.index')
          ->with(['mensaje' => 'Giro registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Giro $giro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $giro = Giro::find($id);
      return view('admin/vinculacion/datos/giros/editar', compact('giro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validacion = Validator::make($request->all(),[
        'nombre' => 'required|unique:giros|max:255',
        'descripcion' => 'required|max:255'
      ]);
      
      if($validacion->fails()){
        return back()
        ->withErrors($validacion)
        ->withInput();
      }

      $giro = Giro::find($id);
      $giro->update($request->all());

      return to_route('giros.index')
            ->with(['mensaje' => 'Giro actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Giro::destroy($id);
      return to_route('giros.index')
            ->with(['mensaje' => 'Giro eliminado correctamente']);
    }
}
