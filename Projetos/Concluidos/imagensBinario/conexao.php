<?php
$host = 'localhost';
$usuario = 'root';
$senha = '123456';
$banco = 'imagens_binario';

$dsn = "mysql:host={$host};port=3306;dbname={$banco}";

try
{
    $pdo = new PDO($dsn, $usuario, $senha);
} catch (PDOException $e)
{
    die($e->getMessage());
}