<?php


    class CalculadoraDePrecos {

        public function calcula(Compra $produto) {
            $tabela = new TabelaDePrecoPadrao();
            $correios = new Frete();

            $desconto = $tabela->descontoPara($produto->getValor());
            $frete = $correios->para($produto->getCidade());

            return $produto->getValor() * (1-$desconto) + $frete;
        }

    }

    

    