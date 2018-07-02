<?php

$conexao = mysqli_connect("localhost", "root", "123456", "mydb");

$conConciliadora = mysqli_connect("52.67.24.37", "root", "amdsdl7586", "conciliadora");

$host = 'localhost';
$usuario = 'root';
$senha = '123456';
$banco = 'mydb';
$dsn = "mysql:host={$host};port=3306;dbname={$banco}";
// $dsn = "pgsql:host={$host};port=3306;dbname={$banco}"; Conexao com POSTGRESQL

    try{
        $pdo = new PDO($dsn, $usuario, $senha);
        return $pdo;
    } catch (PDOException $e){
        die($e->getMessage());
    }


// $host2 = '52.67.24.37';
// $usuario2 = 'root';
// $senha2 = 'amdsdl7586';
// $banco2 = 'conciliadora';
// $dsn2 = "mysql:host={$host2};port=3306;dbname={$banco2}";

//     try{
//         $pdo2 = new PDO($dsn2, $usuario2, $senha2);
//     } catch (PDOException $e){
//         die($e->getMessage());
//     }