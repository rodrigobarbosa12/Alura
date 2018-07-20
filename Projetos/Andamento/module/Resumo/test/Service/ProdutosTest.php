<?php

namespace ProdutosTest\Service;

use Application\Entity\Count;
use Application\Service\TestCase;
use Categorias\Entity\Categoria;
use Impressoras\Entity\Impressora;
use Complementos\Entity\GrupoComplemento;
use Produtos\Hydrator\ProdutosComplementosGrupo as ProdutosComplementosGrupoHydrator;
use Produtos\Entity\ProdutosComplementosGrupo;
use Produtos\Entity\Pesquisa;
use Produtos\Entity\Imagem;
use Produtos\Entity\Produto;
use Produtos\Hydrator\Produto as ProdutoHydrator;
use Produtos\Exception\InvalidArgumentException;
use Produtos\Exception\RuntimeException;
use Zend\Db\Adapter\Driver\Pdo\Result;
use Zend\Db\Adapter\Exception\InvalidQueryException;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ClassMethods;

class ProdutosTest extends TestCase
{

    /**
     * @var \Produtos\Service\Produtos
     */
    protected $service;

    /**
     * @var \Produtos\Mapper\Produtos
     */
    protected $mapper;

    /**
     * @var \Produtos\Service\ProdutosComplementosGrupos
     */
    protected $gruposComplementos;

    /**
     * @var PHPUnit\Framework\MockObject\MockObject
     */
    protected $result;

    const POST = [
        'id' => 5,
        'nome' => 'Pão com Mortadela',
        'descricao' => 'Excelente Pão',
        'preco' => 4.2,
        'ativo' => 1,
        'empresasId' => 1003,
        'categoriasId' => 1,
        'impressorasId' => 10,
        'empresasId' => 1,
    ];

    public function setUp()
    {
        $this->mapper = $this->getMockBuilder(\Produtos\Mapper\Produtos::class)
                ->disableOriginalConstructor()
                ->setMethods([
                    'selecionar',
                    'selecionarPorId',
                    'contar',
                    'inserir',
                    'editar',
                    'desativarProduto',
                    'selecionarCardapio'
                ])
                ->getMock();

        $this->gruposComplementos = $this->getMockBuilder(\Produtos\Service\ProdutosComplementosGrupos::class)
                ->disableOriginalConstructor()
                ->setMethods([
                    'selecionarGruposPorProdutosId'
                ])
                ->getMock();

        $this->service = $this->getMockBuilder(\Produtos\Service\Produtos::class)
                ->setMethods(null)
                ->setConstructorArgs([
                    $this->mapper, $this->gruposComplementos
                ])
                ->getMock();

        $this->result = $this->getMockBuilder(Result::class)
                ->setMethods(['getGeneratedValue'])
                ->disableOriginalConstructor()
                ->getMock();
    }

