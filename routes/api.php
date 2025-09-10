<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ineController;

Route::get('/ine', [ineController::class, 'showIne']);

Route::get('/ine/{id}', function (Request $request) {
    return 'Obteniendo ine';
});

Route::post('/ine', [ineController::class, 'store']);

Route::put('/ine/{id}', function (Request $request) {
    return 'Actualizando ine';
});

Route::delete('/ine/{id}', function (Request $request) {
    return 'Eliminando ine';
});