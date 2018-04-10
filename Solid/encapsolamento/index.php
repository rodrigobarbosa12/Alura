<?php 
function carregaClasse($classe){
    require $classe.".php";
}spl_autoload_register("carregaClasse");


$fatura = new Fatura("Rodrigo", 500);
// $fatura->setCliente("Rodrigo");
// $fatura->setValor(500);

echo 'O cliente '.$fatura->getCliente(). ', ganhou um desconto de '. $fatura->getValor();

