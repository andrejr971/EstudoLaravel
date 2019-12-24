<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categorias</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nome }}</td>
                    <td>
                        <ul>
                            @foreach ($p->categorias as $c)
                                <li>{{ $c->nome }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
