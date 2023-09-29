<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UserController;
use App\Models\Estado;
use App\Models\Tarea;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/









Auth::routes();

Route::get('/about', 'App\Http\Controllers\homeController@about');




//Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');



Route::get('/', function () {
    return redirect('login');
});
Route::put('/home/{$id}', [App\Http\Controllers\HomeController::class, 'update'])->name('home');

Route::resource('home',App\Http\Controllers\HomeController::class )->middleware('auth');
    
Route::resource('areas',App\Http\Controllers\AreaController::class )->middleware('auth');
Route::resource('estados',App\Http\Controllers\EstadoController::class )->middleware('auth');
Route::resource('users',App\Http\Controllers\UserController::class );
Route::resource('tareas',App\Http\Controllers\TareaController::class );
Route::get('tabla', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/ListarTareaUsuario', [App\Http\Controllers\DatatableController::class, 'ListarTareaUsuario'])->name('ListarTareaUsuario');

Route::get('/index', [App\Http\Controllers\UserController::class, 'datatable'])->name('tabla');

Route::get('/tabla2', [App\Http\Controllers\DatatableController::class, 'tabla2'])->name('tabla2');
Route::get('/tabla3', [App\Http\Controllers\DatatableController::class, 'tabla3'])->name('tabla3');
Route::get('/listarTareas',[App\Http\Controllers\TareaController::class, 'listarTareas'])->name('listarTareas');
Route::get('/listaEstados',[App\Http\Controllers\EstadoController::class, 'listaEstados'])->name('listaEstados');
Route::get('/listAreas',[App\Http\Controllers\AreaController::class, 'listAreas'])->name('listAreas');


/*
listAreas
Route::resource('tareas',App\Http\Controllers\TareaController::class );

Route::get('tareas', [TareaController::class, 'index'])->name('tareas')->middleware('auth');



Route::get('users', [UserController::class, 'index'])->name('users.index');



//



Route::resource('home',App\Http\Controllers\EstadoController::class );

/*Route::get('/area', function () {
    return view('area.index');
});*/
/*

Route::get('/register',[RegisterController::class, 'create'])->middleware('auth');



// Ruta para actualizar una tarea (POST)

// Ruta para mostrar la página principal (GET)
Route::get('/tareas', [App\Http\Controllers\TareaController::class, 'index'])->middleware('auth');

Route::get('/estados', [App\Http\Controllers\EstadoController::class, 'index'])->middleware('auth');




/*
route::get('tarea/{$id}/edit', [HomeController::class,'edit'])->name('tarea.edit');
Route::resource('/home',App\Http\Controllers\HomeController::class );
*/