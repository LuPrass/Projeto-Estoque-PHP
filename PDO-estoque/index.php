<?php
require_once __DIR__ . '/config/conexao.php';
require_once __DIR__ . '/src/controllers/ClienteControllers.php';
$clienteController = new ClienteController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $clienteController->create($_POST['nome'], $_POST['email'], $_POST['cpf']);
        header("Location: index.php");
        exit;
    } elseif (isset($_POST['update'])) {
        $clienteController->update($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['cpf']);
        header("Location: index.php");
        exit;
   } elseif (isset($_POST['delete'])) {
    $clienteController->delete($_POST['id']); // passa o valor do input hidden que tem o ID
    header("Location: index.php");
    exit;
}
}

$clientes = $clienteController->index();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Sistema - Clientes</title>
</head>
<body>
    <h1>Gerenciar Clientes</h1>

    <!-- Formulário para Criar Cliente -->
    <h3>Novo Cliente</h3>
    <form method="POST">
        <input type="hidden" name="create" value="1">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="cpf" placeholder="CPF" required>
        <button type="submit">Cadastrar</button>
    </form>

    <hr>

    <!-- Tabela de Listagem de Clientes -->
    <h3>Lista de Clientes</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <form method="POST">
                       <td>
    <?= htmlspecialchars($cliente['id_cliente']) ?>
    <input type="hidden" name="id" value="<?= $cliente['id_cliente'] ?>">
</td>
                        <td>
                            <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required>
                        </td>
                        <td>
                            <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required>
                        </td>
                        <td>
                            <input type="text" name="cpf" value="<?= htmlspecialchars($cliente['cpf']) ?>" required>
                        </td>
                        <td>
                            <button type="submit" name="update">Salvar</button>
                            <button type="submit" name="delete" onclick="return confirm('Deseja realmente excluir?');">Excluir</button>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>