<?php

function carregaClasse($nomeClasse){
    require $nomeClasse.".php";
} spl_autoload_register("carregaClasse");

$salario = new Orcamento(500); //salario é 500 reais
// $salario->addItens(new Item("piso", 250) );


$imposto1= new ImpostoX();
var_dump($imposto1);
    