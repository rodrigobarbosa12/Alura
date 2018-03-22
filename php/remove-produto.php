<?php 
include("cabecalho.php");
include("conexaoBD.php");
include("bancoProduto.php");

$id = $_POST['id'];

removerProduto($conexao,$id);

header("Location: listando.php");
die();
include("rodape.php");?>
