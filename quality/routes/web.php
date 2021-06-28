<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controladora;
use App\Http\Controllers\Dependcontroller;
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


Route::post('/cadastro', [Controladora::class, 'cadastrar'])->name('cadastrar');
Route::post('/{tag}', [Controladora::class, 'setDependente']);

Route::get('/', [Controladora::class, 'index']);
Route::get('/lista', [Controladora::class, 'lista']);
Route::get('/cadastro', [Controladora::class, 'cadastro']);

Route::get('/lista/status/{id}/{status}', [Controladora::class, 'update']);
Route::get('/{tag}', [Controladora::class, 'getDep']);
Route::post('/cadastro/delete', [Controladora::class, 'excluirCadastro']);
Route::get('/lista/status/{id_user}', [Dependcontroller::class, 'deleteDependente']);
Route::get('/lista/delet', [Controladora::class, 'deleteCadastro']);