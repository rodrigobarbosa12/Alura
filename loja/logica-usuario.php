<?php 
session_start();
function usuarioEstaLogado(){
    return isset(($_SESSION["usuario_logado"]));#verifica se o usuario esta logado
}

#se não estiver logado, volta para index.php
function verificaUsuario(){
    if(!usuarioEstaLogado()){
        header("location: index.php?falhaDeSeguranca=true");
        die();
    }
}

#Guarda as informacoes 
function usuarioLogado(){
 return $_SESSION["usuario_logado"];    
}

function logaUsuario($email){
    $_SESSION["usuario_logado"] = $email; 
    #setcookie("usuario_logado", email, time()+ 60);
}

function logout(){
    session_destroy();
}