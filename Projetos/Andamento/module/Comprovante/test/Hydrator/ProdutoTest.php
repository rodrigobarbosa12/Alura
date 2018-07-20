<?php

namespace ProdutosTest\Hydrator;

use Application\Service\TestCase;
use Produtos\Entity;
use Produtos\Hydrator;

class ProdutoTest extends TestCase
{

    private $extractArray = [
        'id' => 1,
        'empresasId' => 20,
        'nome' => 'Pão com mortadela',
        'descricao' => 'Excelente pão com mortadela',
        'preco' => 9.00,
        'ativo' => 1,
        'categoriasId' => 1,
        'complemento' => 0,
        'nomeCategoria' => 'Bebidas',
        'impressorasId' => 1,
        'nomeImpressora' => 'Cozinha',
    ];
    private $hydrateArray = [
        'id' => 1,
        'empresas_id' => 20,
        'nome' => 'Pão com mortadela',
        'descricao' => 'Excelente pão com mortadela',
        'preco' => 9.00,
        'ativo' => 1,
        'complemento' => 0,
        'categorias_id' => 1,
        'impressoras_id' => 1,
    ];

    public function testeExtract()
    {
        $hydrator = new Hydrator\Produto();

        $entity = new Entity\Produto($this->extractArray);
        $entity->setImagem(new Entity\Imagem($this->extractArray));

        $this->assertEquals($hydrator->extract($entity), $this->hydrateArray);
    }

    public function testeHydrate()
    {
        $this->extractArray['produtos_imagens.id'] = 10;
        $this->extractArray['produtos_imagens.url'] = 'url-teste.com.br';

        $this->extractArray['categorias.id'] = 30;
        $this->extractArray['categorias.ativo'] = 1;
        $this->extractArray['categorias.nome'] = 'apenas um teste';

        $this->extractArray['impressoras.id'] = 30;
        $this->extractArray['impressoras.ativo'] = 1;
        $this->extractArray['impressoras.nome'] = 'apenas um teste';

        $hydrator = new Hydrator\Produto();
        $hydrator->hydrate($this->extractArray, new Entity\Produto());
//
//        $imagem = new Entity\Imagem($this->extractArray);
//        $imagem->setId(10);
//        $imagem->setUrl('url-teste.com.br');
//        $imagem->setProdutosId(1);
//
//        $categoria = new \Categorias\Entity\Categoria();
//        $categoria->setId(30);
//        $categoria->setAtivo(1);
//        $categoria->setNome('apenas um teste');

        $esperado = new Entity\Produto($this->extractArray);
//        $esperado->setImagem($imagem);
//        $esperado->setCategoria($categoria);

        $this->assertEquals($esperado, new Entity\Produto($this->extractArray));
    }
}
