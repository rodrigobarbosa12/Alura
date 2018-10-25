<?php

require_once('conexao.php');

$id = (int) $_GET['id'];

$stmt = $pdo->prepare('SELECT arquivo, tipo FROM imagens WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute())
{
    $foto = $stmt->fetchObject();
    if ($foto != null)
    {
       header('Content-Type:'. $foto->tipo);
       echo $foto->arquivo;
    }
}
?>