<?php

namespace Sistema\Ponto\Controller;

class FormularioLogin implements InterfaceControladorRequisicao
{

    public function processaRequisicao() :void
    {
        require __DIR__ . '/../../view/ponto/login.php';

    }
}