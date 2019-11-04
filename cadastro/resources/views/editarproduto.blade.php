@extends('layout.app', ['current' => 'produtos'])

@section('body')
    <div class="card border w-50">
        <div class="card-body">
            <form action="/produtos/{{ $produtos->id }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome da Produto</label>
                    <input type="text" class="w-100 form-control" value="{{ $produtos->nome }}" name="nomeProduto" id="nomeProduto" placeholder="Produto">
                </div>
                <div class="form-group">
                    <label for="qtd">Estoque</label>
                    <input type="number" class="w-100 form-control" value="{{ $produtos->estoque }}" name="estoque" id="qtd">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="w-100 form-control" value="{{ $produtos->preco }}" name="preco" id="preco">
                </div>
                <div class="form-group">
                        <label for="categorias">Categorias</label>
                        <select class="form-control" id="categorias" name="categorias">
                          @foreach ($cats as $cat)
                            @if ($produtos->categoria_id === $cat->id)
                                <option selected value="{{ $cat->id }}">{{ $cat->nome }}</option>
                            @else
                                <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>

@endsection