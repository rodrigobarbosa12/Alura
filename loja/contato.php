<?php require_once("cabecalho.php");
      require_once("logica-usuario.php");
      
    #Verifica se esta logado
     verificaUsuario();

?>

    <form action="envia-contato.php" method="post">
        <table class="table">
            <tr>
                <td>Nome<td/>
                    <td><input type="text" name="nome" class="form-control"> </td>

                <td>Email<td/>
                    <td><input type="email" name="email" class="form-control"></td>

                <td>Mensagem<td/>
                    <td><textarea class="form-control" name="mensagem"></textarea> </td>
                <td><button type="submit" class="btn btn-primary">Enviar</button> </td>
            </tr>
        </table>
    </form>

<?php require_once("rodape.php")?>