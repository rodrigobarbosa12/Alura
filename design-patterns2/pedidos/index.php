<?php
	function carregaClasse($classe) {
		require $classe.".php";
	}spl_autoload_register("carregaClasse");



	
	$pedido1 = new Pedido("Renan",250);
	$pedido2 = new Pedido("Marcelo",350);
	$pedido3 = new Pedido("Bianca",50);
	$pedido4 = new Pedido("Fernando",550);
	$pedido5 = new Pedido("Lucas",750);

	$fila = new FilaDeExecucao();
	$fila->add(new ComandoPagar($pedido1));
	$fila->add(new ComandoPagar($pedido2));
	$fila->add(new ComandoPagar($pedido3));
	$fila->add(new ComandoPagar($pedido4));
	$fila->add(new ComandoPagar($pedido5));
	$fila->add(new ComandoFinalizar($pedido3));

	$fila->processa();