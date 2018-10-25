<?php
require_once('conexao.php');
require_once('util.php');

echo '<form action="ImagemBinario.html"><input type="submit" value="voltar"></form>';

define('TAMANHO_MAXIMO', (2 * 1024 * 1024));

if (!isset($_FILES['imagem']))
{
    echo retorno('Selecione uma imagem');
    exit;
}

$foto = $_FILES['imagem'];
$nome = $foto['name'];
$tipo = $foto['type'];
$tamanho = $foto['size'];

if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $tipo))
{
    echo retorno('Não é uma imagem válida');
    exit;
}

if ($tamanho > TAMANHO_MAXIMO)
{
    echo retorno('A imagem deve ter no máximo 2 MB');
    exit;
}

$conteudo = file_get_contents($foto['tmp_name']);

$stmt = $pdo->prepare('INSERT INTO imagens (arquivo, nome, tipo, tamanho) VALUES (:arquivo, :nome, :tipo, :tamanho)');

$stmt->bindParam(':arquivo', $conteudo, PDO::PARAM_LOB);
$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
$stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
$stmt->bindParam(':tamanho', $tamanho, PDO::PARAM_INT);

echo ($stmt->execute()) ? retorno('Imagem cadastrada com sucesso', true) : retorno($stmt->errorInfo());
