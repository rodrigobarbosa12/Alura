<?php 
require("conta.php");
require("investimento.php");
require("arrojado.php");
require("moderado.php");
require("conservador.php");
require("realizador.php");


$contaBancaria = new Conta(1000);
$realiza = new RealizadorDeInvestimentos();

$conservador = new Conservador();
$moderado = new Moderado();
$arrojado = new Arrojado();


echo $realiza->realiza($contaBancaria,$moderado);
