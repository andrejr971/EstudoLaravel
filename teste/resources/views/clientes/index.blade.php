@extends('layouts.principal')

@section('titulo', 'index')

@section('conteudo')
    
<h1>{{ $titulo }}</h1>
<a href="{{ route('clientes.create')}}">Novo Cliente</a>
@if (count($clientes) > 0)
    <ul>
        @foreach ($clientes as $value)
            <li>
                {{$value['id']}} - {{$value['nome']}} | 
                <a href="{{ route('clientes.edit', $value['id'])}}">editar</a>
                <a href="{{ route('clientes.show', $value['id'])}}">Info</a> |
                <form action="{{ route('clientes.destroy', $value['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Excluir">
                </form>
            </li>
        @endforeach
    </ul>

    <hr>

    @for($i = 0; $i < 10; $i++)
        {{ $i }},
    @endfor
    <br>
    @for($i = 0; $i < count($clientes); $i++)
        {{ $clientes[$i]['nome'] }},
    @endfor
    <br>
    @foreach ($clientes as $item)
        <p>
            {{ $item['nome'] }}
            @if($loop->first)
                (primerio)
            @endif
            @if ($loop->last)
                (ult)
            @endif
            ({{ $loop->index }}) - {{ $loop->iteration }} | {{ $loop->count }} 

        </p>
    @endforeach
@else
    <h4>Não tem cliente</h4>
@endif

@endsection