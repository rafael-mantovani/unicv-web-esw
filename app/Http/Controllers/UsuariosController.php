<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'     => 'required|min:3',
            'email'    => 'email|unique:users',
            'password' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json(['mensagem' => 'Problemas encontrados.'], 422);
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ];

            Usuario::create($data);
            return response()->json(['mensagem' => 'Usuário cadastrado.'], 201);
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
        if (! $usuario = Usuario::find($id)) {
            return response()->json(['mensagem' => 'Usuário não encontrado'], 404);
        }

        return response()->json($usuario, 200);
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
        if (! $usuario = DB::table('users')->where('id', $id)->first()) {
            return response()->json(['mensagem' => 'Usuário não encontrado'], 404);
        }

        $validated = Validator::make($request->all(), [
            'name'     => 'required|min:3',
            'email'    => 'email',
            'password' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json(['mensagem' => 'Problemas encontrados.'], 422);
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ];

            DB::table('users')->where('id', $id)->update($data);
            return response()->json(['mensagem' => 'Usuário alterado.'], 200);
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
        if (! $usuario = DB::table('users')->where('id', $id)->first()) {
            return response()->json(['mensagem' => 'Usuário não encontrado'], 404);
        }

        DB::table('users')->where('id', $id)->delete();
        return response()->json(['mensagem' => 'Usuário excluído.'], 200);
    }
}
