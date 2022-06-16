<?php

namespace App\Http\Controllers\Admin\Residencia;

use App\Http\Controllers\Controller;
use App\Models\Estancia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstanciaController extends Controller
{
    public function index()
    {
      $estancias = Estancia::all();
      return view('admin/profesional/datos/estancias/index', compact('estancias'));
    }

    public function create()
    {
      return view('admin/profesional/datos/estancias/crear');
    }

    public function store(Request $request)
    {
      $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:255|unique:modalidadrs',
        'descripcion' => 'required|max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      Estancia::create($request->all());
      return to_route('estancias.index')
            ->with(['mensaje' => 'Estancia registrada correctamente']);
    }

    public function edit($id)
    {
      $estancia = Estancia::find($id);
      return view('admin/profesional/datos/estancias/editar', compact('estancia'));
    }

    public function update(Request $request, $id)
    {
      $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:255|unique:modalidadrs',
        'descripcion' => 'required|max:255',
      ]);

      if($validacion->fails()){
        return back()
              ->withErrors($validacion)
              ->withInput();
      }

      $estancia = Estancia::find($id);
      $estancia->update($request->all());

      return to_route('estancias.index')
            ->with(['mensaje' => 'Estancia actualizada correctamente']);
    }

    public function destroy($id)
    {
      Estancia::destroy($id);
      return to_route('estancias.index')
            ->with(['mensaje' => 'Estancia eliminada correctamente']);
    }
}
