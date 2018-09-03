<?php

namespace ResumoTest\Mapper;

use Application\Entity\Filtros;
use Application\Service\TestCase;
use Resumo\Entity\Resumo;
use Resumo\Entity\Pesquisa;
use Resumo\Hydrator;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql;
use Zend\Db\Adapter\Adapter;

class ResumoTest extends TestCase
{

    /**
     * @var \Resumo\Mapper\Resumo
     */
    private $mapper;

    protected function setUp()
    {
        $this->mapper = $this->getMockBuilder(\Resumo\Mapper\Resumo::class)
                ->setMethods(['select'])
                ->getMock();

        $this->mapper->setDbAdapter(new Adapter(['driver' => 'Pdo', 'dsn' => 'sqlite:./test.sql']));
        $this->mapper->setHydrator(new Hydrator\Resumo());
        $this->mapper->setEntityPrototype(new Resumo());
    }

    public function getSelect()
    {
        $select = new Sql\Select('detalhe_resumo');
        return $select
            ->join(
                'header',
                'detalhe_resumo.header_id = header.id',
            ['id']);
    }

    public function testeSelecionarGridDeResumo()
    {
        $select = $this->getSelect()->order('detalhe_resumo.id desc')->limit(10)->offset(0);
        $select->where->equalTo('detalhe_resumo.id', 1);

        $this->mapper->expects($this->once())->method('select')->with($select);

        $this->mapper->selecionar($pesquisa, 'mobile');
    }

    public function testeContarRegistros()
    {
        $result = new HydratingResultSet(new Hydrator\Resumo(), new Resumo());
        $result->initialize(new \ArrayObject());

        $select = $this->getSelect();
        $select->columns(['detalhe_resumo.id' => new Sql\Expression('1')]);

        $this->mapper
                ->expects($this->once())
                ->method('select')->with($select)->willReturn($result);

        $this->mapper->contar(new Pesquisa(['header_id' => 1,]));
    }


}
