<?php 
function carregaClasse($classe){
    require $classe.".php";
}spl_autoload_register("carregaClasse");


//(2+1) = 3
$esquerda = new Soma(new Numero(2), new Numero(1));
//(8-4) = 4
$direita = new Subtracao(new Numero(8), new Numero(4));

//(3+4) = 7
$conta = new Soma($esquerda, $direita);
$resultado = $conta->avalia();
echo "Soma: (3+4) = ". $resultado."<br/>"; // echo 7 

//(3-4) = -1
$conta = new Subtracao($esquerda, $direita);
$resultado = $conta->avalia();
echo "Subtracao: (3-4) = ". $resultado;// echo -1

    echo"<br/><br/><br/>";
    
echo "<pre/>";
var_dump($conta);