@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')
    <h1>Configurações</h1>

    Olá, {{$nome}} - <a href="/logout">Sair</a>

    {{-- Meu nome é: {{ $nome }}. Eu tenho {{ $idade }} anos.<br/> --}}

    {{-- forma do laravel 6 --}}
    {{-- @alert
        Alguma coisa aquii
    @endalert --}}

    {{-- forma do laravel 7+ --}}
    <x-alert>
        Alguma frase qualquer
    </x-alert>

    {{-- Versão: {{ $versao }} --}}

    {{-- if, ifelse, isset, empty --}}
    {{-- @if($idade > 18 && $idade <= 60)
        Eu sou um adulto
    @elseif($idade > 60 && $idade <= 120)
        Eu sou um idoso.
    @else
        Eu sou MENOR de idade.
    @endif

    @isset($versao)
        Existe uma versão e é a {{$versao}}
    @endisset

    @empty($cidade)
        Não existe uma cidade.
    @endempty --}}

    {{-- loops --}}

    <ul>
        @forelse($lista as $item)
            <li>{{$item['nome']}} - {{$item['qt']}}</li>
        @empty
            Não há ingredientes.
        @endforelse
    </ul>

    @if($showform)
    <form method="POST">
        @csrf

        Nome:<br>
        <input type="text" name="nome" /><br>

        Idade:<br>
        <input type="text" name="idade" /><br>

        Cidade:<br>
        <input type="text" name="cidade" /><br>

        <input type="submit" value="Enviar" />
    </form>
    @endif

    <a href="/config/info">Informações</a>
@endsection
