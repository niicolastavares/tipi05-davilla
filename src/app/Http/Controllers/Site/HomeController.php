<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Banner;

class HomeController extends Controller
{


    // * Método HOME - Carregar a index
    public function home()
    {

        // Buscar CATEGORIA para montar a lista de filtros
        $filtroCategoria = Categoria::where('status_categoria', 'ATIVO')
            ->orderBy('ordem_categoria')
            ->get();

        // dd($filtroCategoria);

        // Buscar todos os PRODUTOS ATIVOS COM CATEGORIA para exibir na página / CategoriaProduto está sendo chamado dentro da função em app/Models/Produto.php 
        $listaProduto = Produto::with('CategoriaProduto')
            ->where('status_produto', 'ATIVO')
            ->orderBy('ordem_produto')
            ->get();

        $banners = Banner::where('status_banner', 'ATIVO')
            ->orderBy('ordem_banner')
            ->get();


        return view('site.home.home', compact(
            'filtroCategoria',
            'listaProduto',
            'banners',
        ));
    }
}
