<?php


namespace Sistema\Ponto\Controller;


class SelecionarPerfil implements InterfaceControladorRequisicao
{

    public function processaRequisicao(): void
    {

        require __DIR__ . '/../../view/ponto/perfil.php';

    }
}