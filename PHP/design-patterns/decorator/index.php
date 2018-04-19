<?php 
function carregaClasse($nomeClasse){
    require $nomeClasse.".php";
} spl_autoload_register("carregaClasse");


$reforma = new Orcamento(1000);
$calculadora = new CalculadoraDeImpostos();


echo "ICMS: ". $calculadora->calcula($reforma, new ICMS());
    echo "<br/>";
echo"ISS: ". $calculadora->calcula($reforma, new ISS());
    echo "<br/>";
echo "KVC: ". $calculadora->calcula($reforma, new KCV());
    echo "<br/>";
echo "ICCC: ". $calculadora->calcula($reforma, new ICCC());

echo "<br/> ICMS + ISS: ". $calculadora->calcula($reforma, new ICMS() );
    echo "<br/>";