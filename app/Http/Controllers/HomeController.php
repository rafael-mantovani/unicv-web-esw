<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $nome = 'José da Silva';
        $idade = 55;
        $informacao = null;

        return view('home', [
            'nome' => $nome, 
            'idade' => $idade,
            'informacao' => $informacao
        ]);
    }

    public function users() {
        $users = [
            ['nome' => 'José da Silva', 'idade' => 68, 'cidade' => 'Maringá'],
            ['nome' => 'Ana Clara', 'idade' => 26, 'cidade' => 'Londrina'],
            ['nome' => 'Maria Soares', 'idade' => 55, 'cidade' => 'Curitiba']
        ];
        
        return view('users', ['users' => $users]);
    }

    public function usersDatabase() {
        $users = DB::table('usuarios')->get();

        return view('users-db', ['users' => $users]);
    }
}
