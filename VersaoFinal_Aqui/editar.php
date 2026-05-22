<?php
require_once "config/conexao.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Busca os dados atuais do produto para preencher o formulário
$sql = "SELECT * FROM produtos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    header("Location: index.php");
    exit;
}

// Processa a atualização dos dados
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    try {
        $sql = "UPDATE produtos SET 
                nome = :nome, 
                fabricante = :fabricante, 
                preco = :preco, 
                estoque = :estoque 
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':fabricante' => $fabricante,
            ':preco' => $preco,
            ':estoque' => $estoque,
            ':id' => $id
        ]);

        header("Location: index.php");
        exit;
    } catch (PDOException $erro) {
        echo "Erro ao atualizar: " . $erro->getMessage();
    }
}

require_once "includes/header.php";
?>

<h2>Editar Produto</h2>

<form method="POST">
    <label>Nome do Produto:</label>
    <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>

    <label>Fabricante:</label>
    <input type="text" name="fabricante" value="<?= htmlspecialchars($produto['fabricante']) ?>" required>

    <label>Preço:</label>
    <input type="number" step="0.01" name="preco" value="<?= htmlspecialchars($produto['preco']) ?>" required>

    <label>Estoque:</label>
    <input type="number" name="estoque" value="<?= htmlspecialchars($produto['estoque']) ?>" required>

    <button type="submit">Salvar Alterações</button>
</form>

<?php require_once "includes/footer.php"; ?>