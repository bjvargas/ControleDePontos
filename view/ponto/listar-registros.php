<?php 

if (!isset($_SESSION['logado']) && $caminho !=='/login'
 && $caminho !=='/realiza-login') {
    header('Location: /login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/listar-registros">Registros</a>
    <a class="navbar-brand"><span style="color: White;"> <?php echo $_SESSION['email']; ?></span></a>
    <a class="navbar-brand"><span style="color: White;"> Perfil: <?php echo $_SESSION['perfil']; ?> </span></a>
    
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
    <div class="container">
        <div class="jumbotron">
            <h1>Registros</h1>
        </div>
        <form action="/salvar-registro" method="POST" class="form-inline">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input class="form-control" type="text" id="justificativa" name="justificativa" placeholder="Justificativa">
                    </div>
                </div>
                <div class="form-group">
                    <label class="formulario">Data: </label>
                    <input class="form-control" type="date" id="data" name="data">
                </div>
                <div class="form-group">
                    <label class="formulario"> Hora Entrada: </label>
                    <input class="form-control" type="time" id="hora_inicial" name="hora_inicial">
                </div>
                <div class="form-group ">
                    <label class="formulario">Hora Saída: </label>
                    <input class="form-control" type="time" id="hora_final" name="hora_final">
                </div>
                <div class="col-auto my-1">
                    <button class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </form>
            <div class="col-12 m-auto">
                <table class="table text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Hora Entrada</th>
                            <th scope="col">Hora Saída</th>
                            <th scope="col">Total</th>
                            <th scope="col">Justificativa</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registros as $registro) : ?>

                            <tr>
                                <th scope="row"><?= $registro->getData(); ?></th>
                                <td><?= $registro->getHoraEntrada(); ?></td>
                                <td><?= $registro->getHoraSaida(); ?></td>
                                <td><?=$registro->calculaHoras();?></td>
                                <td><?= $registro->getJustificativa(); ?></td>

                                <td>
                                    <a href="/editar-registro?id=<?= $registro->getId(); ?>">
                                        <button class="btn btn-primary"> Editar </button>
                                    </a>

                                    <a href="/excluir-registro?id=<?= $registro->getId(); ?>">
                                        <button class="btn btn-danger"> Deletar </button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
    </div>
</body>

</html>