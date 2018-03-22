<?php include("cabecalho.php")?>

        <h4>cadastro</h4>
    <form>
        <label>nome</label>
            <input type="name" name="nome"><br/>  
        <label>preço</label>
            <input type="number" name="preco"><br/>  
        <input type="submit" value="cadastrar">
    </form>


<?php 
    #?nome=Rodrigo&preco=22
    $nome = $_GET['nome'];
    $preco = $_GET['preco'];
?>

    <div>
        <?php echo"nome: ".$nome." preço: ".$preco ?>
    </div>
        
        <br/>
<?php 

    $array = array(1,2,"oi",3,"tchau");

   for( $i=0; $i<5; $i++){
    echo" chave". $i. " valor ". $array[$i];

   }

   echo'<br/><br/>';


   function somaDoisNumeros($a, $b){
    $soma = $a+$b;
return $soma;
}

$a = 50;
$b = 50;
$resultado = somaDoisNumeros($a, $b);
    echo $resultado;

    echo'<br/><br/>';

    function somaArray($array){
        $soma = 0;
        for($i=0; $i<sizeof($array); $i++)
        $soma = $soma + $array[$i]; 
        return $soma;
    }
    $array = array(1,2,3,4,5);
    $resposta = somaArray($array);
    echo $resposta;

    
?>



<?php include("rodape.php")?>
 

 

