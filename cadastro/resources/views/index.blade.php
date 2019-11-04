@extends('layout.app', ["current" => "home"])

@section('body')
    <div class="jumbotrom bg-light border-segundary">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cadastrar Produto</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="/produtos/novo" class="card-link">Cadastrar Produto</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cadastrar Categorias</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="/categorias/novo" class="card-link">Cadastrar Categorias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection