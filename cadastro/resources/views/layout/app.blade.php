<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add Token !-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Cadastro de produtos</title>
</head>
<body>
    @component('componente_navbar', ["current" => $current])
        
    @endcomponent
    
    <div class="container mt-2">
        <main class="row">
            <!-- verifica se há a seção body !-->
            @hasSection ('body')
                @yield('body')
            @endif
        </main>
        
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>