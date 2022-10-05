<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $nome = 'José da Silva';
        $idade = 68;
        $informacao = null;

        return view('home', [
            'nome' => $nome, 
            'idade' => $idade,
            'informacao' => $informacao
        ]);
    }
}
