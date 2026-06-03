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

// Auth
use App\Http\Controllers\Admin\AuthController;

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



// Início do prefix admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'autenticar'])->name('login.autenticar');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



    /* ###### ROTAS PROTEGIAS POR AUTENTICAÇÃO ###### */
    Route::middleware('auth:admin')->group(function () {


        Route::get('/', [DashController::class, 'index'])->name('dash');

        // Rotas para categorias
        Route::get('/categorias', [CategoriaController::class, 'index'])->name('categoria.index');

        // Rotas para produtos
        Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');


        // ###### Outras rotas para categorias e produtos podem ser adicionadas aqui (create, store, edit, update, destroy) ######

        Route::post('/categorias', [CategoriaController::class, 'store'])->name('categoria.store');


        // Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categoria.update'); // put espera todos os dados do formulário
        // Desativar
        Route::patch('/categorias/{id}/desativar', [CategoriaController::class, 'desativar'])->name('categoria.disable');
        // Ativar
        Route::patch('/categorias/{id}/ativar', [CategoriaController::class, 'ativar'])->name('categoria.create');
        // Editar
        Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categoria.update');


        Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
        Route::post('/produto', [ProdutoController::class, 'store'])->name('produto.store');

        // Desativar
        Route::patch('/produtos/{id}/desativar', [ProdutoController::class, 'desativar'])->name('produtos.disable');
        // Ativar
        Route::patch('/produtos/{id}/ativar', [ProdutoController::class, 'ativar'])->name('produtos.create');
        // Editar
        Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');

    });
    // Fim do prefix admin  


});
