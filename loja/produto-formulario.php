<?php require_once("cabecalho.php"); 
require_once("banco-categoria.php");
require_once("logica-usuario.php");

$categorias = listaCategorias($conexao);

#Verifica se esta logado
 verificaUsuario();

#zera as informaçoes pois esta sendo usado um formulario ja preenchido.
$produto = array("nome"=>"","preco"=>"","descricao"=>"","categoria_id"=>"1",);
$usado="";

?>			
	<h1>Formulário de produto</h1>
	<form action="adiciona-produto.php" method="post">

	<table class="table">
		  <?php require_once("produto-formulario-base.php"); ?>
			<tr>
				<td>
					<button class="btn btn-primary" type="submit">Cadastrar</button>
				</td>
			</tr>
		</table>
	</form>
<?php inrequire_onceclude("rodape.php"); ?>			
