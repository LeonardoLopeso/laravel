<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class AuthController extends Controller
{
    public function create(Request $request) {
        $array = ['error' => ''];

        // Validando
        $rules = [
            'email' => 'required|email|unique:user,email',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            $array['error'] = $validator->messages();
            return $array;
        }

        $email = $request->input('email');
        $password = $request->input('password');

        // Cadastrando um novo usuário
        $newUser = new User();
        $newUser->email = $email;
        $newUser->password = password_hash($password, PASSWORD_DEFAULT);
        $newUser->token = '';
        $newUser->save();

        // Logar o usuário recém criado

        return $array;
    }
}
