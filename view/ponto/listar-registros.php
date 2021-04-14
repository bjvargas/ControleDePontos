<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Listar Registros</h1>
    </div>
    <a href="formulario-registro-ponto" class="btn btn-primary m2">
    Novo Registro
    </a>
    <ul class="list-group">
        <?php foreach ($registros as $registro): ?>
            <li class="list-group-item">
                <?= $registro->getJustificativa(); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>