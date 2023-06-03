<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Local;
use App\Models\Pacient;


class PacientController extends Controller
{
    public function create(){
        $locals = Local::all();
        return view('pacients.create-pacient', ['locals'=>$locals]);
    }   
    public function store(Request $request){
        $pacient = new Pacient;
        $pacient->nome = $request->nome;
        $pacient->data = $request->data;
        $pacient->telefone = $request->telefone;
        $pacient->local_id = $request->local;
        $pacient->endereco = $request->endereco;
        $pacient->observacao = $request->obs;
        $pacient->doencas = $request->doencas;
        $user = auth()->user();
        $pacient->user_id = $user->id;
        $pacient->save(); 
        return redirect('/pacientes')->with ('msg','paciente criado com sucesso!');
     }
     public function dashboard(){
        $user = auth()->user();
        $pacients = DB::table('pacients')
        ->join('locals', 'pacients.local_id', '=', 'locals.id')
        ->orderBy('id', 'DESC')
        ->select('locals.local','pacients.*') 
        ->paginate(12);
        // dd($pacients);
        $pacientsAsParticipant = $user->pacientsAsParticipant;
        return view('pacients.pacients', ['pacients' => $pacients, 'pacientsAsParticipant' => $pacientsAsParticipant]);
    }
    public function destroy($id){
        Pacient::findOrFail($id)->delete();
        return redirect('/pacientes')->with('msg', 'Paciente excluido com succeso!');
    }
    public function edit($id){
        $pacient = Pacient::findOrFail($id);
        $locals = Local::all();      
        return view('pacients.edit-pacient', ['pacient' => $pacient, 'locals'=>$locals]);
    }

    public function update(Request $request){
        $data = $request->all();
        Pacient::findOrFail($request->id)->update($data);
        return redirect('/pacientes')->with('msg', 'Cadastro do paciente editado com sucesso!');
    }
}
