<?php
require_once 'conexao.php';

$nome = 'Paracetamol 750mg';
$fabricante = 'Medley';
$preco = 15.30;
$estoque = 50;

try {
    $sql = "INSERT INTO produtos (nome, fabricante, preco, estoque) VALUES (:nome, :fabricante, :preco, :estoque)";
    $stmt = $conexao->prepare($sql);

    $stmt->execute([
        ':nome'       => $nome,
        ':fabricante' => $fabricante,
        ':preco'      => $preco,
        ':estoque'    => $estoque
    ]);

    echo "Produto inserido com sucesso! ID: " . $conexao->lastInsertId();

} catch (PDOException $erro) {
    echo "Erro ao inserir: " . $erro->getMessage();
}