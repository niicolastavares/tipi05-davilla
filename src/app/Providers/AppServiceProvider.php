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
            $categorias = Categoria::orderBy('nome_categoria', 'asc')->get();

            dd($categorias);
            //var_dump($categorias);

            $view->with('categorias', $categorias);
        });
    }
}
