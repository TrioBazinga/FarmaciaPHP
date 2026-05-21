<?php

require_once "config/conexao.php";

$id = $_GET['id'];

?>

<h2>Editar Produto</h2>

<form method="POST">

    <input type="text" name="nome">

    <br><br>

    <input type="text" name="fabricante">

    <br><br>

    <input type="number" step="0.01" name="preco">

    <br><br>

    <input type="number" name="estoque">

    <br><br>

    <button type="submit">
        Salvar
    </button>

</form>