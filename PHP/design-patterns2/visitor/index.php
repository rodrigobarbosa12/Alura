<?php 
function carregaClasse($classe){
    require $classe.".php";
}spl_autoload_register("carregaClasse");


$esquerda = new Soma(new Numero(2), new Numero(1));
$direita = new Subtracao(new Numero(8), new Numero(4));


$impressora = new Impressora();
$soma = new Soma($esquerda, $direita);
$sub = new Subtracao($esquerda, $direita);

$soma->aceita($impressora);
    echo "<br/><br/>";
$sub->aceita($impressora);

    echo "<br/><br/>";  

$mapa = new GoogleMaps();
$mapa->getMapa();
    echo "<br/><br/>";  
$mapa = new MapaLink();
$mapa->getMapa();


