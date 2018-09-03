<?php

namespace Resumo\Service;

use Application\Exception\InvalidArgumentException;
use Application\Service\SqlState;
use Application\Entity\Count;
use Application\Entity\Filtros;
use Resumo\Mapper\Resumo as MapperResumo;
use Resumo\Entity\ Resumo as EntityResumo;
use Resumo\Entity\Pesquisa;
use Resumo\Exception;
use Zend\Db\Adapter\Exception\InvalidQueryException;
use Zend\Db\ResultSet\HydratingResultSet;

class Resumo
{

    /**
     * @var MapperResumo
     */
    private $mapper;

    public function __construct(MapperResumo $mapper)
    {
        $this->mapper = $mapper;
    }

    public function selecionar(Pesquisa $pesquisa)
    {
        $resumo = $this->mapper->selecionar($pesquisa);
        return $resumo;
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
