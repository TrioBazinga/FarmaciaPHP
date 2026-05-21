<?php
require_once 'conexao.php';

$buscaFabricante = 'Medley';

try {
    $sql = "SELECT * FROM produtos WHERE fabricante = ?";
    $stmt = $conexao->prepare($sql);
    
    $stmt->execute([$buscaFabricante]);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($produtos) {
        foreach ($produtos as $prod) {
            echo "Produto: " . $prod['nome'] . " | Estoque: " . $prod['estoque'] . "<br>";
        }
    } else {
        echo "Nenhum produto encontrado para este fabricante.";
    }

} catch (PDOException $erro) {
    echo "Erro ao buscar: " . $erro->getMessage();
}