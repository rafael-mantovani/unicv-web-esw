<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = ['produtos' => [
                ['codigo' => '1', 'descricao' => 'Mouse Microsoft 2000', 'preco' => '125.90'],
                ['codigo' => '2', 'descricao' => 'Teclado Razer Cyclosa', 'preco' => '189.75'],
                ['codigo' => '3', 'descricao' => 'Headphone HyperX', 'preco' => '468.23'],
                ['codigo' => '4', 'descricao' => 'Mousepad Gamind Speed', 'preco' => '98.62']
            ]
        ];
        return view('produtos.listar', $dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'descricao'  => 'required|min:3|max:128',
            'preco'      => 'required|numeric|min:0',
            'quantidade' => 'required|numeric|min:0'
        ]);

        if ($validation->fails()) {
            return redirect('produtos/novo')->withErrors($validation)->withInput();
        } else {
            return redirect('/produtos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = [
            'codigo' => $id,
            'descricao' => 'Mouse Microsoft 2000',
            'preco' => '125.90',
            'quantidade' => 326
        ];

        return view('produtos.detalhes', $produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
