<?php 

function carregaClasse($classe){
    require $classe.".php";
}spl_autoload_register("carregaClasse");



$comum = new ContaComum();
$manipulador = new ManipuladorDeSaldo();

$manipulador->deposita(900);

var_dump($manipulador);
echo "<br/><br/>  Saldo Disponivel: ". $manipulador->getSaldo();