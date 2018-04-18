<?php
	class Lance {
		private $usuario;
		private $valor;
		
		function __construct(Usuario $usuario,$valor) {
			if($valor <= 0)
			throw new InvalidArgumentException("O valor nao pode ser zero! ");

			$this->usuario = $usuario;
			$this->valor = $valor;
		}

		
		
		public function getUsuario() {
			return $this->usuario;
		}
		
		public function getValor() {
			return $this->valor;
		}
	}
?>