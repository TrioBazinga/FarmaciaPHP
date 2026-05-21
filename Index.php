<?php
require_once 'config/conexao.php';

$sql = "SELECT * FROM produtos";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require_once 'includes/header.php'; ?>

<h2>Produtos em Estoque</h2>

<div class="cards">

<?php foreach($produtos as $produto): ?>

    <div class="card">

        <h2><?= $produto['nome'] ?></h2>

        <p>
            <strong>Fabricante:</strong>
            <?= $produto['fabricante'] ?>
        </p>

        <p>
            <strong>Preço:</strong>
            R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
        </p>

        <p>
            <strong>Estoque:</strong>
            <?= $produto['estoque'] ?>
        </p>

        <a class="btn" href="editar.php?id=<?= $produto['id'] ?>"> Editar</a>

        <a class="btn" href="excluir.php?id=<?= $produto['id'] ?>">Excluir </a>

    </div>

<?php endforeach; ?>

</div>

<?php require_once 'includes/footer.php'; ?>