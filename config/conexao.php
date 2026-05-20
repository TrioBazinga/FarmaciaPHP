<?php

$servidor = "127.0.0.1";
$banco = "farmacia";
$usuario - "root";
$senha = "TrioBazinga";

try {
    $conexao - new PDO(
        "mysql:host=$servidor;dbname=$banco",
        $usuario,
        $senha
        );
        echo "Conexão realizada no banco 'Farmácia'!";
}
catch(PDOExpection $erro) {
    echo "A conexão não pode ser realizada." . $erro->getMessage();
    }

?>