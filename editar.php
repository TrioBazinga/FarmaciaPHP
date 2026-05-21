<?php

require_once "config/conexao.php";


$id = $_GET['id'];

$sql = "select * from produtos where id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

$produto = $stmt->fetch(PDO::FETCH_ASSOC);


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $sql = "update produtos
            set nome = :nome,
                fabricante = :fabricante,
                preco = :preco,
                estoque = :estoque
            where id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([

        ':nome' => $nome,
        ':fabricante' => $fabricante,
        ':preco' => $preco,
        ':estoque' => $estoque,
        ':id' => $id

    ]);

    header("Location: index.php");

}

?>

<h2>Editar Produto</h2>

<form method="POST">

    <input type="text"
           name="nome"
           value="<?= $produto['nome'] ?>">

    <br><br>

    <input type="text"
           name="fabricante"
           value="<?= $produto['fabricante'] ?>">

    <br><br>

    <input type="number"
           step="0.01"
           name="preco"
           value="<?= $produto['preco'] ?>">

    <br><br>

    <input type="number"
           name="estoque"
           value="<?= $produto['estoque'] ?>">

    <br><br>

    <button type="submit">
        Salvar
    </button>

</form>