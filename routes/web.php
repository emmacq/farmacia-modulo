<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Página principal
Route::get('/', [PaginaController::class, 'main'])->name('main');

// Página Acerca
Route::get('/acerca', [PaginaController::class, 'acerca'])->name('acerca');

// Página Contacto
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');

// Ruta con parámetro
Route::get('/usuario/{id}', [PaginaController::class, 'usuario'])->name('usuario');