    public function testeSelecionar()
    {
        $produtos = new HydratingResultSet(new ProdutoHydrator(), new Produto());
        $produtos->initialize(new \ArrayObject([
            [
                'id' => '2',
                'empresas_id' => '2',
                'categorias_id' => '10',
                'impressoras_id' => '10',
                'nome' => 'Produto de teste',
                'descricao' => 'Produto para uso de testes',
                'preco' => '10.0',
                'ativo' => '1',
                'produtos_imagens.id' => '1',
                'produtos_imagens.url' => 'http://imagens.com.br/2.jpg',
                'produtos_imagens.produtos_id' => '2',
                'categorias.id' => '10',
                'categorias.nome' => 'Combos',
                'categorias.ativo' => '1',
                'complemento' => '0',
                'impressoras.id' => '10',
                'impressoras.nome' => 'Cozinha',
                'impressoras.ativo' => '1',
                'produtos_promocoes.preco' => '2.99',
                'produtos_promocoes.ativo' => '1',
            ],
            [
                'id' => '3',
                'empresas_id' => '2',
                'categorias_id' => '6',
                'impressoras_id' => '10',
                'nome' => 'Fritas grandes',
                'descricao' => 'Fritas grandes para uso de testes',
                'preco' => '6.0',
                'ativo' => '1',
                'produtos_imagens.id' => '3',
                'produtos_imagens.url' => 'http://imagens.com.br/3.jpg',
                'produtos_imagens.produtos_id' => '3',
                'categorias.id' => '6',
                'categorias.nome' => 'Fritas',
                'categorias.ativo' => '1',
                'complemento' => '0',
                'impressoras.id' => '10',
                'impressoras.nome' => 'Cozinha',
                'impressoras.ativo' => '1',
                'produtos_promocoes.preco' => '5.00',
                'produtos_promocoes.ativo' => '0',
            ],
        ]));

        $this->mapper
            ->expects($this->once())
            ->method('selecionar')
            ->willReturn($produtos);

        $gruposComplemento = new HydratingResultSet(
            new ProdutosComplementosGrupoHydrator(),
            new ProdutosComplementosGrupo()
        );

        $gruposComplemento->initialize([
            [
                'id' => '101',
                'produtos_id' => '2',
                'ordem' => '0',
                'complementos_grupo.id' => '1',
                'complementos_grupo.nome' => 'Acompanhamento',
                'complementos_grupo.minimo' => '0',
                'complementos_grupo.maximo' => '1',
                'complementos_grupo.empresas_id' => '2',
                'categorias.id' => '2',
                'categorias.nome' => 'Acompanhamentos',
                'categorias.ativo' => '1',
            ],
            [
                'id' => '102',
                'produtos_id' => '2',
                'ordem' => '1',
                'complementos_grupo.id' => '2',
                'complementos_grupo.nome' => 'Refri',
                'complementos_grupo.minimo' => '1',
                'complementos_grupo.maximo' => '1',
                'complementos_grupo.empresas_id' => '2',
                'categorias.id' => '3',
                'categorias.nome' => 'Refris',
                'categorias.ativo' => '1',
            ],
        ]);

        $this->gruposComplementos
            ->expects($this->once())
            ->method('selecionarGruposPorProdutosId')
            ->willReturn($gruposComplemento);

        $real = $this->service->selecionar(new \Produtos\Entity\Pesquisa());

        $esperado = [
            new Produto([
                'id' => 2,
                'nome' => 'Produto de teste',
                'descricao' => 'Produto para uso de testes',
                'preco' => 2.99,
                'precoSemPromocao' => 10.0,
                'ativo' => 1,
                'complemento' => 0,
                'categoriasId' => 10,
                'impressorasId' => 10,
                'empresasId' => 2,
                'categoria' => new Categoria([
                    'id' => 10,
                    'nome' => 'Combos',
                    'ativo' => 1,
                    'empresasId' => 2,
                ]),
                'imagem' => new Imagem([
                    'id' => 1,
                    'url' => 'http://imagens.com.br/2.jpg',
                    'produtosId' => 2,
                ]),
                'gruposComplemento' => [
                    new GrupoComplemento([
                        'id' => 1,
                        'nome' => 'Acompanhamento',
                        'minimo' => 0,
                        'maximo' => 1,
                        'produtosComplementosGrupoId' => 101,
                        'empresasId' => 2,
                    ]),
                    new GrupoComplemento([
                        'id' => 2,
                        'nome' => 'Refri',
                        'minimo' => 1,
                        'maximo' => 1,
                        'produtosComplementosGrupoId' => 102,
                        'empresasId' => 2,
                    ]),
                ],
                'impressora' => new Impressora([
                    'id' => 10,
                    'nome' => 'Cozinha',
                    'ativo' => 1,
                    'empresasId' => 2,
                ]),
            ]),
            new Produto([
                'id' => 3,
                'nome' => 'Fritas grandes',
                'descricao' => 'Fritas grandes para uso de testes',
                'preco' => 6.0,
                'ativo' => 1,
                'complemento' => 0,
                'categoriasId' => 6,
                'impressorasId' => 10,
                'empresasId' => 2,
                'categoria' => new Categoria([
                    'id' => 6,
                    'nome' => 'Fritas',
                    'ativo' => 1,
                    'empresasId' => 2,
                ]),
                'imagem' => new Imagem([
                    'id' => 3,
                    'url' => 'http://imagens.com.br/3.jpg',
                    'produtosId' => 3,
                ]),
                'gruposComplemento' => [],
                'impressora' => new Impressora([
                    'id' => 10,
                    'nome' => 'Cozinha',
                    'ativo' => 1,
                    'empresasId' => 2,
                ]),
            ])
        ];

        $this->assertEquals($esperado, iterator_to_array($real));
    }

