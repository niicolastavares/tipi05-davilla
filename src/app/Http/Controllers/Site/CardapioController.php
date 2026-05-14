<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;

use Illuminate\Http\Request;

class CardapioController extends Controller
{

    public function cardapio()
    {

        // Buscar CATEGORIA para montar a lista de filtros
        $filtroCategoria = Categoria::where('status_categoria', 'ATIVO')
            ->inRandomOrder()
            ->get();

        // Parar e mostrar o que está ordenando de acordo com o que está puxando 
        // dd($filtroCategoria);



        // Buscar todos os PRODUTOS ATIVOS COM CATEGORIA para exibir na página / CategoriaProduto está sendo chamado dentro da função em app/Models/Produto.php 
        $listaProduto = Produto::with('CategoriaProduto')
            ->where('status_produto', 'ATIVO')
            ->orderBy('ordem_produto')
            ->get();

        // Parar e mostrar o que está ordenando de acordo com o que está puxando
        // dd($listaProduto);

        $categoriaAtiva = 'all';
        
        return view('site.cardapio.cardapio', compact(
            'filtroCategoria',
            'listaProduto',
            'categoriaAtiva'
        ));
    }

    public function showProduto($slug)
    {

        $produto = Produto::with('CategoriaProduto')
            ->where('status_produto', 'ATIVO')
            ->where('slug_produto', $slug)
            ->firstOrFail();

        $produtosRelacionados = Produto::where('status_produto', 'ATIVO')
            ->where('id_categoria', $produto->id_categoria)
            ->where('id_produto', '!=', $produto->id_produto)
            ->orderBy('ordem_produto')
            ->get();

        $listaCategoria = Categoria::where('status_categoria', 'ATIVO')
            ->orderBy('ordem_categoria')
            ->get();

        //dd($listaCategoria);

        return view('site.produto.produto', compact('produto', 'produtosRelacionados', 'listaCategoria'));
    }

    public function show($id)
    {
        $filtroCategoria = Categoria::where('status_categoria', 'ATIVO')
            ->orderBy('ordem_categoria')
            ->get();

        $listaProduto = Produto::with('CategoriaProduto')
            ->where('status_produto', 'ATIVO')
            ->orderBy('ordem_produto')
            ->get();

        $categoriaAtiva = '.categoria-' . $id;

        return view('site.cardapio.cardapio', compact(
            'filtroCategoria',
            'listaProduto',
            'categoriaAtiva'
        ));
    }
}
