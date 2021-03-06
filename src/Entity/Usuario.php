<?php
namespace Sistema\Ponto\Entity;
/**
 * @Entity
 * @Table(name="usuarios")
 */
class Usuario
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
    private $email;
    /**
     * @Column(type="string")
     */
    private $senha;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function senhaEstaCorreta(string $senhaPura): bool
    {
        return password_verify($senhaPura, $this->senha);
    }
}
