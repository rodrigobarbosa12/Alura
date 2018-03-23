<?php
	  include("conecta.php");
      include("banco-usuario.php");	
      

$usuario = buscaUsuario($conexao, $_POST['email'], $_POST['senha']);

var_dump($usuario);
