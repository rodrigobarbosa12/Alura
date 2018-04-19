<?php 

function carregaClasse($classe){
    require $classe.".php";
}spl_autoload_register("carregaClasse");



$funcionario = new Funcionario();
$funcionario->setNome = "Rodrigo";
$funcionario->setCargo = "Desenvolvedor";
    echo "<pre/>";
var_dump($funcionario);