<?php require_once("cabecalho.php"); 					
 require_once("banco-produto.php"); 
 require_once("logica-usuario.php");
 require_once("class/produto.php");

 
verificaUsuario();
$produto = new produto();

$categoria->setId($_POST['categoria_id']);

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'] ;
$categoria = $categoria ;
if(array_key_exists('usado', $_POST)) {
	$produto->setUsado("true")  ;
} else {
	$produto->setUsado("false")  ;
}
$categoria = new categoria($nome, $preco, $descricao, $categoria, $usado);

if(insereProduto($conexao, $produto)) {	?>
	<p class="text-success">O produto <?= $produto->getNome() ?> foi adicionado.</p>
	
<?php } else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?= $produto->getNome() ?> não foi adicionado: <?= $msg?></p>
<?php
}
?>

<?php require_once("rodape.php"); ?>			
