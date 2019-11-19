@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border w-100">
        <div class="card-body">
            <h5 class="title">Produtos</h5>
            <table id="tableProdutos" class="table table-bordered table-hover">
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
                <tbody >
                    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" role="button" onclick="novoProduto()" data-toggle="modal" data-target="#dlgProduto">Novo Produto</button>
        </div>
    </div>

    <div class="modal fade" id="dlgProduto" tabindex="-1" role="dialog" aria-labelledby="dlgProduto" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="nomeProd" class="control-label">Nome</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeProd">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label for="preco" class="control-label">Preco</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="preco">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label for="qtd" class="control-label">Qtd</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="qtd">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label for="cat" class="control-label">Categoria</label>
                            <div class="input-group">
                                <select class="form-control" name="cat" id="cat">

                                </select>
                            </div>                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" role="button">Salvar</button>
                        <button class="btn btn-danger" role="button" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function novoProduto() {
            $('#nomeProd').val('');
            $('#preco').val('');
            $('#qtd').val('');
        }

        function carregarCategorias() {
            $.getJSON('/api/categorias', function(data) {
                for(let i = 0; i < data.length; i++) {
                    opcao = '<option value ="' + data[i].id +'"> ' + data[i].nome + '</option>';
                    $('#cat').append(opcao);
                }
            });
        }


        function montarLinha(p) {
            var linha = "<tr>" +
                "<td>" + p.id + "</td>" +
                "<td>" + p.nome + "</td>" +
                "<td>" + p.estoque + "</td>" +
                "<td>" + p.preco + "</td>" +
                "<td>" + p.categoria_id + "</td>" +
                "<td>" +
                '<button class="btn btn-primary" onclick="editar(' + p.id + ')"> Editar </button> ' +
                '<button class="btn btn-danger" onclick="remover(' + p.id + ')"> Apagar </button> ' +
                "</td>" +
                "</tr>";
                return linha;
        }
        
        function remover(id) {
            $.ajax({
                type: 'DELETE',
                url: '/api/produtos/' + id,
                context: this,
                success: function() {
                    linhas = $('#tableProdutos>tbody>tr');

                    e = linhas.filter( function(indice, elemento) {
                        return elemento.cells[0].textContent == id; 
                    });
                    if(e) {
                        e.remove();
                    }
                },
                error: function() {
                    console.log(error);
                }
            });
        }

        function carregarProdutos() {
            $.getJSON('/api/produtos', function(produtos) {
                for (let i = 0; i < produtos.length; i++) {
                    linha = montarLinha(produtos[i]);
                    
                    $('#tableProdutos>tbody').append(linha);
                }
            });
        }

        function criarProduto() {
            prod = { 
                nomeProduto : $('#nomeProd').val(),
                preco : $('#preco').val(),
                estoque : $('#qtd').val(),
                categorias : $('#cat').val()
            }

            $.post('/api/produtos', prod, function(data) {
                produto = JSON.parse(data);
                linha = montarLinha(produto);
                    
                $('#tableProdutos>tbody').append(linha);
            });
        }

        $('#formProduto').submit(function(event) {
            event.preventDefault();
            criarProduto();
        });

        $(function() {
            carregarCategorias();
            carregarProdutos();
        })
    </script>
@endsection