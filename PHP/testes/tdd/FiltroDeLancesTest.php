<?php 
require("FiltroDeLances.php");
require("Lance.php");
require("Leilao.php");
require("Usuario.php");

class FiltroDeLancesTest extends PHPUnit_Framework_TestCase
{
    public function testDeveSelecionarLancesEntre1000E3000()
    {
        $rodrigo = new Usuario("Rodrigo");

        // $leilao = new Leilao("Bala");
        $filtro = new FiltroDeLances();

        $lances[] = new Lance($rodrigo,2000);
        $lances[] = new Lance($rodrigo,1000);
        $lances[] = new Lance($rodrigo,3000);
        $lances[] = new Lance($rodrigo,800);

        $resultado = $filtro->filtra($lances);
        $this->assertEquals(1,count($resultado));
        $this->assertEquals(2000, $resultado[0]->getValor(), 0.00001);
    }


    public function testDeveSelecionarLancesEntre500E700()
    {
        $rodrigo = new Usuario("Rodrigo");

        $filtro = new FiltroDeLances();

        $lances[] = new Lance($rodrigo, 500);
        $lances[] = new Lance($rodrigo, 600);
        $lances[] = new Lance($rodrigo, 800);
        $lances[] = new Lance($rodrigo, 400);

        $resultado = $filtro->filtra($lances);
        $this->assertEquals(1, count($resultado));
        $this->assertEquals(600, $resultado[0]->getValor(), 0.00001);
    }


    public function testMaiorQue5000()
    {
        $rodrigo = new Usuario("Rodrigo");

        $filtro = new FiltroDeLances();

        $lances[] = new Lance($rodrigo, 4000);
        $lances[] = new Lance($rodrigo, 800);
        $lances[] = new Lance($rodrigo, 9000);
        $lances[] = new Lance($rodrigo, 3090);

        $resultado = $filtro->filtra($lances);
        $this->assertEquals(1, count($resultado));
        $this->assertEquals(9000, $resultado[0]->getValor(), 0.00001);
    }
}