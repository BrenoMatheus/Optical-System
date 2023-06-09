<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pacient;
use App\Models\Exame;
use App\Models\User;
use App\Models\Local;

class ExameController extends Controller
{
    
    public function create($id){
        $disabled = '1'; // constant defined to disable the buttons on the show-pacient page.
        $pacient = Pacient::findOrFail($id); // search for data of the patient who will be examined
        $local = Local::where('id', $pacient->local_id)->first();   // search for data of the local who will be examined
        $user = auth()->user();      
        return view('exame.create-exame',['pacient' => $pacient,'local' => $local, 'user'=> $user->name,'disabled' => $disabled]);
    }

public function store(Request $request){
    $exame = new Exame;
    $exame->doutor = $request->doutor;
    $exame->diagnostico = $request->diagnostico;
    $exame->indicacao = $request->indicacao;
    $exame->observacao = $request->observacao;
    $exame->data = $request->data;
    $exame->pacient_id = $request->pacient_id;
    $exame->local_id = $request->local;
     //    image upload
     if($request->hasfile('image_exame') && $request->file('image_exame')->isValid()){
        $requestImage = $request->image_exame;
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('img/exames'), $imageName);
        $exame->image_exame = $imageName;
    }else{$exame->image_exame ="exame.jpg";}
        $user = auth()->user();
        $exame->user_id = $user->id;
        $exame->save(); 
        return redirect('/exames')->with ('msg','Exame criado com sucesso!');
 }

 public function pesquisar(Request $request)
{
  $search = request('pesquisar');
  $dados = [];
  $dados['url'] = url('/');
  $dados['posts'] = DB::table('exames')
    ->join('pacients','exames.pacient_id','=','pacients.id')
    ->join('locals','exames.local_id','=','locals.id')
    ->where('pacients.nome', 'like', '%'.$search.'%')
    ->orWhere('exames.id', 'like', '%'.$search.'%')
    ->orWhere('locals.local', 'like', '%'.$search.'%')
    ->orderBy('exames.id','desc')
    // ->select('locals.local','pacients.nome','exames.*')
    ->get();
  return response()->json($dados);
}
public function show($id){
    $user = auth()->user();    
    $disabled = '1';
    $exame = Exame::findOrFail($id);
    $local = Local::findOrFail($exame->local_id);
    $pacient = Pacient::findOrFail($exame->pacient_id);
    $disabled_exame = '0';
    return view('exame.show-exame',['local' => $local,'exame' => $exame, 'pacient' => $pacient, 'disabled' => $disabled, 'disabled_exame' => $disabled_exame]);
}

public function dashboard(){    
    $exames = DB::table('exames')
    ->rightJoin('pacients','exames.pacient_id','=','pacients.id')
    ->join('locals','pacients.local_id','=','locals.id')
    ->orderBy('id','desc')
    ->select('locals.local','pacients.nome','pacients.id as id_pac','pacients.doencas','pacients.data as data_pac','exames.*')
    ->paginate(10);
    
    return view('exame.exames', ['exames' => $exames]);
}
}
