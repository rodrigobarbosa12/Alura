<?php

namespace Comprovante\Entity;

class Pesquisa extends \Application\Entity\Pesquisa
{
    public function __construct($array = null)
    {
        $this->ordenacao = 'detalhe_comprovante.id desc';
        $this->quantidade = 10;
        $this->pagina = 0;
        if ($array) {
            parent::__construct($array);
        }
    }
}
