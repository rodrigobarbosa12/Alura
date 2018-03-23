
<?php include("cabecalho.php");
      include("conexaoBD.php");
      include("bancoCategoria.php");
      include("bancoProduto.php");

      $categorias = listaCategoria($conexao);
?>

    <div id="prim">
     <form action="alertaProduto.php" method="post" >
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
            <tr>
                <td><input type="submit" name="enviar" value="Registrar"></td>
            </tr>
        </table>   
     </form>
    </div>



    

 </body>
</html>
