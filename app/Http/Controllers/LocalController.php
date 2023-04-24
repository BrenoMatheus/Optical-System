<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function create(){
        return view('local.create-local');
    }   
}