    public function testeSelecionarSemProdutos()
    {
        $produtos = new HydratingResultSet(new ProdutoHydrator(), new Produto());
        $produtos->initialize(new \ArrayObject());

        $this->mapper
            ->expects($this->once())
            ->method('selecionar')
            ->willReturn($produtos);

        $real = $this->service->selecionar(new \Produtos\Entity\Pesquisa());

        $esperado = [];

        $this->assertEquals($esperado, iterator_to_array($real));
    }

    public function testeSelecionarPorID()
    {
        $produtos = new HydratingResultSet(new ProdutoHydrator(), new Produto());
        $produtos->initialize([
            [
                'id' => '2',
                'empresas_id' => '2',
                'categorias_id' => '10',
                'impressoras_id' => '10',
                'nome' => 'Produto de teste',
                'descricao' => 'Produto para uso de testes',
                'preco' => '10.0',
                'ativo' => '1',
                'produtos_imagens.id' => '1',
                'produtos_imagens.url' => 'http://imagens.com.br/2.jpg',
                'produtos_imagens.produtos_id' => '2',
                'categorias.id' => '10',
                'categorias.nome' => 'Combos',
                'categorias.ativo' => '1',
                'categorias.empresas_id' => '2',
                'complemento' => '0',
                'impressoras.id' => '10',
                'impressoras.nome' => 'Cozinha',
                'impressoras.ativo' => '1',
                'impressoras.empresas_id' => '2',
                'produtos_promocoes.preco' => '5.00',
                'produtos_promocoes.ativo' => '1',
            ]
        ]);

        $this->mapper
            ->expects($this->once())
            ->method('selecionarPorId')
            ->willReturn($produtos);

        $gruposComplemento = new HydratingResultSet(
            new ProdutosComplementosGrupoHydrator(),
            new ProdutosComplementosGrupo()
        );

        $gruposComplemento->initialize(new \ArrayObject());

        $this->gruposComplementos
            ->expects($this->once())
            ->method('selecionarGruposPorProdutosId')
            ->willReturn($gruposComplemento);

        $real = $this->service->selecionarPorId(1, 1);
        $esperado = new Produto([
            'id' => 2,
            'nome' => 'Produto de teste',
            'descricao' => 'Produto para uso de testes',
            'preco' => 5.0,
            'precoSemPromocao' => 10.0,
            'ativo' => 1,
            'complemento' => 0,
            'categoriasId' => 10,
            'impressorasId' => 10,
            'empresasId' => 2,
            'categoria' => new Categoria([
                'id' => 10,
                'nome' => 'Combos',
                'ativo' => 1,
                'empresasId' => 2,
            ]),
            'imagem' => new Imagem([
                'id' => 1,
                'url' => 'http://imagens.com.br/2.jpg',
                'produtosId' => 2,
            ]),
            'gruposComplemento' => [],
            'impressora' => new Impressora([
                'id' => 10,
                'nome' => 'Cozinha',
                'ativo' => 1,
                'empresasId' => 2,
            ]),
        ]);

        $this->assertEquals($esperado, $real);
    }

