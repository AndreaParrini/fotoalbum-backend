<?php

use App\Http\Controllers\Api\FotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Foto;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('fotos', [FotoController::class, 'index']);

Route::get('fotos/{foto}', [FotoController::class, 'show']);
