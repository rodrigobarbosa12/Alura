<?php

function autoload($class)
{
    include $class.'.php';
}

spl_autoload_register('autoload');

$orcamento = new Orcamento(800);

$icms = new Icms();
$iss = new Iss();

$calculador = new CalculadorDeImpostos();

echo 'ICMS: '.$calculador->realizaCalculo($orcamento, $icms);
echo '</br>';
echo 'ISS: '.$calculador->realizaCalculo($orcamento, $iss);

/**
 * Quando utilizamos uma hierarquia,
 * como fizemos com a interface Imposto
 * e as implementações ICMS e ISS,
 * e recebemos o tipo mais genérico como parâmetro,
 * para ganharmos o polimorfismo na regra que será executada,
 * simplificando o código e sua evolução,
 * estamos usando o Design Pattern chamado Strategy.
 */