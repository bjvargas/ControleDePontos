<?php

namespace Sistema\Ponto\Controller;

use Sistema\Ponto\Entity\Registro;
use Sistema\Ponto\Infra\EntityManagerCreator;

class EditarRegistro implements InterfaceControladorRequisicao
{
    private $objRegistro;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->objRegistro = $entityManager
            ->getRepository(Registro::class);
    }


    public function processaRequisicao() :void
    {
        $registros = $this->objRegistro->findAll();
        
        require __DIR__ . '/../../view/ponto/editar-registro.php';

    }
   
}