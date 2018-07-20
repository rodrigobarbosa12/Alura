<?php

namespace Comprovante\Service;

use Application\Exception\InvalidArgumentException;
use Application\Service\SqlState;
use Application\Entity\Count;
use Application\Entity\Filtros;
use Comprovante\Mapper\Comprovante as MapperComprovante;
use Comprovante\Entity\ Comprovante as EntityComprovante;
use Comprovante\Entity\Pesquisa;
use Comprovante\Exception;
use Zend\Db\Adapter\Exception\InvalidQueryException;
use Zend\Db\ResultSet\HydratingResultSet;

class Comprovante
{

    /**
     * @var MapperComprovante
     */
    private $mapper;

    public function __construct(MapperComprovante $mapper)
    {
        $this->mapper = $mapper;
    }

    public function selecionar(Pesquisa $pesquisa)
    {
        $comprovante = $this->mapper->selecionar($pesquisa);
        return $comprovante;
    }

    public function contar(Pesquisa $pesquisa)
    {
        $totalRegistros = $this->mapper->contar($pesquisa);

        $count = new Count();
        $count->setPagina($pesquisa->getPagina() + 1);
        $count->setTotalRegistros($totalRegistros);
        $count->calcularQuantidadePaginas($pesquisa->getQuantidade() ?: 10);

        return $count;
    }

}
