<?php 
function carregaClasse($classe){
    require $classe.".php";
}spl_autoload_register("carregaClasse");



$compra = new Compra(3000, "SAO PAULO");

$calculadora = new CalculadoraDePrecos();

echo $calculadora->calcula($compra);