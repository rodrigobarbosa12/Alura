<?php

namespace Resumo\Mapper;

use Application\Mapper\Where;
use Application\Entity\Filtros;
use Resumo\Entity\Pesquisa;
use Zend\Db\Sql;
use ZfcUser\Mapper\AbstractDbMapper;
use Resumo\Hydrator;

class Resumo extends AbstractDbMapper
{
    protected $tableName = 'detalhe_resumo';

    public function getSelect($tableName = null)
    {
        return parent::getSelect()
            ->join(
                'header',
                'detalhe_resumo.header_id = header.id',
               ['id']);
    }

    public function selecionar(Pesquisa $pesquisa)
    {
        $select = $this->getSelect();

        $pesquisa->aplicarSelect($select);

        return $this->select($select);
    }

    public function contar(Pesquisa $pesquisa): int
    {
        $select = $this->getSelect();
        $select->columns(['detalhe_resumo.id' => new Sql\Expression('1')]);

        $pesquisa->aplicarFiltro($select, 'detalhe_resumo');

        return $this->select($select)->count();
    }
}
