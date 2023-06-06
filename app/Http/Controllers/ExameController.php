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
}
