<?php

    class LeilaoTest
    {
        public function testDeveReceberUmLance()
        {
            $leilao = new Leilao("Macbook Pro");
            $this->assertEquals(0, count($leilao->getLances()));

            $leilao->propoe(new Lance(new Usuario("Rodrigo", 4000)));

            $this->assertEquals(1, count($leilao->getLances()));
            $this->assertEquals(4000, $leilao->getLances()[0]->getValor(), 0.00001);
        }
    }

