@extends('layouts.main')
@section('title', 'Campanha da Boa visao')
@section('content')
    <div class="container ">
        <div id="search-container" class="col-ml-12">
        </div>
    <div class="row row-cols-md-3 p-3 g-4 justify-content-center">
        <div class="col-6">
            <a href="/pacientes"> 
                <div class="card">
                    <img src="/img/card-welcome/pac.jpg" class="card-img-top img-painel" alt="Pacient"> 
                <div class="card-img-overlay">
                    <h5 class="card-title text-center">Pacientes</h5>
                </div>
            </a>
        </div>
    </div>
    <div class="col-6">
        <a href="/exames"> 
            <div class="card">
                    <img src="/img/card-welcome/exame.jpg" class="card-img-top img-painel" alt="Exames">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center ">Exames</h5>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-6">
        <a href="/produtos">
            <div class="card" >
                    <img src="/img/card-welcome/produto.jpg" class="card-img-top img-painel">
                <div class="card-img-overlay">
                   <h5 class="card-title text-center">Produtos</h5> 
                </div>
            </div>
        </a>
    </div>
    <div class="col-6">
        <a href="/despesas">
            <div class="card" >
                <img src="/img/card-welcome/despesa.jpg" class="card-img-top img-painel" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title  text-center">Despesas</h5>
            </div>
        </a>
      </div>
    </div>
    <div class="col-6">
        <a href="/vendas">
            <div class="card" >
                <img src="/img/card-welcome/venda.jpg" class="card-img-top img-painel" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center">Vendas</h5>
                 </div>
            </div>
        </a>
    </div>
    <div class="col-6">
        <a href="/financas">
            <div class="card" >
                <img src="/img/card-welcome/financa.jpg" class="card-img-top img-painel" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center">Finanças</h5>
                </div>
        </div>
        </a>
    </div>
  </div>
</div>
@endsection