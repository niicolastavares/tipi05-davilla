<!--Page Title-->
    @php
    $pageTitle = asset('davilla/images/produto/banner-cardapio.jpg');
    @endphp

    <section class="page-title" style="background-image:url('{{ $pageTitle }}')">
        <div class="auto-container">
            <h1>CARDÁPIO</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">home</a></li>
                <li>Cardápio</li>
            </ul>
        </div>
    </section>
<!--End Page Title-->