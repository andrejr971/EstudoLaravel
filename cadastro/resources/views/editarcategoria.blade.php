@extends('layout.app', ["current" => "categorias"])

@section('body')
    <div class="card border w-50">
        <div class="card-body">
            <form action="/categorias/{{ $cat->id }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria</label>
                    <input type="text" class="w-100 form-control" value="{{ $cat->nome }}" name="nomeCategoria" id="nomeCategoria">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
    
@endsection