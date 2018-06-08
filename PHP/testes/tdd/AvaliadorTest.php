<?php 
require_once("Avaliador.php");
require_once("ConstrutorDeLeilao.php");


                          //Classe fala pro php que essa é uma classe de teste
class AvaliadorTest extends PHPUnit_Framework_TestCase{

        private $leiloeiro;

        public function setUp(){

            $this->leiloeiro = new Avaliador();

            var_dump("Inicializando teste!");
        }

    public function testDeveEntenderLancesEmOrdemCrescente()
    {
        $rodrigo = new Usuario("Rodrigo");
        $bruna = new Usuario("Bruna");
        $lucas = new Usuario("Lucas");
        $laura = new Usuario("Laura");

        $leilao = new Leilao("Ferrari");
        $leilao->propoe(new Lance($rodrigo, 40000));
        $leilao->propoe(new Lance($lucas, 39000));
        $leilao->propoe(new Lance($bruna, 35000));
        $leilao->propoe(new Lance($laura, 33000));

        $this->leiloeiro->avalia($leilao);
        // comparando a saida com o esperado
        $maiorEsperado = 40000;
        $menorEsperado = 33000;

        $this->assertEquals($maiorEsperado, $this->leiloeiro->getMaiorLance(), 0.0001);
        $this->assertEquals($menorEsperado, $this->leiloeiro->getMenorLance(), 0.0001);

    }

    public function testDeveEntenderLancesEmOrdemDecrescente()
    {

        $rodrigo = new Usuario("Rodrigo");
        $bruna = new Usuario("Bruna");
        $lucas = new Usuario("Lucas");
        $laura = new Usuario("Laura");

        $leilao = new Leilao("Playstation 3");
        $leilao->propoe(new Lance($laura, 195));
        $leilao->propoe(new Lance($bruna, 250));
        $leilao->propoe(new Lance($lucas, 798));
        $leilao->propoe(new Lance($rodrigo, 800));
        
        $this->leiloeiro->avalia($leilao);
        // comparando a saida com o esperado
        $maiorEsperado = 800;
        $menorEsperado = 195;

        $this->assertEquals($maiorEsperado, $this->leiloeiro->getMaiorLance(), 0.0001);
        $this->assertEquals($menorEsperado, $this->leiloeiro->getMenorLance(), 0.0001);
    }

    public function testAceitaLeilaoComUmLanca()
    {

        $rodrigo = new Usuario("Rodrigo");
        $bruna = new Usuario("Bruna");
        $lucas = new Usuario("Lucas");
        $laura = new Usuario("Laura");
        
        $leilao = new Leilao("Mobilete");
        $leilao->propoe(new Lance($rodrigo, 500));
        
        $this->leiloeiro->avalia($leilao);
        // comparando a saida com o esperado
        $maiorEsperado = 500;
        $menorEsperado = 500;
        
        $this->assertEquals($maiorEsperado, $this->leiloeiro->getMaiorLance(), 0.0001);
        $this->assertEquals($menorEsperado, $this->leiloeiro->getMenorLance(), 0.0001);
    }

    public function testDeveEntenderLancesEmOrdemRandomica()
    {
        $rodrigo = new Usuario("Rodrigo");
        $bruna = new Usuario("Bruna");
        $lucas = new Usuario("Lucas");
        $laura = new Usuario("Laura");

        $leilao = new Leilao("Quadro da Mona Lisa");
        $leilao->propoe(new Lance($laura, 1000000));
        $leilao->propoe(new Lance($bruna, 6000000));
        $leilao->propoe(new Lance($lucas, 9000000));
        $leilao->propoe(new Lance($rodrigo, 2000000));
        
        $this->leiloeiro->avalia($leilao);
        // comparando a saida com o esperado
        $maiorEsperado = 9000000;
        $menorEsperado = 1000000;

        $this->assertEquals($maiorEsperado, $this->leiloeiro->getMaiorLance(), 0.0001);
        $this->assertEquals($menorEsperado, $this->leiloeiro->getMenorLance(), 0.0001);
    }

    public function testCalculadorMedia()
    {
        $rodrigo = new Usuario("Rodrigo");
        $bruna = new Usuario("Bruna");
        $lucas = new Usuario("Lucas");

        $leilao = new Leilao("Computador");
        $leilao->propoe(new Lance($rodrigo, 400));
        $leilao->propoe(new Lance($bruna, 300));
        $leilao->propoe(new Lance($lucas, 500));

        $this->leiloeiro->avalia($leilao);
        // comparando a saida com o esperado
        $mediaEsperada = 400;
        $this->assertEquals($mediaEsperada, $this->leiloeiro->getMedia(), 0.0001);
    }

    public function testTresPrimeiros()
    {
        $rodrigo = new Usuario("Rodrigo");
        $sabrina = new Usuario("Sabrina");

        $construtor = new ConstrutorDeLeilao();
        $leilao = $construtor->para("Sapato velho")
        ->lance($rodrigo, 30)
        ->lance($sabrina, 50)
        ->lance($rodrigo, 70)
        ->lance($sabrina, 95)
        ->lance($rodrigo, 115)
        ->lance($sabrina, 125) 
        ->constroi();

        // $leilao->propoe(new Lance($rodrigo, 30));
        // $leilao->propoe(new Lance($sabrina, 50));
        // $leilao->propoe(new Lance($rodrigo, 70));
        // $leilao->propoe(new Lance($sabrina, 95));
        // $leilao->propoe(new Lance($rodrigo, 115));
        // $leilao->propoe(new Lance($sabrina, 125));

        $this->leiloeiro->avalia($leilao);
        $maiores = $this->leiloeiro->getTresMaiores();

        $this->assertEquals(3, count($maiores));
        $this->assertEquals(125, $maiores[0]->getValor(), 0.00001);
        $this->assertEquals(115, $maiores[1]->getValor(), 0.00001);
        $this->assertEquals(95, $maiores[2]->getValor(), 0.00001);
    }

    /**
     * @exepectedException Exception
     */
    public function testNaoDeveAvaliarLeilaoSemLance()
    {
        $rodrigo = new Usuario("Rodrigo");

        $criador = new ConstrutorDeLeilao();   
        $leilao = $criador->para("PS4")
        // ->lance($rodrigo,900)
        ->constroi();
        $this->leiloeiro->avalia($leilao);
    }

    /**
     * @exepectedEception InvalidArgumentException
     */
    public function testNAoDeveterValorMenorQue0()
    {
        $rodrigo = new Usuario("Rodrigo");

        $criador = new ConstrutorDeLeilao();
        $leilao = $criador->para("xbox One")
        // ->lance($rodrigo, 700)
        ->lance($rodrigo, 0)
        ->constroi();
        $this->leiloeiro->avalia($leilao);
    }
}
