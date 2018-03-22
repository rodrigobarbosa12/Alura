
<?php include("cabecalho.php");
      include("conexaoBD.php");
      include("bancoCategoria.php");

      $categorias = listaCategoria($conexao);
?>

    <div id="prim">
     <form method="POST" >
        <table class="table">  
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" placeholder="Nome completo" required><br></td> <br>
            </tr>           
            <tr>
                <td>preco:</td>
                <td><input type="number" name="preco" placeholder="R$" required><br></td> <br>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><textarea name="descricao" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="enviar" value="Registrar"></td>
            </tr>
            <tr>
                <td>Categoria</td>
                <td>
                    <?php 
                    foreach($categorias as $categoria):?>

                    <input type="radio" name="categoria_id" value="<?=$categoria['id']#numero ID?>">
                    <?= $categoria['nome']#nome ID?>

                <?php endforeach?>
            </td>
            </tr>
        </table>   
     </form>
    </div>


    <div id="segu">
<?php
    include("conexaoBD.php");
    include("bancoProduto.php");

    $msg = mysqli_error($conexao);
    if (insereProduto($conexao, $nome, $preco, $descricao,$categoria_id)){?>

        <p class="alert-success"> <?php echo"Produto cadastrado";?> </p>
        
    <?php }else {

        echo"Produto nao cadastrado".$msg;
    }
?>
   </div>

    </body>

</html>
