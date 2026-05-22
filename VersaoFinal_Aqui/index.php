<?php
require_once 'config/conexao.php';

try {
    $sql = "SELECT * FROM produtos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $erro) {
    echo "Erro ao listar produtos: " . $erro->getMessage();
    $produtos = [];
}

require_once 'includes/header.php'; 
?>

<h2>Produtos em Estoque</h2>

<div class="cards">
    <?php if (count($produtos) > 0): ?>
        <?php foreach($produtos as $produto): ?>
            <div class="card">
                <h2><?= htmlspecialchars($produto['nome']) ?></h2>
                <p><strong>Fabricante:</strong> <?= htmlspecialchars($produto['fabricante']) ?></p>
                <p><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                <p><strong>Estoque:</strong> <?= htmlspecialchars($produto['estoque']) ?> unidades</p>
                
                <a class="btn" href="editar.php?id=<?= $produto['id'] ?>">Editar</a>
                <a class="btn" href="excluir.php?id=<?= $produto['id'] ?>" onclick="return confirm('Deseja realmente excluir este produto?')">Excluir</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center; width:100%;">Nenhum produto cadastrado no momento.</p>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php'; ?>