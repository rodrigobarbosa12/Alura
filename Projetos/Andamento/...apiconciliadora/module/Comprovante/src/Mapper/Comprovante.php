<?php

namespace Comprovante\Mapper;

use Application\Mapper\Where;
use Application\Entity\Filtros;
use Comprovante\Entity\Pesquisa;
use Zend\Db\Sql;
use ZfcUser\Mapper\AbstractDbMapper;
use Comprovante\Hydrator;

class Comprovante extends AbstractDbMapper
{
    protected $tableName = 'detalhe_comprovante';

    public function getSelect($tableName = null)
    {
        return parent::getSelect()
            ->join(
                'header',
                'detalhe_comprovante.header_id = header.id',
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
        $select->columns(['detalhe_comprovante.id' => new Sql\Expression('1')]);

        $pesquisa->aplicarFiltro($select, 'detalhe_comprovante');

        return $this->select($select)->count();
    }
}
