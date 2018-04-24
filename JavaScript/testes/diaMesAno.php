<?php 

$string = 'Abril 24';
$regex = '~(\w+)\s(\d+)~';
$novaOrdem = '$2 de $1';

$resultado = preg_replace($regex, $novaOrdem, $string);
echo($resultado);

echo'<br/><br/>';

 $data = '2018-04-24';
 $novaRegex = '~(\d{4})\-(\d{2})-(\d{2})~';
 $ordemBR = '$3-$2-$1';

 $resultadoBR = preg_replace($novaRegex, $ordemBR, $data);
 echo 'Ordem Brasileira '.$resultadoBR;

 $trocar = '~-~';
 $barra = '/';

 echo'<br/><br/>';

 $fazerTroca = preg_replace($trocar, $barra, $resultadoBR);
 echo'Trocado de - '.'('.$resultadoBR.')'.' Por / '.'('.$fazerTroca.')';

 /*
 *  No PHP, temos a função preg_replace, que recebe uma expressão regular
 * como primeiro parâmetro, o segundo é o novo texto que deve substituir 
 * todos os lugares que condizem com a expressão passada, e o terceiro 
 * parâmetro é a string alvo.	
 */