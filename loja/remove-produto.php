<?php require_once("cabecalho.php"); 					
 require_once("banco-produto.php"); 
 require_once("logica-usuario.php");

 $id = $_POST['id'];
 removeProduto($conexao, $id);
 $_SESSION["Produto removido com sucesso!"];
 header("Location: produto-lista.php");
 die();
 ?>
 