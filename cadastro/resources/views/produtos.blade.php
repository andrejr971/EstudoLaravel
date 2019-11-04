@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border w-100">
        <div class="card-body">
            <h5 class="title">Produtos</h5>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Qtd</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->preco }}</td>
                            <td>{{ $produto->estoque }}</td>
                                @foreach ($cats as $cat)
                                @if ($produto->categoria_id === $cat->id)
                                    <td>{{ $cat->nome }}</td>
                                @endif
                                @endforeach
                            <td>
                                <a href="/produtos/editar/{{ $produto->id }}" class="btn btn-primary">Editar</a>
                                <a href="/produtos/apagar/{{ $produto->id }}" class="btn btn-danger">Apagar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="/produtos/novo" class="btn btn-primary" role="button">Novo Produto</a>
        </div>
    </div>
@endsection