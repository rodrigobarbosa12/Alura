<?php

#INSERI OS PRODUTOS NO BD 
function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id){
     $sql = "INSERT INTO produtos (nome, preco, descricao, categoria_id) 
     VALUES ('$nome', '$preco', '$descricao','$categoria_id')";
     $resultado = mysqli_query($conexao, $sql); 
return $resultado;
            }


#LISTA OS PRODUTOS
function listaProdutos($conexao){
  $array = array();

  $resultado = mysqli_query($conexao, 
  "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");#faz a junção das duas tabelas
  #"select * from produtos" faz conexao com o BD e seleciona * todos os produtos
  while($produto = mysqli_fetch_assoc($resultado)){ 
  array_push($array, $produto);#joga cada item do $produto para o array $array  
            }                  
 return $array;    
}

#BUSCA PRODUTOS
function buscaProdutos($conexao,$id){
  $acao = "select * from produtos where id='$id'";
  $resultado = mysqli_query($conexao, $acao);
  return mysqli_fetch_assoc($resultado);
}

#ALTERA PRODUTOS
function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id){
    $acao="update produtos set nome='$nome', preco=$preco, descricao='$descricao', categoria_id=$categoria_id where id = '$id'";
  return mysqli_query($conexao, $acao);
}


#REMOVER PRODUTOS
function removerProduto($conexao, $id){ 
  $delete = "delete from produtos where id= '$id' ";
return  mysqli_query($conexao,$delete); 
}

