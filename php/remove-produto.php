<?php 
include("cabecalho.php");
include("conexaoBD.php");
include("bancoProduto.php");

$id = $_POST['id'];

$removeuProduto = removerProduto($conexao,$id);

if($removeuProduto){
    header("Location: listando.php?removido=true&id=$id");
    die();
}

header("Location: listando.php?removido=false");
die();
include("rodape.php");?>
