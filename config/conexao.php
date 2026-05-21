<?php

$servidor = "127.0.0.1";
$banco = "farmacia";
$usuario = "root";
$senha = "TrioBazinga";

try {
    $pdo = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
        );
        echo "Conexão realizada no banco 'Farmácia'!";
}
catch(PDOException $erro) {
    echo "A conexão não pode ser realizada." . $erro->getMessage();
    }

?>