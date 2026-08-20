<?php

class Produto {

    private $pdo;
    private $id_produto;
    private $nome;
    private $categoria;
    private $id_fornecedor;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Gets
    public function getId() {
        return $this->id_produto;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getCategoria() {
        return $this->categoria;
    }
    public function getIdFornecedor() {
        return $this->id_fornecedor;
    }

    // Sets
    public function setId($id_produto) {
        $this->id_produto = $id_produto;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    public function setIdFornecedor($id_fornecedor) {
        $this->id_fornecedor = $id_fornecedor;
    }

    // CRUD
    public function create($nome, $categoria, $id_fornecedor) {
        $sql = "INSERT INTO produto (nome, categoria, id_fornecedor) VALUES (:nome, :categoria, :id_fornecedor)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['nome' => $nome, 'categoria' => $categoria, 'id_fornecedor' => $id_fornecedor]);
    }

    public function read() {
        $sql = "SELECT * FROM produto";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id_produto, $nome, $categoria, $id_fornecedor) {
        $sql = "UPDATE produto SET nome = :nome, categoria = :categoria, id_fornecedor = :id_fornecedor WHERE id_produto = :id_produto";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nome' => $nome,
            'categoria' => $categoria,
            'id_fornecedor' => $id_fornecedor,
            'id_produto' => $id_produto
        ]);
    }

    public function delete($id_produto) {
        $sql = "DELETE FROM produto WHERE id_produto = :id_produto";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_produto' => $id_produto]);
    }
}
?>