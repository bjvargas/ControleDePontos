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

<body class="formulario">
    <div class="container">
        <div class="jumbotron">
            <h1>Editando Registro</h1>
        </div>
        <?php if (isset($_SESSION['mensagem'])): ?>
    <div class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>">
        <?= $_SESSION['mensagem']; ?>
    </div>
    <?php
        unset($_SESSION['mensagem']);
        unset($_SESSION['tipo_mensagem']);
    endif;
        ?>
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



                        <?php
                        $id = filter_input(
                            INPUT_GET,
                            'id',
                            FILTER_VALIDATE_INT
                        );
                        $isId = false;

                        if ($id == $registro->getId()) { ?>
                            <form action="/salvar-registro?id=<?= $registro->getId(); ?>" method="POST" class="form-inline">
                                <tr>
                                    <th><input class="form-control" type="date" id="data" name="data" value="<?= $registro->getData(); ?>"></th>
                                    <td><input class="form-control" type="time" id="hora_inicial" name="hora_inicial" value="<?= $registro->getHoraEntrada(); ?>"></td>
                                    <td><input class="form-control" type="time" id="hora_final" name="hora_final" value="<?= $registro->getHoraSaida(); ?>"></td>
                                    <td>--</td>
                                    <td><input class="form-control" type="text" id="justificativa" name="justificativa" value="<?= $registro->getJustificativa(); ?>"></td>
                                    <td>
                                        <button class="btn btn-primary">Alterar</button>
                                    </td>
                                </tr>
                            </form>
                        <?php } else {  ?>
                            <tr>
                                <th><?= $registro->getData(); ?></th>
                                <td><?= $registro->getHoraEntrada(); ?></td>
                                <td><?= $registro->getHoraSaida(); ?></td>
                                <td><?= $registro->calculaHoras(); ?></td>
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
                        <?php }  ?>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</body>

</html>