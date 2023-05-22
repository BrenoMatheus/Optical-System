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
}
