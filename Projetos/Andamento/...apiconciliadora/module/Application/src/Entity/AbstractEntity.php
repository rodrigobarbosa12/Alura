<?php

namespace Application\Entity;

use Application\Exception\InvalidArgumentException;

class AbstractEntity
{

    public function __construct($data = null)
    {
        if ($data) {
            $this->exchangeArray($data);
        }
    }

    public function exchangeArray($data)
    {
        if (!(is_array($data) || $data instanceof \Traversable)) {
            throw new \InvalidArgumentException('O parametro deve ser array ou Traversable');
        }

        foreach ($data as $atributo => $valor) {
            if (property_exists($this, $atributo)) {
                $this->{'set' . ucfirst($atributo)}($valor);
            }
        }
        return $this;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public function validarCadastro()
    {
        $array = $this->toArray();
        unset($array['id'], $array['etapa'], $array['logo'], $array['descricao'], $array['formaPagamento'], $array['usuario'], $array['imagem'], $array['nomeCategoria']);

        foreach ($array as $chave => $valor) {
            if (empty($valor) && !is_numeric($valor)) {
                throw new InvalidArgumentException("Faltou o parâmetro #$chave", 422);
            }
        }
    }

    public function validarAtualizacao()
    {
    }
}
