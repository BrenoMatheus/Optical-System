<?php

namespace App\Http\Controllers;

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
}
