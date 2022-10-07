<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{ $nome }}</h1>
    <p>{{ $idade }}</p>
    <h4>{{ $informacao ?? 'Em branco' }}</h4>

    @if($idade > 60)
    <h3>Idoso</h3>
    @else
    <h3>Adulto/Jovem</h3>
    @endif
</body>
</html>