    public function testeSelecionarPorIDComGruposComplemento()
    {
        $produtos = new HydratingResultSet(new ProdutoHydrator(), new Produto());
        $produtos->initialize(new \ArrayObject([
            [
                'id' => '2',
                'empresas_id' => '2',
                'categorias_id' => '10',
                'impressoras_id' => '10',
                'nome' => 'Produto de teste',
                'descricao' => 'Produto para uso de testes',
                'preco' => '5.0',
                'ativo' => '1',
                'produtos_imagens.id' => '1',
                'produtos_imagens.url' => 'http://imagens.com.br/2.jpg',
                'produtos_imagens.produtos_id' => '2',
                'categorias.id' => '10',
                'categorias.nome' => 'Combos',
                'categorias.ativo' => '1',
                'categorias.empresas_id' => '2',
                'complemento' => '0',
                'impressoras.id' => '10',
                'impressoras.nome' => 'Cozinha',
                'impressoras.ativo' => '1',
                'impressoras.empresas_id' => '2',
                'produtos_promocoes.preco' => '2.50',
                'produtos_promocoes.ativo' => '1',
            ]
        ]));

        $this->mapper
            ->expects($this->once())
            ->method('selecionarPorId')
            ->willReturn($produtos);

        $gruposComplemento = new HydratingResultSet(
            new ProdutosComplementosGrupoHydrator(),
            new ProdutosComplementosGrupo()
        );

        $gruposComplemento->initialize([
            [
                'id' => '101',
                'produtos_id' => '2',
                'ordem' => '0',
                'complementos_grupo.id' => '1',
                'complementos_grupo.nome' => 'Acompanhamento',
                'complementos_grupo.minimo' => '0',
                'complementos_grupo.maximo' => '1',
                'complementos_grupo.empresas_id' => '2',
                'categorias.id' => '2',
                'categorias.nome' => 'Acompanhamentos',
                'categorias.ativo' => '1',
            ],
            [
                'id' => '102',
                'produtos_id' => '2',
                'ordem' => '1',
                'complementos_grupo.id' => '2',
                'complementos_grupo.nome' => 'Refri',
                'complementos_grupo.minimo' => '1',
                'complementos_grupo.maximo' => '1',
                'complementos_grupo.empresas_id' => '2',
                'categorias.id' => '3',
                'categorias.nome' => 'Refris',
                'categorias.ativo' => '1',
            ],
        ]);

        $this->gruposComplementos
            ->expects($this->once())
            ->method('selecionarGruposPorProdutosId')
            ->willReturn($gruposComplemento);


        $real = $this->service->selecionarPorId(1, 1);
        $esperado = new Produto([
            'id' => 2,
            'nome' => 'Produto de teste',
            'descricao' => 'Produto para uso de testes',
            'preco' => 2.5,
            'precoSemPromocao' => 5.0,
            'ativo' => 1,
            'complemento' => 0,
            'categoriasId' => 10,
            'impressorasId' => 10,
            'empresasId' => 2,
            'categoria' => new Categoria([
                'id' => 10,
                'nome' => 'Combos',
                'ativo' => 1,
                'empresasId' => 2,
            ]),
            'imagem' => new Imagem([
                'id' => 1,
                'url' => 'http://imagens.com.br/2.jpg',
                'produtosId' => 2,
            ]),
            'gruposComplemento' => [
                new GrupoComplemento([
                    'id' => 1,
                    'nome' => 'Acompanhamento',
                    'minimo' => 0,
                    'maximo' => 1,
                    'produtosComplementosGrupoId' => 101,
                    'empresasId' => 2,
                ]),
                new GrupoComplemento([
                    'id' => 2,
                    'nome' => 'Refri',
                    'minimo' => 1,
                    'maximo' => 1,
                    'produtosComplementosGrupoId' => 102,
                    'empresasId' => 2,
                ]),
            ],
            'impressora' => new Impressora([
                'id' => 10,
                'nome' => 'Cozinha',
                'ativo' => 1,
                'empresasId' => 2,
            ]),
        ]);

        $this->assertEquals($esperado, $real);
    }

    public function testeSelecionarIdNaoExistente()
    {
        $result = new HydratingResultSet(new ClassMethods(), new Produto());
        $result->initialize(new \ArrayObject());

        $this->mapper
            ->expects($this->once())
            ->method('selecionarPorId')
            ->willReturn($result);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionCode(404);

        $this->service->selecionarPorId(50, 50);
    }

