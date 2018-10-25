<?php

$host = '52.67.24.37';
$usuario = 'root';
$senha = 'amdsdl7586';
$banco = 'kensei';
$dsn = "mysql:host={$host};port=3306;dbname={$banco}";
//$dsn = "pgsql:host={$host};port=3306;dbname={$banco}"; Conexao com POSTGRESQL

//$host = 'localhost';
//$usuario = 'root';
//$senha = '123456';
//$banco = 'mydb';
//$dsn = "mysql:host={$host};port=3306;dbname={$banco}";

    try{
        $pdo = new PDO($dsn, $usuario, $senha);
        return $pdo;
    } catch (PDOException $e){
        die($e->getMessage());
    }
