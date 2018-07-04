<?php

// $conexao = mysqli_connect("localhost", "root", "123456", "mydb");

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

