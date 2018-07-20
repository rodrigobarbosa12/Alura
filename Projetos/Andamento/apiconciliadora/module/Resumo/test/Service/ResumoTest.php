<?php

namespace ResumoTest\Service;

use Application\Entity\Count;
use Application\Service\TestCase;
use Resumo\Entity\Pesquisa;
use Resumo\Entity\Resumo;
use Resumo\Hydrator\Resumo as ResumoHydrator;
use Resumo\Exception\InvalidArgumentException;
use Resumo\Exception\RuntimeException;
use Zend\Db\Adapter\Driver\Pdo\Result;
use Zend\Db\Adapter\Exception\InvalidQueryException;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ClassMethods;

class ResumoTest extends TestCase
{

    /**
     * @var \Resumo\Service\Resumo
     */
    protected $service;

    /**
     * @var \Resumo\Mapper\Resumo
     */
    protected $mapper;

    /**
     * @var PHPUnit\Framework\MockObject\MockObject
     */
    protected $result;

    const POST = [
        'id' => '390',
        'tipo' => '1',
        'codigo_comercial' => '1047710797'
    ];

    public function setUp()
    {
        $this->mapper = $this->getMockBuilder(\Resumo\Mapper\Resumo::class)
                ->disableOriginalConstructor()
                ->setMethods([
                    'selecionar',
                    'contar',
                ])
                ->getMock();
    }

    public function testeSelecionar()
    {
        $resumo = new HydratingResultSet(new ResumoHydrator(), new Resumo());
        $resumo->initialize(new \ArrayObject([
            [
                'id' => '390',
                'tipo' => '1',
                'codigo_comercial' => '1047710797'
            ],
            [
                'id' => '391',
                'tipo' => '2',
                'codigo_comercial' => '1047710798'
            ],
        ]));

        $this->mapper
            ->expects($this->once())
            ->method('selecionar')
            ->willReturn($resumo);

        $real = $this->service->selecionar(new \Resumo\Entity\Pesquisa());

        $esperado = [
            new Resumo([
                'id' => '390',
                'tipo' => '1',
                'codigo_comercial' => '1047710797'
            ]),
            new Resumo([
                'id' => '391',
                'tipo' => '2',
                'codigo_comercial' => '1047710798'
            ])
        ];

        $this->assertEquals($esperado, iterator_to_array($real));
    }

    public function testeSelecionarSemResumo()
    {
        $resumo = new HydratingResultSet(new ResumoHydrator(), new Resumo());
        $resumo->initialize(new \ArrayObject());

        $this->mapper
            ->expects($this->once())
            ->method('selecionar')
            ->willReturn($resumo);

        $real = $this->service->selecionar(new \Resumo\Entity\Pesquisa());

        $esperado = [];

        $this->assertEquals($esperado, iterator_to_array($real));
    }


    public function testeCount()
    {
        $esperado = new Count();
        $esperado->setTotalRegistros(50);
        $esperado->setPagina(1);
        $esperado->setQuantidadePaginas(5);

        $this->mapper
            ->expects($this->once())
            ->method('contar')
            ->with(new Pesquisa())
            ->willReturn(50);

        $this->assertEquals($this->service->contar(new Pesquisa()), $esperado);
    }

}
