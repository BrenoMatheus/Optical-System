@extends('layouts.main')
@section('title', 'Local')
@section('content')
<div class="container text-center">
    <h1 class="p-2">Locals</h1>
    <div class="row p-3 bg-gradient bg-secondary">
        <div class="col input-group">
            <span class="input-group-text bg-gradient bg-info"><img src="/img/icons/search-outline.svg" class="icon" ></span>
            <input type="text" id="pesquisar" name="pesquisar" class="form-control" placeholder="Procurar">
        </div>
        <div class="col-md-12 p-2 pt-3">
            <h5 id="qtde" class="text-light" ></h5>
        </div>
    </div>
</div>
@endsection