<?php 
include("logica-usuario.php");

logout();
$_SESSION["success"] = "Deslogado com sucesso!";
header("location: index.php");
die();