    public function testSelecionarCardapio()
    {
        $produtos = new HydratingResultSet(new ProdutoHydrator(), new Produto());
        $produtos->initialize(new \ArrayObject([
            [
                'id' => '2',
                'empresas_id' => '2',
                'categorias_id' => '10',
                'impressoras_id' => '10',
                'nome' => 'Produto de teste',
                'descricao' => 'Produto para uso de testes',
                'preco' => '10.0',
                'ativo' => '1',
                'produtos_imagens.id' => '1',
                'produtos_imagens.url' => 'http://imagens.com.br/2.jpg',
                'produtos_imagens.produtos_id' => '2',
                'categorias.id' => '10',
                'categorias.nome' => 'Combos',
                'categorias.ativo' => '1',
                'complemento' => '0',
                'impressoras.id' => '10',
                'impressoras.nome' => 'Cozinha',
                'impressoras.ativo' => '1',
                'produtos_promocoes.preco' => '7.50',
                'produtos_promocoes.ativo' => '1',
            ]
        ]));

        $this->mapper
            ->expects($this->once())
            ->method('selecionarCardapio')
            ->willReturn($produtos);

        $gruposComplemento = new HydratingResultSet(
            new ProdutosComplementosGrupoHydrator(),
            new ProdutosComplementosGrupo()
        );

        $gruposComplemento->initialize([
            [
                'id' => '101',
                'produtos_id' => '2',
                'ordem' => '0',
                'complementos_grupo.id' => '1',
                'complementos_grupo.nome' => 'Acompanhamento',
                'complementos_grupo.minimo' => '0',
                'complementos_grupo.maximo' => '1',
                'complementos_grupo.empresas_id' => '2',
                'categorias.id' => '2',
                'categorias.nome' => 'Acompanhamentos',
                'categorias.ativo' => '1',
            ],
            [
                'id' => '102',
                'produtos_id' => '2',
                'ordem' => '1',
                'complementos_grupo.id' => '2',
                'complementos_grupo.nome' => 'Refri',
                'complementos_grupo.minimo' => '1',
                'complementos_grupo.maximo' => '1',
                'complementos_grupo.empresas_id' => '2',
                'categorias.id' => '3',
                'categorias.nome' => 'Refris',
                'categorias.ativo' => '1',
            ],
        ]);
        $gruposComplemento->buffer();

        $this->gruposComplementos
            ->expects($this->once())
            ->method('selecionarGruposPorProdutosId')
            ->willReturn($gruposComplemento);

        $esperado = [
            new Produto([
                'id' => 2,
                'nome' => 'Produto de teste',
                'descricao' => 'Produto para uso de testes',
                'preco' => 7.5,
                'precoSemPromocao' => 10.0,
                'ativo' => 1,
                'complemento' => 0,
                'categoriasId' => 10,
                'impressorasId' => 10,
                'empresasId' => 2,
                'categoria' => new Categoria([
                    'id' => 10,
                    'nome' => 'Combos',
                    'ativo' => 1,
                    'empresasId' => 2,
                ]),
                'impressora' => new Impressora([
                    'id' => 10,
                    'nome' => 'Cozinha',
                    'ativo' => 1,
                    'empresasId' => 2,
                ]),
                'imagem' => new Imagem([
                    'id' => 1,
                    'url' => 'http://imagens.com.br/2.jpg',
                    'produtosId' => 2,
                ]),
                'gruposComplemento' => [
                    new GrupoComplemento([
                        'id' => 1,
                        'nome' => 'Acompanhamento',
                        'minimo' => 0,
                        'maximo' => 1,
                        'produtosComplementosGrupoId' => 101,
                        'empresasId' => 2,
                    ]),
                    new GrupoComplemento([
                        'id' => 2,
                        'nome' => 'Refri',
                        'minimo' => 1,
                        'maximo' => 1,
                        'produtosComplementosGrupoId' => 102,
                        'empresasId' => 2,
                    ]),
                ],
            ])
        ];

        $real = $this->service->selecionarCardapio(['empresasId' => 1]);

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

    public function testeCadastroValido()
    {
        $this->result
            ->expects($this->once())
            ->method('getGeneratedValue')
            ->willReturn(3);

        $this->mapper
            ->expects($this->once())
            ->method('inserir')
            ->willReturn($this->result);

        $resultado = $this->service->cadastrar(self::POST);

        $this->assertEquals($resultado, 3);
    }

    public function testeCadastroComErroNaQuery()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage('Cannot add or update a child row.');

        $invalidQueryException = new InvalidQueryException('Cannot add or update a child row.', 23000);

        $this->mapper
            ->expects($this->once())
            ->method('inserir')
            ->will($this->throwException($invalidQueryException));

        $this->service->cadastrar(self::POST);
    }

