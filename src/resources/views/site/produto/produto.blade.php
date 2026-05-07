@extends('layout.site')

@section('content')

    @include('site.produto.page-title')
    
    @include('site.produto.sidebar')
    

    {{-- Plugin usado apenas nesta página. 
        A biblioteca Select2 (select2.min.js) é um plugin em JavaScript que serve para melhorar e deixar mais avançados os campos <select> do HTML.

        A biblioteca sticky_sidebar.min.js é usada para criar uma sidebar (barra lateral) “grudada” na tela enquanto você rola a página.
    --}}

    @push('plugins')
    <script src="{{ asset('davilla/js/select2.min.js') }}"></script>
    <script src="{{ asset('davilla/js/sticky_sidebar.min.js') }}"></script>
    @endpush


@endsection