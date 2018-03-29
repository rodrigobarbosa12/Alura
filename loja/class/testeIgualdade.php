<?php
require_once("produto.php");


$bolo = new produto();
$bolo->setPreco(50.9);
$bolo->setNome("Chocolate");


$outroBolo = new produto();
$outroBolo->setPreco(39.9);
$outroBolo->setNome("Maracuja");

$bolo = $outroBolo;

if ($bolo === $outroBolo){
    echo"sao iguais";
}else{
    echo"sao diferentes";
}