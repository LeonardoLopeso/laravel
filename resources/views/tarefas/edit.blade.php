@extends('layouts.admin')

@section('title', 'Edição de Tarefas')

@section('content')
    <h1>Edição</h1>

    {{-- @if(session('warning'))
        <x-alert>
            {{ session('warning') }}
        </x-alert>
    @endif --}}

    @if($errors->any())
        <x-alert>
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </x-alert>
    @endif

    <form method="post">
        @csrf

        <label>
            Título:<br/>
            <input type="text" name="titulo" value="{{ $data->titulo }}">
        </label>

        <input type="submit" value="Salvar">
    </form>

@endsection
