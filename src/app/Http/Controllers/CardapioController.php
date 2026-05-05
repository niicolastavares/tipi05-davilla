<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;

use Illuminate\Http\Request;

class CardapioController extends Controller
{

    public function cardapio()
    {

        // Buscar CATEGORIA para montar a lista de filtros
        $filtroCategoria = Categoria::where('status_categoria', 'ATIVO')->orderBy('ordem_categoria')->get();

        // Parar e mostrar o que está ordenando de acordo com o que está puxando 
        // dd($filtroCategoria);



        // Buscar todos os PRODUTOS ATIVOS COM CATEGORIA para exibir na página / CategoriaProduto está sendo chamado dentro da função em app/Models/Produto.php 
        $listaProduto = Produto::with('CategoriaProduto')->where('status_produto', 'ATIVO')->orderBy('ordem_produto')->get();

        // Parar e mostrar o que está ordenando de acordo com o que está puxando
        // dd($listaProduto);


        return view('site.cardapio.cardapio', compact('filtroCategoria', 'listaProduto'));
    }

    public function showProduto($slug){

        // Faça um select na tabela aonde o id_produto seja igual ao id passado por parâmetro, e traga a categoria relacionada, caso não encontre, retorne um erro 404
        $produto = Produto::with('CategoriaProduto')
        ->where('status_produto', 'ATIVO')
        ->where('slug_produto', $slug)
        ->firstOrFail(); 
        
        return view('site.cardapio.produto', compact('produto'));

        dd($produto);
    }







}
