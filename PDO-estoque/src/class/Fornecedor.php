<?php

class Fornecedor {

    private $pdo;
    private $id_fornecedor;
    private $nome;
    private $cnpj;
    private $telefone;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Gets
    public function getId() {
        return $this->id_fornecedor;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getCnpj() {
        return $this->cnpj;
    }
    public function getTelefone() {
        return $this->telefone;
    }

    // Sets
    public function setId($id_fornecedor) {
        $this->id_fornecedor = $id_fornecedor;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    // CRUD
    public function create($nome, $cnpj, $telefone) {
        $sql = "INSERT INTO fornecedor (nome, cnpj, telefone) VALUES (:nome, :cnpj, :telefone)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nome'     => $nome,
            'cnpj'     => $cnpj,
            'telefone' => $telefone
        ]);
    }

    public function read() {
        $sql = "SELECT * FROM fornecedor";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id_fornecedor, $nome, $cnpj, $telefone) {
        $sql = "UPDATE fornecedor SET nome = :nome, cnpj = :cnpj, telefone = :telefone WHERE id_fornecedor = :id_fornecedor";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nome'          => $nome,
            'cnpj'          => $cnpj,
            'telefone'      => $telefone,
            'id_fornecedor' => $id_fornecedor
        ]);
    }

    public function delete($id_fornecedor) {
        $sql = "DELETE FROM fornecedor WHERE id_fornecedor = :id_fornecedor";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_fornecedor' => $id_fornecedor]);
    }
}
?>