<?php
	class Compra {
		private $valor;
		private $cidade;

		public function __construct($valor,$cidade){
			$this->valor = $valor;
			$this->cidade = $cidade;
		}

		public function getValor(){
			return $this->valor;
		}

		public function getCidade(){
			return $this->cidade;
		}
	}