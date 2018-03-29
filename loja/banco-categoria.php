<?php require_once("banco-produto.php");
	  require_once("class/categoria.php");
	
function listaCategorias($conexao) {
	$categorias = array();
	$query = "select * from categorias";
	$resultado = mysqli_query($conexao, $query);
	while($categoria_array = mysqli_fetch_assoc($resultado)) {

		$categoria = new categoria();
		$categoria->setId($categoria_array['id']);
		$categoria->setNome($categoria_array['nome']);

		array_push($categorias, $categoria);
	}
	return $categorias;
}