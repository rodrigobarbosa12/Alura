<?php

function autoload($class)
{
    include $class.'.php';
}

spl_autoload_register('autoload');


$valor = new Valor(30, 50);

$somar = new Somar();
$subtrair = new Subtracao();
$divisao = new Divisao();
$multiplicacao = new Multiplicacao();

$calculadora = new Calculador();

echo "Valor1: {$valor->getValor1()}";
echo '</br>';
echo "Valor2: {$valor->getValor2()}";
echo '</br>';
echo 'Soma: '.$calculadora->calculadora($valor, $somar);
echo '</br>';
echo 'Subtração: '.$calculadora->calculadora($valor, $subtrair);
echo '</br>';
echo 'Subtração: '.$calculadora->calculadora($valor, $divisao);
echo '</br>';
echo 'Multiplicação: '.$calculadora->calculadora($valor, $multiplicacao);