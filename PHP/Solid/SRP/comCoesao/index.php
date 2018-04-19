<?php
	function carregaClasse($classe){
		require $classe.".php";
	}

	spl_autoload_register("carregaClasse");

	$dev = new Funcionario(new Desenvolvedor(new DezOuVintePorcento()),3100);

	$calculadora = new CalculadoraDeSalario();

	echo $calculadora->calcula($dev);