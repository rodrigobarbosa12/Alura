<?php
	class ComandoFinalizar implements Comando{
		private $pedido;

		function __construct(Pedido $pedido) {
			$this->pedido = $pedido;
		}

		public function executa() {
			echo "<br />Finalizando o pedido do cliente : ".$this->pedido->getCliente()."<br />";
			$this->pedido->finalizar();
		}
	}