@extends('layout.app', ["current" => "categorias"])

@section('body')
    <div class="card border w-100">
        <div class="card-body">
            <h5 class="title">Cadastro de Categorias</h5>
            @if (count($cat) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome da Categoria</th>
                            <th>Açoẽs</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cat as $cats)
                            <tr>
                                <td>{{ $cats->id }}</td>
                                <td>{{ $cats->nome }}</td>
                                <td>
                                    <a href="/categorias/editar/{{ $cats->id }}" class="btn btn-primary">Editar</a>
                                    <a href="/categorias/apagar/{{ $cats->id }}" class="btn btn-danger">Apagar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            @endif
        </div>
        <div class="card-footer">
            <a href="/categorias/novo" class="btn btn-primary" role="button">Nova Categoria</a>
        </div>
    </div>
@endsection