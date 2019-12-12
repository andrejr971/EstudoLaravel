<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-3">
        <div class="card text-center">
            <div class="card-header">
                <h1 class="card-title">Tabela Cliente</h1>
            </div>
            <div class="card-body">
                <h3 class="card-title" id="card_title">
                </h3>
                <table class="table table-sm table-responsive-sm" id="tabelaClientes">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <nav id="paginator">
                    <ul class="pagination">

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function getItemProximo(response) {
            i = response.current_page + 1;

            if(response.last_page == response.current_page) {
                s = '<li class="page-item disabled">';
            } else {
                s = '<li class="page-item">';
            }

            s += '<a class="page-link"  pagina="' + i + '" href="javascript:void(0)" aria-label="Próximo">' +
                        '<span aria-hidden="true">&raquo;</span>' +
                        '<span class="sr-only">Próximo</span>' +
                    '</a>' +
                '</li>';

            return s;
        }

        function getItemAnterior(response) {
            i = response.current_page - 1;

            if(1 == response.current_page) {
                s = '<li class="page-item disabled">';
            } else {
                s = '<li class="page-item">';
            }

            s += '<a class="page-link"  pagina="' + i + '" href="javascript:void(0)" aria-label="Anterior">' +
                        '<span aria-hidden="true">&laquo;</span>' +
                        '<span class="sr-only">Anterior</span>' +
                    '</a>' +
                '</li>';

            return s;
        }

        function getItem(response, i) {
            if(i == response.current_page) {
                s = '<li class="page-item active">';
            } else {
                s = '<li class="page-item">';
            }

            s += '<a class="page-link "  pagina="' + i + '" href="javascript:void(0)">' + i + '</a>' +
                '</li>';

            return s;
        }

        function renderPaginator(response) {
            $('#paginator>ul>li').remove();

            $('#paginator>ul').append(getItemAnterior(response));

            n = 10;
            if(response.current_page - n/2 <= 1) {
                inicio = 1;
            } else if(response.last_page - response.current_page < n) {
                inicio = response.last_page - n + 1;
            } else {
                inicio = response.current_page - n/2;
            }

            fim = inicio + n - 1;

            for(let i = inicio; i <= fim; i++) {
                s = getItem(response, i);

                $('#paginator>ul').append(s);
            }
            $('#paginator>ul').append(getItemProximo(response));
        }

        function renderLinha(cliente) {
            return '<tr>' +
                '<td>' + cliente.id + '</td>' +
                '<td>' + cliente.nome + '</td>' +
                '<td>' + cliente.sobrenome + '</td>' +
                '<td>' + cliente.email + '</td>' +
            '</tr>';
        }

        function renderTabela(response) {
            $('#tabelaClientes>tbody>tr').remove();

            for (let i = 0; i < response.length; i++) {
                s = renderLinha(response[i]);
                $('#tabelaClientes>tbody').append(s);
            }
        }

        function carregarClientes(page) {
            $.get('/json', {page : page}, function(response) {
                renderTabela(response.data);
                renderPaginator(response);

                $('#paginator>ul>li>a').click(function() {
                    carregarClientes($(this).attr('pagina'));
                });

                $('#card_title').html('Exibindo: ' + response.per_page + ' Clientes de ' + response.total + '( ' + response.from + ' - ' + response.to + ')');
            });
        }

        $(document).ready(function() {
            carregarClientes(1);
        });
    </script>
</body>
</html>
