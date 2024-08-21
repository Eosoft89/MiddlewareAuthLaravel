<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/create', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

 //Middleware definido en Bootstrap/app.php
// Route::get('/no-access', [ExampleController::class, 'noAccess'])->name('no-access'); (Return de ejemplo sin Middleware)

/*Route::middleware('example')->group(function (){  //Para especificar todas las rutas que serán evaluadas por el middleware
    Route::get('/', [ExampleController::class, 'index']); //también se puede sacar un middleware con ->withoutMiddleware('middleware)
});*/