<?php require_once("banco-produto.php");
 
function buscaUsuario($conexao, $email, $senha){
    $senhamd5 = md5($senha);#md5 Faz a croptografia da senha
    $email = mysqli_real_escape_string($conexao, $email);
    $query ="select * from usuarios where email='{$email}' and senha='{$senhamd5}'";#essa linha precisa de conexao com o banco
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}













