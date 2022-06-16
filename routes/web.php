<?php

use App\Http\Controllers\Admin\Residencia\AlumnoController;
use App\Http\Controllers\Admin\Residencia\CarreraController;
use App\Http\Controllers\Admin\Residencia\EstanciaController;
use App\Http\Controllers\Admin\Residencia\ModalidadController as ResidenciaModalidadController;
use App\Http\Controllers\Admin\Residencia\OpcionController;
use App\Http\Controllers\Admin\Residencia\PeriodoController;
use App\Http\Controllers\Admin\Residencia\ResidenciaController;
use App\Http\Controllers\Admin\Residencia\ServicioController;
use App\Http\Controllers\Admin\Vinculacion\AlcanceController;
use App\Http\Controllers\Admin\Vinculacion\AreaController;
use App\Http\Controllers\Admin\Vinculacion\ConvenioController;
use App\Http\Controllers\Admin\Vinculacion\GiroController;
use App\Http\Controllers\Admin\Vinculacion\ModalidadController;
use App\Http\Controllers\Admin\Vinculacion\ObjetivoController;
use App\Http\Controllers\Admin\Vinculacion\SectorController;
use App\Http\Controllers\Admin\Vinculacion\TamanioController;
use App\Http\Controllers\Admin\Vinculacion\TipoController;
use App\Http\Controllers\DatosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware(['auth'])->group( function () {
  Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
  Route::resource('servicios', ServicioController::class);
  Route::resource('residencias', ResidenciaController::class);
  Route::resource('convenios', ConvenioController::class);
  Route::resource('alumnos', AlumnoController::class);
  Route::resource('modalidadesr', ResidenciaModalidadController::class);
  Route::resource('estancias', EstanciaController::class);
  Route::resource('carreras', CarreraController::class);
  Route::resource('alcances', AlcanceController::class);
  Route::resource('giros', GiroController::class);
  Route::resource('modalidades', ModalidadController::class);
  Route::resource('objetivos', ObjetivoController::class);
  Route::resource('sectores', SectorController::class);
  Route::resource('tamanios', TamanioController::class);
  Route::resource('tipos', TipoController::class);
  Route::resource('areas', AreaController::class);
  Route::resource('opciones', OpcionController::class);
  Route::resource('periodos', PeriodoController::class);
});

Route::get('/ajax/periodos/{periodo}', [DatosController::class, 'periodo_datos'])->name('periodos.datos');

require __DIR__.'/auth.php';
