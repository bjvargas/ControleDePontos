<?php

namespace Sistema\Ponto\Entity;

/**
 * @Entity
 * @Table(name="registros")
 */
class Registro
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $data;
    /**
     * @Column(type="string")
     */
    private $hora_entrada;
    /**
     * @Column(type="string")
     */
    private $hora_saida;
    /**
     * @Column(type="string")
     */
    private $justificativa;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getJustificativa(): string
    {
        return $this->justificativa;
    }

    public function setDescricao(string $justificativa): void
    {
        $this->justificativa = $justificativa;
    }

        public function getHoraEntrada(): string
    {
        return $this->hora_entrada;
    }

    public function setHoraEntrada(string $hora_entrada): void
    {
        $this->hora_entrada = $hora_entrada;
    }

    public function getHoraSaida(): string
    {
        return $this->hora_saida;
    }

    public function setHoraSaida(string $hora_saida): void
    {
        $this->hora_saida = $hora_saida;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): void
    {
        $this->data = $data;
    }

}
