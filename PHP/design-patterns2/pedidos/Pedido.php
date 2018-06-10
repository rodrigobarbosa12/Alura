<?php
	class Pedido {
		private $cliente;
		private $valor;
		private $status;
	    private $dataFinalizacao;

		function __construct($nomeCliente,$valor)
		{
			$this->cliente = $nomeCliente;
			$this->valor = $valor;
			$this->status = new Novo();
		}

		public function getCliente()
		{
			return $this->cliente;
		}
		public function getValor() 
	    {
	        return $this->valor;
	    }

	    public function getStatus() 
	    {
	        return $this->status;
	    }
		public function pagar()
		{
			$this->status = new Pago();
		}

		public function finalizar()
		{
			$this->dataFinalizacao = date("m/d/Y");
			$this->status = new Finalizado();
		}
	}