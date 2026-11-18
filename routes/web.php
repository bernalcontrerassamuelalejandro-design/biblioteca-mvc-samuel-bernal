
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return redirect()->route('libros.index');
});

Route::resource('libros', LibroController::class);

Route::get('/categorias', [CategoriaController::class, 'index'])
    ->name('categorias.index');

Route::post('/categorias', [CategoriaController::class, 'store'])
    ->name('categorias.store');

Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])
    ->name('categorias.destroy');