    public function testeCadastroComErroNosParametros()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);

        $this->service->cadastrar(['nome' => 'Pão com Mortadela', 'email' => 'leandro@gmail.com']);
    }

    public function testeAtualizandoRegistro()
    {
        $produtos = new HydratingResultSet(new ProdutoHydrator(), new Produto());
        $produtos->initialize([
            [
                'id' => '2',
                'empresas_id' => '2',
                'categorias_id' => '10',
                'impressoras_id' => '10',
                'nome' => 'Produto de teste',
                'descricao' => 'Produto para uso de testes',
                'preco' => '10.0',
                'ativo' => '1',
                'produtos_imagens.id' => '1',
                'produtos_imagens.url' => 'http://imagens.com.br/2.jpg',
                'produtos_imagens.produtos_id' => '2',
                'categorias.id' => '10',
                'categorias.nome' => 'Combos',
                'categorias.ativo' => '1',
                'complemento' => '0',
                'impressoras.id' => '10',
                'impressoras.nome' => 'Cozinha',
                'impressoras.ativo' => '1',
            ],
        ]);

        $this->mapper
            ->expects($this->once())
            ->method('selecionarPorId')
            ->willReturn($produtos);


        $gruposComplemento = new HydratingResultSet(
            new ProdutosComplementosGrupoHydrator(),
            new ProdutosComplementosGrupo()
        );

        $gruposComplemento->initialize(new \ArrayObject());

        $this->gruposComplementos
            ->expects($this->once())
            ->method('selecionarGruposPorProdutosId')
            ->willReturn($gruposComplemento);

        $this->mapper
            ->expects($this->once())
            ->method('editar')
            ->willReturn(true);

        $resultado = $this->service->atualizar([
            'id' => 2,
            'empresasId' => 1,
            'nome' => 'Pão com mortadela',
        ]);

        $this->assertEquals($resultado, 2);
    }

    public function testeAtualizandoComErroNaQuery()
    {
        $produtos = new HydratingResultSet(new ProdutoHydrator(), new Produto());
        $produtos->initialize([
            [
                'id' => '2',
                'empresas_id' => '2',
                'categorias_id' => '10',
                'impressoras_id' => '10',
                'nome' => 'Produto de teste',
                'descricao' => 'Produto para uso de testes',
                'preco' => '10.0',
                'ativo' => '1',
                'produtos_imagens.id' => '1',
                'produtos_imagens.url' => 'http://imagens.com.br/2.jpg',
                'produtos_imagens.produtos_id' => '2',
                'categorias.id' => '10',
                'categorias.nome' => 'Combos',
                'categorias.ativo' => '1',
                'complemento' => '0',
                'impressoras.id' => '10',
                'impressoras.nome' => 'Cozinha',
                'impressoras.ativo' => '1',
            ],
        ]);

        $this->mapper
            ->expects($this->once())
            ->method('selecionarPorId')
            ->willReturn($produtos);


        $gruposComplemento = new HydratingResultSet(
            new ProdutosComplementosGrupoHydrator(),
            new ProdutosComplementosGrupo()
        );

        $gruposComplemento->initialize(new \ArrayObject());

        $this->gruposComplementos
            ->expects($this->once())
            ->method('selecionarGruposPorProdutosId')
            ->willReturn($gruposComplemento);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage('Cannot add or update a child row.');

        $invalidQueryException = new InvalidQueryException('Cannot add or update a child row.', 23000);

        $this->mapper
            ->expects($this->once())
            ->method('editar')
            ->will($this->throwException($invalidQueryException));

        $this->service->atualizar([
            'nome' => 'Pão de queijo',
            'id' => 9,
            'empresasId' => 1,
        ]);
    }

    public function testeDeletandoRegistro()
    {
        $this->mapper
            ->expects($this->once())
            ->method('desativarProduto')
            ->willReturn(true);

        $resultado = $this->service->deletar(2);
        $this->assertEquals($resultado, 2);
    }

    public function testeDeletandoComErroNaQuery()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage('Cannot add or update a child row.');

        $invalidQueryException = new InvalidQueryException('Cannot add or update a child row.', 23000);

        $this->mapper
            ->expects($this->once())
            ->method('desativarProduto')
            ->will($this->throwException($invalidQueryException));

        $this->service->deletar(2);
    }
}
