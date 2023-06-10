<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Local;
use App\Models\Pacient;
use App\Models\Exame;


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
    public function show($id){
        $pacient = Pacient::findOrFail($id);
        $exame = Exame::where('pacient_id', $pacient->id)->first(); 
        $local = Local::findOrFail($pacient->local_id);
        $user = auth()->user();
        //disable buttons for page reuse 
        $disabled = '0';
        $hasUserJoined = false;
        // verification if the patient has been examined
        if($exame != null){       
            $hasUserJoined = true;
        }
        return view('pacients.show-pacient',['exame' => $exame,'local' => $local, 'pacient' => $pacient, 'hasUserJoined' => $hasUserJoined,'disabled' => $disabled]);
    }
    public function pesquisar(Request $request)
    {
      $search = request('pesquisar');
      $dados = [];
      $dados['url'] = url('/');
      $dados['posts'] = DB::table('pacients')
        ->join('locals', 'pacients.local_id', '=', 'locals.id')
        ->select('locals.local','pacients.*')
        ->where('nome', 'like', '%'.$search.'%')
        ->orWhere('pacients.id', 'like', '%'.$search.'%')
        ->get();
      return response()->json($dados);
    }
}
