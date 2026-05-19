<?php

// Site
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SobreController;
use App\Http\Controllers\Site\CardapioController;
use App\Http\Controllers\Site\PedidosController;
use App\Http\Controllers\Site\RegiaoController;
use App\Http\Controllers\Site\ContatoController;

// Admin
use App\Http\Controllers\Admin\DashController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProdutoController;

use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/sobre', [SobreController::class, 'sobre'])->name('sobre');

Route::get('/cardapio', [CardapioController::class, 'cardapio'])->name('cardapio.index');

Route::get('/pedidos', [PedidosController::class, 'pedidos'])->name('pedidos');

Route::get('/regiao', [RegiaoController::class, 'regiao'])->name('regiao');

Route::get('/contato', [ContatoController::class, 'contato'])->name('contato');

/** Submenu de cardápio */
Route::get('/cardapio/categoria/{id}', [CardapioController::class, 'show'])->name('cardapio.categoria');


/** Submenu de produto */
Route::get('/cardapio/produto/{slug}', [CardapioController::class, 'showProduto'])->name('cardapio.produto');


/** Submenu de região */
Route::get('/regiao/categoria/{id}', [RegiaoController::class, 'show'])->name('regiao.index');


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashController::class, 'index'])->name('dash');

    // Rotas para categorias
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categoria.index');
    
    // Rotas para produtos
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
});
