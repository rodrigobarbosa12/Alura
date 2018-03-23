<?php

function buscaUsuario($conexao, $email, $senha){
    $senhamd5 = md5($senha);#md5 Faz a croptografia da senha
    $query ="select * from usuarios where email='{$email}' and senha='{$senhamd5}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
