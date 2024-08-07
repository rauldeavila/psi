<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadosBaseController;

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

// Route::get('/', function () {
//     return view('consulta');
// });

Route::get('/', [DadosBaseController::class, 'index'])->name('consulta.index');
Route::get('/cadastro', [DadosBaseController::class, 'create'])->name('cadastro.create');
Route::post('/cadastro', [DadosBaseController::class, 'store'])->name('cadastro.store');
Route::get('/consulta', [DadosBaseController::class, 'index'])->name('consulta.index');
Route::get('/consulta/{id}', [DadosBaseController::class, 'edit'])->name('consulta.show');
Route::get('/edicao/{id}', [DadosBaseController::class, 'edit'])->name('edicao.edit');
Route::put('/edicao/{id}', [DadosBaseController::class, 'update'])->name('edicao.update');

