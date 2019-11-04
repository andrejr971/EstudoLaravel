@extends('layouts.principal')

@section('titulo', 'Departamentos')

@section('conteudo')
    
    <h1>Departamentos</h1>
    <ul>
        <li>Computadores</li>
        <li>Eletronicos</li>
        <li>Acessorios</li>
        <li>Roupas</li>
    </ul>

    @alerta(['titulo' => 'Erro Fatal', 'tipo' => 'info'])
        <p><strong>Erro Inesperado</strong></p>
        <p>Ocorreu um erro</p>
    @endalerta
    @alerta(['titulo' => 'Erro Fatal', 'tipo' => 'success'])
        <p><strong>Erro Inesperado</strong></p>
        <p>Ocorreu um erro</p>
    @endalerta
    @alerta(['titulo' => 'Erro Fatal', 'tipo' => 'error'])
        <p><strong>Erro Inesperado</strong></p>
        <p>Ocorreu um erro</p>
    @endalerta
    @alerta(['titulo' => 'Erro Fatal', 'tipo' => 'warning'])
        <p><strong>Erro Inesperado</strong></p>
        <p>Ocorreu um erro</p>
    @endalerta

@endsection