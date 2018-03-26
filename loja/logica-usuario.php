<?php 

function usuarioEstaLogado(){
    return isset(($_COOKIE["usuario_logado"]));#verifica se o usuario esta logado
}

function verificaUsuario(){
    if(!usuarioEstaLogado()){ #se não estiver logado...
        header("location: index.php?falhaDeSeguranca=true");
        die();
    }
}

function usuarioLogado(){
return $_COOKIE["usuario_logado"];    
}

function logaUsuario($email){
     setcookie("usuario_logado", email, time()+ 60);
}