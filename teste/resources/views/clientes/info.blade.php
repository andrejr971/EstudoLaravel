@extends('layouts.principal')

@section('titulo', 'Informação')

@section('conteudo')
    <h3>Info</h3>

    <p>ID: {{$cliente['id']}}</p>
    <p>Nome: {{$cliente['nome']}}</p>
    <br>

    <a href="{{route('clientes.index')}}">Voltar</a>
@endsection
