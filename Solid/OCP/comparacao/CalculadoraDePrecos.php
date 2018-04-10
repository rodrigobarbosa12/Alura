<?php
class CalculadoraDePrecos {
		private $tabela;
		private $entrega;

		public function __construct(TabelaDePreco $tabela, ServicoDeEntrega $frete) {
			$this->tabela = $tabela;
			$this->entrega = $frete;
		}

        public function calcula(Compra $produto) {
            
            $desconto = $this->tabela->descontoPara($produto->getValor());
            $frete = $this->entrega->para($produto->getCidade());

            return $produto->getValor() * (1-$desconto) + $frete;
        }

    }