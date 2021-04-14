<?php

namespace Sistema\Ponto\Controller;

class FormularioRegistros implements InterfaceControladorRequisicao
{

    public function processaRequisicao() :void
    {
        require __DIR__ . '/../../view/ponto/formulario-registro-ponto.php';

    }
}
