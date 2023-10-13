<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\OrdemDeServicoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('grupos', GrupoController::class);
Route::apiResource('ordem-servico', OrdemDeServicoController::class);
Route::apiResource('usuarios', UsuarioController::class);

Route::post('/login', [UsuarioController::class, 'login']);

