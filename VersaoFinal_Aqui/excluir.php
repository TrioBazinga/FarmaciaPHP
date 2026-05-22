<?php
require_once "config/conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Adicionado o "FROM" que faltava na sintaxe SQL
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    } catch (PDOException $erro) {
        echo "Erro ao excluir produto: " . $erro->getMessage();
        exit;
    }
}

header("Location: index.php");
exit;
?>