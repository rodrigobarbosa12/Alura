<?php
	class ComandoPagar implements Comando{
		private $pedido;

		function __construct(Pedido $pedido) {
			$this->pedido = $pedido;
		}

		public function executa() {
			echo "<br />Pagando o pedido do cliente : ".$this->pedido->getCliente()."<br />";
			$this->pedido->pagar();
		}
	}