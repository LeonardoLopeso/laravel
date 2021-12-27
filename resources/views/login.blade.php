@extends('layouts.admin')

@section('title','Login')

@section('content')

    @if(session('warning'))
        <x-alert>
            {{session('warning')}}
        </x-alert>
    @endif
    <br>
    <form method="post">
        @csrf
        <input type="email" name="email" placeholder="Digite um email"><br>
        <input type="password" name="password" placeholder="Digite uma senha"><br>

        <input type="submit" value="Entrar">
    </form>

@endsection
