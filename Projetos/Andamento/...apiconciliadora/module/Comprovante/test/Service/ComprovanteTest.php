<?php

namespace ComprovanteTest\Service;

use Application\Entity\Count;
use Application\Service\TestCase;
use Comprovante\Entity\Pesquisa;
use Comprovante\Entity\Comprovante;
use Comprovante\Hydrator\Comprovante as ComprovanteHydrator;
use Comprovante\Exception\InvalidArgumentException;
use Comprovante\Exception\RuntimeException;
use Zend\Db\Adapter\Driver\Pdo\Result;
use Zend\Db\Adapter\Exception\InvalidQueryException;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ClassMethods;

class ComprovanteTest extends TestCase
{

    /**
     * @var \Comprovante\Service\Comprovante
     */
    protected $service;

    /**
     * @var \Comprovante\Mapper\Comprovante
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
        $this->mapper = $this->getMockBuilder(\Comprovante\Mapper\Comprovante::class)
                ->disableOriginalConstructor()
                ->setMethods([
                    'selecionar',
                    'contar',
                ])
                ->getMock();
    }

    public function testeSelecionar()
    {
        $comprovante = new HydratingResultSet(new ComprovanteHydrator(), new Comprovante());
        $comprovante->initialize(new \ArrayObject([
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
            ->willReturn($comprovante);

        $real = $this->service->selecionar(new \Comprovante\Entity\Pesquisa());

        $esperado = [
            new Comprovante([
                'id' => '390',
                'tipo' => '1',
                'codigo_comercial' => '1047710797'
            ]),
            new Comprovante([
                'id' => '391',
                'tipo' => '2',
                'codigo_comercial' => '1047710798'
            ])
        ];

        $this->assertEquals($esperado, iterator_to_array($real));
    }

    public function testeSelecionarSemComprovante()
    {
        $comprovante = new HydratingResultSet(new ComprovanteHydrator(), new Comprovante());
        $comprovante->initialize(new \ArrayObject());

        $this->mapper
            ->expects($this->once())
            ->method('selecionar')
            ->willReturn($comprovante);

        $real = $this->service->selecionar(new \Comprovante\Entity\Pesquisa());

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
