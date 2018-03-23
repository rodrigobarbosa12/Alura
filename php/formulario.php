
<?php include("cabecalho.php");
      include("conexaoBD.php");
      include("bancoCategoria.php");
      include("bancoProduto.php");

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

            <tr>
                <td><input type="checkbox" name="usado" value="true">Usado</td><!--Ao selecionar, ele recebe o valor TRUE-->
            </tr>

                <td>Categoria</td>
                <td>
                    <select name="categoria_id">
                    <?php 
                     foreach($categorias as $categoria):?>
                     <option value="<?=$categoria['id']#numero ID?>"> <?=$categoria['nome']#nome ID?> </option>
                    <?php endforeach?>
                 </select>

            </td>
            </tr>
        </table>   
     </form>
    </div>



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

    ?>


    <div id="segu">

<?php
    
    #CHAMADA DA FUNÇÃO insereProduto, COM MENSAGEM DE VERIFICAÇÃO
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
