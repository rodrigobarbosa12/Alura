<?php
      require_once("banco-usuario.php");	
      require_once("logica-usuario.php");
      
$usuario = buscaUsuario($conexao, $_POST['email'], $_POST['senha']);

if($usuario == null){
      $_SESSION["danger"] = "Usuario ou senha invalida!";
      header("location: index.php");
  }else{
      $_SESSION["success"] = "Usuario logado com sucesso!";
      
      logaUsuario($usuario["email"]);
      header("location: index.php");
  }
 die();
