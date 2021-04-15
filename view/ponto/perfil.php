<?php

if (
    !isset($_SESSION['logado']) && $caminho !== '/login'
    && $caminho !== '/realiza-login'
) {
    header('Location: /login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/listar-registros">Registros</a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/logout">Sair</a>
        </li>
    </ul>

</nav>

<head>
    <meta charset="UTF-8">
    <title>Sistema Ponto</title>
    <style>
        <?php include 'formulario.css'; ?>
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="formulario">
    <div class="container">
        <div class="jumbotron">
            <h1>Selecione Perfil</h1>
        </div>

        <form method="post" action="/listar-registros">
               <div class="form-group">
                    <select class="form-control" name="perfil" id="perfil" required>
                        <option value="Professor">Professor</option>
                        <option value="Cordenador">Cordenador</option>
                    </select>
                </div><br>
                <input type="submit" value="Entrar" class="btn btn-primary">
        </form>