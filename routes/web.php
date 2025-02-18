<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/empleado', function () { 
//     return view('empleado.index');
// });

// Route::get('/empleado/create',[EmpleadoController::class,'create']);

// lo de arriba es lo mismo que lo de abajo para ahorrar mas codigo

Route::resource('empleado', EmpleadoController::class);
