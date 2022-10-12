<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </head>
  <body class="p-5">
    <h1>Listagem de Produtos</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Descrição</th>
            <th>Opções</th>
        </tr>
    </thead>
        <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <td>{{ $produto['codigo'] }}</td>
                <td>{{ $produto['descricao'] }}</td>
                <td><a href="/produtos/{{ $produto['codigo'] }}" class="btn btn-info">Visualizar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
  </body>
</html>