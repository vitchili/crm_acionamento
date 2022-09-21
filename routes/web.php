<?php

use App\Http\Livewire\Acionamento\Acionamento;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SincronizaDadosCalculo;
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

Route::get('/acionamento', Acionamento::class);
Route::get('/acionamento/{id}', Acionamento::class);
Route::get('/', Acionamento::class);
Route::get('/sincronizaAquicob', SincronizaDadosCalculo::class);