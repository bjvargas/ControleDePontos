<?php

namespace Sistema\Ponto\Controller;

use Sistema\Ponto\Entity\Registro;
use Sistema\Ponto\Infra\EntityManagerCreator;

class SalvarRegistro implements InterfaceControladorRequisicao
{

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $justificativa = filter_input(INPUT_POST, 'justificativa');
        $registro = new Registro();
        $registro->setJustificativa($justificativa);
        $registro->setData($_POST['data']);
        $registro->setHoraEntrada($_POST['hora_inicial']);
        $registro->setHoraSaida($_POST['hora_final']);

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (!is_null($id) && $id !== false) {
            $registro->setId($id);
            $_SESSION['mensagem']= 'Registro atualizado com sucesso';
            $this->entityManager->merge($registro);
        } else {
            $_SESSION['mensagem']= 'Registro iserido com sucesso';
            $this->entityManager->persist($registro);
        }
        $_SESSION['tipo_mensagem'] = 'success';
        $this->entityManager->flush();
        header('Location: /listar-registros');
    }
}
