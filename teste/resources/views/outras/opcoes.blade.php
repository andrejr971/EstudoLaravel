@extends('layouts.principal')

@section('titulo', 'Opções')

@section('conteudo')
    <div class="options">
        <ul>
            <li><a class="warning {{ request()->routeIs('opcoes.*') ? 'selected' : '' }}"         href="{{ route('opcoes', 1) }}">warning</a></li>
            <li><a class="info {{ request()->routeIs('opcoes.2') ? 'selected' : '' }}"             href="{{ route('opcoes', 2) }}">info</a></li>
            <li><a class="success {{ request()->routeIs('opcoes.3') ? 'selected' : '' }}"          href="{{ route('opcoes', 3) }}">success</a></li>
            <li><a class="error {{ request()->routeIs('opcoes.4') ? 'selected' : '' }}"            href="{{ route('opcoes', 4) }}">error</a></li>
        </ul>
    </div>

    @if (isset($opcao))
        @switch($opcao)
            @case(1)
                @alerta(['titulo' => 'Erro Fatal', 'tipo' => 'warning'])
                <p><strong>warning</strong></p>
                <p>Ocorreu um erro</p>
                @endalerta
                
                @break
            @case(2)
                @alerta(['titulo' => 'Erro Fatal', 'tipo' => 'info'])
                <p><strong>info</strong></p>
                <p>Ocorreu um erro</p>
                @endalerta

                @break
            @case(3)
                @alerta(['titulo' => 'Erro Fatal', 'tipo' => 'success'])
                <p><strong>success</strong></p>
                <p>Ocorreu um erro</p>
                @endalerta
                
                @break
            @case(4)
                @alerta(['titulo' => 'Erro Fatal', 'tipo' => 'error'])
                <p><strong>error</strong></p>
                <p>Ocorreu um erro</p>
                @endalerta
                
                @break
        @endswitch
    @endif

@endsection




