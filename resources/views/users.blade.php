<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Nome</td>
            <td>Idade</td>
            <td>Cidade</td>
        </tr>
        @foreach($users as $item)
        <tr>
            <td>{{ $item['nome'] }}</td>
            <td>{{ $item['idade'] }}</td>
            <td>{{ $item['cidade'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>