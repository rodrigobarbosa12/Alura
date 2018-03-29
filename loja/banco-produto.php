<?php 
require_once("conecta.php");
require_once("class/categoria.php");



function listaProdutos($conexao) {
	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
	while($produto_array = mysqli_fetch_assoc($resultado)) {

		$categoria = new categoria();
			$categoria->setNome($produto_array['categoria_nome']);
		$produto = new produto();
			$produto->setId($produto_array['id']);
			$produto->setNome($produto_array['nome']);
       	 	$produto->setDescricao($produto_array['descricao']);
        	$produto->setCategoria($categoria);
        	$produto->setPreco($produto_array['preco']);
       		$produto->setUsado($produto_array['usado']);
		array_push($produtos, $produto);
	}
return $produtos;
}


function insereProduto($conexao, produto $produto) {
	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()})";
return mysqli_query($conexao, $query);	
}



function alteraProduto($conexao, produto $produto) {
	$produto->getNome(mysqli_real_escape_string($conexao, $produto->getNome() ));
	$produto->getDescricao(mysqli_real_escape_string($conexao, $produto->getDescricao() ));
	$query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}',categoria_id= {$produto->getCategoria()->getId()}, usado = {$produto->getUsado()} where id = '{$produto->getId()}'";
return mysqli_query($conexao, $query); 	
}



function buscaProduto($conexao, $id) {
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	$produto_buscado = mysqli_fetch_assoc($resultado);

		$categoria = new categoria();
			 $categoria->setId($produto_buscado['categoria_id']);
		$produto = new Produto();
		     $produto->setNome($produto_buscado['nome']);
       		 $produto->setDescricao($produto_buscado['descricao']);
       		 $produto->setCategoria($categoria);
       		 $produto->setPreco($produto_buscado['preco']);
       		 $produto->setUsado($produto_buscado['usado']);
return $produto;
}


function removeProduto($conexao, $id) {
	$query = "delete from produtos where id = {$id}";
return mysqli_query($conexao, $query);
}