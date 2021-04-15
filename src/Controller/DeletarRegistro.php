<?php

namespace Sistema\Ponto\Controller;

use Sistema\Ponto\Entity\Registro;
use Sistema\Ponto\Infra\EntityManagerCreator;

class DeletarRegistro implements InterfaceControladorRequisicao
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function processaRequisicao(): void
    {

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /listar-registros');
            return;
        }

        $registro = $this->entityManager->getReference(Registro::class, $id);
        $this->entityManager->remove($registro);
        $this->entityManager->flush();
        header('Location: /listar-registros');
    }
}
