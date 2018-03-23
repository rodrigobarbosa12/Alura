<?php 
include("cabecalho.php");
include("conexaoBD.php");
include("bancoProduto.php");
    
$array = listaProdutos($conexao);
?>
<?php
if(array_key_exists("removido", $_GET) && $_GET["removido"]=="true"){
?>
<p class="alert-success">Produto <?=$_GET['id']?> removido!</p>

<?php }
?>

<?php foreach($array as $produto):?>

<table class="table table-striped table-bordered">
<tr>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['preco'] ?></td>
        <td><?= substr($produto['descricao'], 0,40)#A funcção substr recebe a string e a quantidade de string ?></td>
       <td><?=$produto['categoria_nome'] #categoria_nome esta vinculada a junção das tabelas?></td>
       
       <td><a class="btn btn-primary" href="#" >Alterar</a></td>

        <form action="remove-produto.php" method="post">
            <input type="hidden" name="id" value="<?=$produto['id']#exclui o produto do id?>" /> 
          <td><button  class="btn btn-danger">Remover</td>
        </form>

    </tr>
</table> 


<?php

endforeach;
  include("rodape.php");
?>