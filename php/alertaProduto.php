<?php include("cabecalho.php");
      include("conexaoBD.php");
      include("bancoProduto.php");      
?>


<div id="segu">
<?php  


if(!$_POST) return;

   
    $nome = $_POST['nome'];
    $preco = $_POST['preco']; 
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];
    if(array_key_exists('usado', $_POST)){
        $usado ="true";
    }else{
        $usado ="false";
    }


      #CHAMADA DA FUNÇÃO insereProduto, COM MENSAGEM DE VERIFICAÇÃO
      $msg = mysqli_error($conexao);
      if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id)){?>
          <p class="alert-success"> <?php echo"Produto cadastrado!";?> </p> 
      <?php }else {
          echo"Produto nao cadastrado".$msg;
      }
?>

</div>
<?php include("rodape.php");?>