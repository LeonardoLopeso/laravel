@extends('layouts.admin')

@section('title','Login')

@section('content')

    @if(session('warning'))
        <x-alert>
            {{session('warning')}}
        </x-alert>
    @endif

    @lang('messages.test')

    <br>
    <form method="post">
        @csrf
        <input type="email" name="email" placeholder="Digite um email"><br>
        <input type="password" name="password" placeholder="Digite uma senha"><br>

        @if($tries >= 3)
            {{__('messages.tryerror', ['count'=>3])}}
            {{-- @lang('messages.tryerror', ['count'=>3]) --}}
        @else
            <input type="submit" value="Entrar">
        @endif
    </form>

    Tentativas: {{ $tries }}

@endsection
