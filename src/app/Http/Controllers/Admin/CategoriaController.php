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
        
        return view('admin.categorias.index', compact('categorias')); // Passa as categorias para a view
    }
}
