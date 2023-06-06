<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
