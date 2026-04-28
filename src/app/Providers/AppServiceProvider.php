<?php

namespace App\Providers;

use App\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Categoria;
//use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void // definir que o compose irá ser executado
    {

        View()->composer('partials.header', function ($view) {

            // * Buscar todas as categorias e ordenar por nome crescente A-Z
            $listaCategoria = Categoria::orderBy('nome_categoria', 'asc')->get();

            //dd($listaCategoria); // Para a aplicação e retorna o conteúdo da variável $listaCategoria para depuração
            //var_dump($listaCategoria); // Exibe o conteúdo da variável $listaCategoria sem parar a execução da aplicação

            $view->with('lista', $listaCategoria); // Passa a variável $listaCategoria para a view 'partials.header' com o nome 'lista'

        });
    }
}
