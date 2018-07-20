<?php

namespace Application\Entity;

class JsonToken extends AbstractEntity
{
    const NIVEL_ADMIN = 'A';
    const NIVEL_FUNCIONARIO = 'F';
    const NIVEL_CLIENTE = 'C';
    const NIVEL_MASTER = 'M';
    const NIVEL_SUPORTE = 'S';

    protected $empresa;
    protected $email;
    protected $senha;
    protected $nivel;
    protected $usuariosId;

    public function getUsuariosId()
    {
        return $this->usuariosId;
    }

    public function setUsuariosId($usuariosId)
    {
        $this->usuariosId = (int) $usuariosId;
    }

    public function getNivel()
    {
        return $this->nivel;
    }

    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    public function getEmpresa()
    {
        return $this->empresa;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setEmpresa(int $empresa = null)
    {
        $this->empresa = $empresa;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function isCliente()
    {
        return $this->nivel === self::NIVEL_CLIENTE;
    }
}
