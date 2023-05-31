<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PacientController extends Controller
{
    public function create(){
        $locals = Local::all();
        return view('pacients.create-pacient', ['locals'=>$locals]);
    }   
}
