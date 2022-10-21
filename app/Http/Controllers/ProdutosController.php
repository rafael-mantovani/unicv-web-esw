<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $dados = DB::table('produtos')->get();

        return view('produtos.listar', ['produtos' => $dados]);
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
        ], [], ['descricao' => 'descrição', 'preco' => 'preço']);

        if ($validation->fails()) {
            return redirect('produtos/novo')->withErrors($validation)->withInput();
        } else {
            DB::table('produtos')->insert([
                'descricao'  => $request->descricao,
                'preco'      => $request->preco,
                'quantidade' => $request->quantidade
            ]);
            return redirect('/produtos')->with('mensagem', 'Produto cadastrado.');
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
        $produto = DB::table('produtos')->where('id', $id)->first();

        return view('produtos.detalhes', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = DB::table('produtos')->where('id', $id)->first();

        return view('produtos.editar', ['produto' => $produto]);
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
        $validation = Validator::make($request->all(), [
            'descricao'  => 'required|min:3|max:128',
            'preco'      => 'required|numeric|min:0',
            'quantidade' => 'required|numeric|min:0'
        ]);

        if ($validation->fails()) {
            return redirect('produtos/editar/'.$id)->withErrors($validation);
        } else {
            DB::table('produtos')->where('id', $id)->update([
                'descricao'  => $request->descricao,
                'preco'      => $request->preco,
                'quantidade' => $request->quantidade
            ]);
            return redirect('produtos')->with('mensagem', 'Alterado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('produtos')->where('id', $id)->delete();
        return redirect('produtos')->with('mensagem', 'Excluído com sucesso!');
    }
}
