<?php
	function carregaClasse($classe) {
		require $classe.".php";
	}

	spl_autoload_register("carregaClasse");

	$compra = new Compra(3000,"Sao Paulo");

	$calculadora = new CalculadoraDePrecos(new TabelaDePrecoPadrao, new Frete());

	echo $calculadora->calcula($compra);
	