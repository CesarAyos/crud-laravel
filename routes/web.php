<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/empleado', function () { 
//     return view('empleado.index');
// });

// Route::get('/empleado/create',[EmpleadoController::class,'create']);

// lo de arriba es lo mismo que lo de abajo para ahorrar mas codigo

Route::resource('empleado', EmpleadoController::class)->middleware('auth');

Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
});
