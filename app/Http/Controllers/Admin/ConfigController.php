<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request) {

        // $estado = $request->input('estado', 'RS');
        // $nome = $request->input('nome', 'Visitante');
        // $method = $request->method();

        // $dados = $request->only([ 'nome', 'idade' ]); // Pega apenas os campos declarados no array
        // // $dados = $request->except([ '_token' ]); // Pega todos os campos exceto o(os) informado(os) no array

        // print_r($dados);

        $nome = 'Leonardo';
        $idade = 90;
        $cidade = $request->input('cidade');

        $lista = [
            ['nome'=>'farinha', 'qt'=>'2'],
            ['nome'=>'ovo', 'qt'=>'4'],
            ['nome'=>'corante', 'qt'=>'1'],
            ['nome'=>'ingrediente especial', 'qt'=>'1'],
        ];

        $data = [
            'nome' => $nome,
            'idade' => $idade,
            'cidade' => $cidade,
            'lista' => $lista
        ];

        return view('admin.config', $data);
    }

    public function user() {
        echo "Página de config do usuário";
    }
}
