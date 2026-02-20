<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\farmamodcontroller;

Route::get('/main', [farmamodcontroller::class, 'main'])->name('main');

Route::get('/alta', [farmamodcontroller::class, 'alta'])->name('alta');

Route::post('/guardar', [farmamodcontroller::class, 'guardar'])->name('guardar');

Route::get('/reporte', [farmamodcontroller::class, 'reporte'])->name('reporte');

Route::get(
    '/medicamentos-por-categoria/{id_catm}',
    [farmamodcontroller::class, 'medicamentosPorCategoria']
)->name('medicamentos.porCategoria');

Route::get(
    '/servicios-por-categoria/{id_cats}',
    [farmamodcontroller::class, 'serviciosPorCategoria']
)->name('servicios.porCategoria');

Route::get('/api/servicios', [ServicioController::class, 'index']);
