<?php
require("orcamento.php");
require("imposto.php");
require("iccc.php");
require("icms.php");
require("iss.php");

$salario = new Orcamento(500);
$impostoICCC = new ICCC();
$impostoICMS = new ICMS();
$impostoISS = new ISS();


echo "Imposto ICCC: ". $impostoICCC->calcula($salario);
    echo "<br/>";
echo "Imposto ICMS : ".$impostoICMS->calcula($salario);
    echo "<br/>";
echo "Imposto ISS : ".$impostoISS->calcula($salario);

?>