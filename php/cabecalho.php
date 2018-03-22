<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css"> 

#prim{ 
    padding: 10PX;
    background-color:#D3D3D3;
}
#segu{  
    margin: 30px 15PX 10PX 15PX;
    padding: 10PX 15PX 10PX 15PX;
  
}


</style>
</head>   
<body>

        <?php

            if(!$_POST) return;

    $nome = $_POST['nome'];
    $preco = $_POST['preco']; 
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];

            
            
        ?>

    