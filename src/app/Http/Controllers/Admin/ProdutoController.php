<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produto; // Importa o modelo Categoria

class ProdutoController extends Controller
{
    
    public function index()
    {
        $produtos = Produto::orderBy('ordem_produto') // Obtém os produtos ordenados por ordem_produto
        ->get(); 

        // dd($produtos); // Verifica os dados retornados

        return view('admin.produtos.index', compact('produtos')); // Passa os produtos para a view
    }
}
