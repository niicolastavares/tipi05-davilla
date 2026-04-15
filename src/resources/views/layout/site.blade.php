<!DOCTYPE html>
<html lang="pt-BR">

<head>
    @include('partials.head')

    <head>

    <body>

        <div class="page-wrapper">
            @include('partials.preloader')

            @include('partials.header')

            <main>
                @yield('content')

                @include('site.home.main-slider')

                @include('site.home.services-section')

                @include('site.home.call-to-action')

                @include('site.home.portfolio-section')

                @include('site.home.features-section')

                @include('site.home.recipes-section')

                @include('site.home.testimonial-section')

                @include('site.home.pricing-section')
            </main>

            @include('partials.scroll-to-top')

            @include('partials.footer')


        </div>

        @include('partials.script')


    </body>

</html>