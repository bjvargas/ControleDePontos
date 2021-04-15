<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Sistema Ponto</title>
    <style>
        <?php include 'formulario.css'; ?>
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<div class="col-4 m-auto">
<?php if (isset($_SESSION['mensagem'])): ?>
    <div class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>">
        <?= $_SESSION['mensagem']; ?>
    </div>
    <?php
        unset($_SESSION['mensagem']);
        unset($_SESSION['tipo_mensagem']);
    endif;
        ?>
    <body class="formulario">
        <div class="jumbotron">
            <h1>Login</h1>
        </div>
        <form action="/realiza-login" method="post">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control">
            </div>
            <button class="btn btn-primary">
                Entrar
            </button>
        </form>
</div>
</body>