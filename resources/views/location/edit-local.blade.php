@extends('layouts.main')
@section('title', 'Edição de Local')
@section('content')

<div class="container p-4 ">
        <div class="card m-5">     
            <div class="card-header">
                <h4 class="card-title text-center fw-bold">Local</h4>           
              </div>
              <form action="/local/update/{{$local->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
              <div class="card-body"> 
              <div class="row p-3 justify-content-center">                  
                  <div class="col">
                    <label class="form-label fw-bold">local:</label>
                    <input type="text" class="form-control" name="local" id="local" value="{{$local->local}}" required>
                  </div>  
                  <div class="col">
                  <label for="validationCustom03" class="form-label fw-bold">Contato Principal:</label>
                  <input type="text" class="form-control" name="contato" id="contato" value="{{$local->contato}}" required>
                </div>                 
              </div>
               <div class="row p-3 justify-content-center">                  
                   <div class="col">
                    <label class="form-label fw-bold">Observação:</label>
                    <input type="text" class="form-control" name="observacao" id="observacao" value="{{$local->observacao}}" >                   
                  </div> 
                  <div class="col">
                    <label class="form-label fw-bold">telefone Principal:</label>
                    <input type="number" class="form-control" name="telefone" id="telefone" value="{{$local->telefone}}" required>                   
                  </div>                
              </div>
                 <div class="row p-3 justify-content-center">
                        <button type="submit" class="btn btn-warning">Editar</button>
                 </div>
                 </form>
            </div>
        </div>

@endsection