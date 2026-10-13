<?php

use App\Http\Controllers\Api\V1\StatusController;
use App\Http\Controllers\Api\V1\BannerController;
use App\Http\Controllers\Api\V1\CategoriaController;
use App\Http\Controllers\Api\V1\ProdutoController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ClienteController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Autenticação de clientes
    Route::post('/auth/login', [AuthController::class, 'login']);

    // Perfil do cliente autenticado
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/cliente', [ClienteController::class, 'show']);
        Route::put('/cliente', [ClienteController::class, 'update']);
        Route::put('/cliente/senha', [ClienteController::class, 'updatePassword']);
    });



    Route::post('/auth/logout', [AuthController::class, 'logout'])
        ->middleware('auth:sanctum');
    // Status da API
    Route::get('/status', [StatusController::class, 'index']);

    // Banners
    Route::get('/banners', [BannerController::class, 'index']);

    // Categorias
    Route::get('/categorias', [CategoriaController::class, 'index']);
    Route::get('/categorias/{id}', [CategoriaController::class, 'produtos']);

    // Produtos
    Route::get('/produtos', [ProdutoController::class, 'index']);
    Route::get('/produtos/{slug}', [ProdutoController::class, 'show']);
});
