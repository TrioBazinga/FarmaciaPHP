<?php

require_once "config/conexao.php";

$id = $_GET['id'];

$sql = "delete produtos where id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

header("Location: index.php");

?>