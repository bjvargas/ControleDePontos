<?php

namespace Sistema\Ponto\Controller;

use Sistema\Ponto\Entity\Usuario;
use Sistema\Ponto\Infra\EntityManagerCreator;

class RealizarLogin implements InterfaceControladorRequisicao
{

    private $repositorioUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {

        $email = filter_input(INPUT_POST,
        'email',
        FILTER_VALIDATE_EMAIL
    );

    if (is_null($email) || $email === false) {
        echo "O e-mail digitado não é um e-mail válido";
        exit();
    }

    $senha = filter_input(INPUT_POST,
        'senha',
        FILTER_SANITIZE_STRING);

    /** @var  $usuario */
    $usuario = $this->repositorioUsuarios
        ->findOneBy(['email' => $email]);

    if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
        echo "E-mail ou senha inválidos";
        return;
    }

    $_SESSION['logado'] = true;

    header('Location: /listar-registros');

    }
}