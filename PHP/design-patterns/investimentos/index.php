<?php 
function carregaClasse($nomeClasse){
    require $nomeClasse.".php";
} spl_autoload_register("carregaClasse");


$contaBancaria = new Conta(1000);
$realiza = new RealizadorDeInvestimentos();

$conservador = new Conservador();
$moderado = new Moderado();
$arrojado = new Arrojado();


echo $realiza->realiza($contaBancaria,$moderado);
