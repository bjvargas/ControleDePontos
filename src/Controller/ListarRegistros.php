<?php

namespace Sistema\Ponto\Controller;

use Sistema\Ponto\Infra\EntityManagerCreator;
use Sistema\Ponto\Entity\Registro;

class ListarRegistros implements InterfaceControladorRequisicao
{
    private $objRegistro;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->objRegistro = $entityManager
            ->getRepository(Registro::class);
    }


    public function processaRequisicao(): void
    {   

        if(!isset($_SESSION['perfil'])) {
            $_SESSION['perfil'] = $_POST['perfil'];
        }

        $registros = $this->objRegistro->findAll();
        require __DIR__ . '/../../view/ponto/listar-registros.php';
    }
}
