@extends('layouts.main')
@section('title', 'Cadastro de Paciente')
@section('content')
<div class="container p-4 ">
        <div class="card m-5">     
            <div class="card-header">
                <h4 class="card-title text-center fw-bold">Paciente</h4>           
              </div>
              <div class="card-body">       
              <form action="/pacients" method="POST" enctype="multipart/form-data">
                @csrf           
              <div class="row p-3 justify-content-end">   
                  <div class="col-auto align-self-end">
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>  
                  </div>
              </div>
              <div class="row p-3 justify-content-center">                  
                  <div class="col">
                    <label class="form-label fw-bold">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" required>
                  </div>  
                  <div class="col">
                  <label for="validationCustom03" class="form-label fw-bold">Número:</label>
                  <input type="number" class="form-control" name="telefone" id="telefone" required>
                </div>                 
              </div>
               <div class="row p-3 justify-content-center">                  
                  <div class="col">
                        <span id="msgAlertaSituacao"></span>  
                              <label for="validationCustom04" class="form-label fw-bold">Local:</label>
                              <select class="form-select" id="local" name="local" required> 
                                                            
                              </select>
                            </div> 
                   <div class="col">
                    <label class="form-label fw-bold">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" >                   
                  </div>                
              </div>
              
            <div class="row p-1 justify-content-center">
                 <div class="col-auto">
              
                </div> 
                <div class="row p-3 justify-content-center">
                    <label class="form-label fw-bold">Observação</label>
                     <textarea class="form-control" name="obs" id="obs" rows="3"></textarea>
                 </div>
                 <div class="row p-1 justify-content-center">
                 <input type="submit" class="btn btn-outline-success btn-sm col-3" id="cad-paciente-btn" value="Cadastrar" />
             </div>
            </form>
            </div>
        </div>
@endsection