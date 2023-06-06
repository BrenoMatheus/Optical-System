@extends('pacients.show-pacient')
@section('title', 'Exame:' .$pacient->nome)
@section('exame')

        <div class="card text-center fw-bold">
        <form action="/exame" method="POST" enctype="multipart/form-data">
                @csrf 
            <div class="card-header">
                <h5><strong>Exame</strong></h5>
            </div>
            <input type="hidden" name="pacient_id" value="{{$pacient->id}}">
            <input type="hidden" name="local" value="{{$pacient->local_id}}">
            <div class="card-header">            
            <input type="text" class="form-control" name="doutor" value="Dr. {{$user}}" required>
            </div>
            <div class="card-body ">         
                <!-- longe -->
                    <div class="row justify-content-center p-3">
                    <div class="col-auto">
                        <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" required>  
                    </div>
                    <div class="col-auto ">
                        <input type="file" name="image_exame" id="image_exame" class="form-control">
                    </div>
                    </div>
                    <!-- longef -->
                    <!-- diagnostico -->
        <div class="container text-center"> 
            <div class="row p-3 justify-content-center">
                <div class="col-auto">
                    <h4><strong>Diagnóstico</strong></h4>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Miopia" name="diagnostico[]">
                    <label class="form-check-label" for="flexCheckDefault">Miopia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Hipermetropia" name="diagnostico[]">
                    <label class="form-check-label" for="flexCheckDefault">Hipermetropia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Presbiopia" name="diagnostico[]">
                    <label class="form-check-label" for="flexCheckDefault">Presbiopia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Astigmatismo" name="diagnostico[]">
                    <label class="form-check-label" for="flexCheckDefault">Astigmatismo</label>
                    </div>
                </div>
            </div>
        <div class="row p-3 justify-content-center">
        <div class="col-auto">
            <h4><strong>Indicação</strong></h4>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Multifocal" name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">Multifocal</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Bifocal" name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">Bifocal</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="V.S" name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">V.S.</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Fotossensível" name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">Fotossensível</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="A.R." name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">A.R.</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Incolor" name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">Incolor</label>
            </div>
        </div>
        </div>
        <div class="row p-1 justify-content-center">
            <h4><strong>Observação</strong></h4>
            <textarea class="form-control" name="observacao" id="observacao" rows="3"></textarea>
        </div>
        <div class="row p-1 justify-content-center">
                 <input type="submit" class="btn btn-outline-success btn-sm col-3" id="cad-paciente-btn" value="Cadastrar" />
             </div>
        </div>
        </form>
        </div>  

@endsection
