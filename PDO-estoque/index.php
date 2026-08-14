<?php
require_once __DIR__ .'/config/conexao.php';
require_once __DIR__ .'/src/controllers/ClienteControllers.php';
$clienteController = new ClienteController($pdo);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['create'])){
        $clienteController->create($_POST['name'], $_POST['email'], $_POST['cpf']);
    }elseif(isset($_POST['update'])){
       
    }elseif(isset($_POST['delete'])){
        
    }
}
$clientes = $clienteController->index();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Sistema de Estoque</title>
</head>
<body>
    <h1>Clientes</h1>
    <form id="createCliente" method="POST">
        <input type="text" id="name" name="name" placeholder="Nome">
        <input type="email" id="email" name="email" placeholder="Email">
        <input type="text" id="cpf" name="cpf" placeholder="CPF">
        <button type="submit">Cadastrar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
        </thead>
    </table>
</body>
</html>