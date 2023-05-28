<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Local;

class LocalController extends Controller
{
    public function create(){
        return view('location.create-local');
    }   
    public function dashboard(){
        $locals = Local::paginate(10);
        return view('location.locals', ['locals' => $locals]);
    }
    public function store(Request $request){
        $local = new Local;
        
        $local->local = $request->local;
        $local->contato = $request->contato;
        $local->telefone = $request->telefone;
        $local->observacao = $request->observacao;
        
        $local->save(); 
        return redirect('/locals')->with ('msg','Local cadastrados com sucesso!');
     }
     public function pesquisar(Request $request)
     {
       $search = request('pesquisar');
       $dados = [];
       $dados['url'] = url('/');
       $dados['posts'] = DB::table('locals')
         ->select('locals.*')
         ->where('local', 'like', '%'.$search.'%')
         ->get();
       return response()->json($dados);
     }
     public function show($id){
        $local = Local::findOrFail($id);
        return view('location.show-local',['local' => $local]);
     }
      public function destroy($id){
        Local::findOrFail($id)->delete();
        return redirect('/locals')->with('msg', 'Local excluido com succeso!');
      }

      public function update(Request $request){
        $data = $request->all();
        Local::findOrFail($request->id)->update($data);
        return redirect('/locals')->with('msg', 'Cadastro do local editado com sucesso!');
    }
      public function edit($id){
        $local = Local::findOrFail($id);
        return view('location.edit-local', ['local' => $local]);
      }
}
