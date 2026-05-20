<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categoria; // Importa o modelo Categoria

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::orderBy('ordem_categoria') // Obtém as categorias ordenadas por ordem_categoria
            ->get();

        // dd($categorias); // Verifica os dados retornados

        return view('admin.categoria.index', compact('categorias')); // Passa as categorias para a view
    }

    public function store(Request $request)
    {
        // dd($request); // Verifica os dados recebidos do formulário

        // Validação dos dados recebidos do formulário
        $request->validate([
            'nome_categoria'        => 'required|string|max:30',
            'descricao_categoria'   => 'required|string',
            'ordem_categoria'       => 'required|integer',
            'status_categoria'      => 'required|in:ATIVO,INATIVO',
        ]);

        // Criação da nova categoria usando o modelo Categoria
        Categoria::create([
            'nome_categoria'        => $request->nome_categoria,
            'descricao_categoria'   => $request->descricao_categoria,
            'ordem_categoria'       => $request->ordem_categoria,
            'status_categoria'      => $request->status_categoria,
        ]);

        // Redireciona de volta para a página de categorias com uma mensagem de sucesso
        return redirect()
            ->route('admin.categoria.index')
            ->with('success', 'Categoria cadastrada com sucesso!');
    }

    public function disable($id)
    {
        // dd($id); // Verifica o ID recebido para desativar a categoria

        $categoria = Categoria::findOrFail($id); // Encontra a categoria pelo ID ou falha se não encontrar
        //dd($categoria); // Verifica os dados da categoria encontrada

        $categoria->update([
            'status_categoria' => 'INATIVO' // Define o status da categoria como INATIVO
        ]);

        // Redireciona de volta para a página de categorias com uma mensagem de sucesso
        return redirect()
            ->route('admin.categoria.index')
            ->with('success', 'Categoria desativada com sucesso!');
    }

    public function activate($id)
    {
        // dd($id); // Verifica o ID recebido para ativar a categoria

        $categoria = Categoria::findOrFail($id); // Encontra a categoria pelo ID ou falha se não encontrar
        //dd($categoria); // Verifica os dados da categoria encontrada

        $categoria->update([
            'status_categoria' => 'ATIVO' // Define o status da categoria como ATIVO
        ]);

        // Redireciona de volta para a página de categorias com uma mensagem de sucesso
        return redirect()
            ->route('admin.categoria.index')
            ->with('success', 'Categoria ativada com sucesso!');
    }
}
