<?php

namespace ComprovanteTest\Mapper;

use Application\Entity\Filtros;
use Application\Service\TestCase;
use Comprovante\Entity\Comprovante;
use Comprovante\Entity\Pesquisa;
use Comprovante\Hydrator;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql;
use Zend\Db\Adapter\Adapter;

class ComprovanteTest extends TestCase
{

    /**
     * @var \Comprovante\Mapper\Comprovante
     */
    private $mapper;

    protected function setUp()
    {
        $this->mapper = $this->getMockBuilder(\Comprovante\Mapper\Comprovante::class)
                ->setMethods(['select'])
                ->getMock();

        $this->mapper->setDbAdapter(new Adapter(['driver' => 'Pdo', 'dsn' => 'sqlite:./test.sql']));
        $this->mapper->setHydrator(new Hydrator\Comprovante());
        $this->mapper->setEntityPrototype(new Comprovante());
    }

    public function getSelect()
    {
        $select = new Sql\Select('detalhe_comprovante');
        return $select
            ->join(
                'header',
                'detalhe_comprovante.header_id = header.id',
            ['id']);
    }

    public function testeSelecionarGridDeComprovante()
    {
        $select = $this->getSelect()->order('detalhe_comprovante.id desc')->limit(10)->offset(0);
        $select->where->equalTo('detalhe_comprovante.id', 1);

        $this->mapper->expects($this->once())->method('select')->with($select);

        $this->mapper->selecionar($pesquisa, 'mobile');
    }

    public function testeContarRegistros()
    {
        $result = new HydratingResultSet(new Hydrator\Comprovante(), new Comprovante());
        $result->initialize(new \ArrayObject());

        $select = $this->getSelect();
        $select->columns(['detalhe_comprovante.id' => new Sql\Expression('1')]);

        $this->mapper
                ->expects($this->once())
                ->method('select')->with($select)->willReturn($result);

        $this->mapper->contar(new Pesquisa(['header_id' => 1,]));
    }


}
