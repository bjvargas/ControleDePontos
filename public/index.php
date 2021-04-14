<?php

require __DIR__ . '/../vendor/autoload.php';

use Sistema\Ponto\Controller\ListarRegistros;
use Sistema\Ponto\Controller\FormularioRegistros;


switch ($_SERVER['PATH_INFO']){
    case '/listar-registros' :
        $controlador = new ListarRegistros();
        $controlador->processaRequisicao();
        break;
    case '/formulario-registro-ponto' :
        $controlador = new FormularioRegistros();
        $controlador->processaRequisicao();
        break;        
}
