<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
<!-- Fontes do Google -->
<link href="/css/font.css" rel="stylesheet">
<!-- CSS Bootstrap -->
<link href="/css/bootstrap.min.css" rel="stylesheet" >
<!-- JS Bootstrap -->
<script src="/js/bootstrap.min.js"></script>
<!-- CSS aplicaçao -->
<link rel="stylesheet" href="/css/style.css">
        <script src="/js/scripts.js"></script>
        <script src="/js/jquery.js"></script>
        <header>
            <nav class="navbar bg-light">
                <a href="/" class="navbar-brand">
                    <img src="/img/cbv.jpg" class="rounded-circle border border-primary" width="50" alt="Campanha_boa_visao">
               </a>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))                                                    
                    <p class="msg alert alert-success text-center">{{ session('msg') }}</p>
                    @endif
                @yield('content')   
            </div>
            </div>
        </main>      
        <div class="container border-top border-dark">
            <footer class="py-3 my-4">
                <p class="text-center text-muted">© 2022 Company, Inc</p>
            </footer>
        </div>     
</html>