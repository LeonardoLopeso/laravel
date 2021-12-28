<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ConfigController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        // $estado = $request->input('estado', 'RS');
        // $nome = $request->input('nome', 'Visitante');
        // $method = $request->method();

        // $dados = $request->only([ 'nome', 'idade' ]); // Pega apenas os campos declarados no array
        // // $dados = $request->except([ '_token' ]); // Pega todos os campos exceto o(os) informado(os) no array

        // print_r($dados);


        // pegando o usuário logado
        // $user = Auth::user(); // pegando usuário logado com o Auth
        $user = $request->user();
        $nome = $user->name;

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
            'lista' => $lista,
            'showform' => Gate::allows('see-form')
        ];

        return view('admin.config', $data);
    }

    public function user() {
        echo "Página de config do usuário";
    }

    public function info() {
        echo "Config INFO 03";
    }

    public function permissoes() {
        echo "Configurações PERMISSÕES 03";
    }
}
