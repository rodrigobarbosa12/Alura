<?php


// $conConciliadora = mysqli_connect("52.67.24.37", "root", "amdsdl7586", "conciliadora");

$host2 = '52.67.24.37';
$usuario2 = 'root';
$senha2 = 'amdsdl7586';
$banco2 = 'conciliadora';
$dsn2 = "mysql:host={$host2};port=3306;dbname={$banco2}";

    try{
        $pdoConciliadora = new PDO($dsn2, $usuario2, $senha2);
        return $pdoConciliadora;
    } catch (PDOException $e){
        die($e->getMessage());
    }