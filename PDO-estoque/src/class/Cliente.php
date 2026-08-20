<?php

class Cliente {

    private $pdo;
    private $id;
    private $nome;
    private $email;
    private $cpf;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Gets
    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getCpf() {
        return $this->cpf;
    }

    // Sets
    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    // CRUD
    public function create($nome, $email, $cpf) {
        $sql = "INSERT INTO cliente (nome, email, cpf) VALUES (:nome, :email, :cpf)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nome'  => $nome,
            'email' => $email,
            'cpf'   => $cpf
        ]);
    }

    public function read() {
        $sql = "SELECT * FROM cliente";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $email, $cpf) {
        $sql = "UPDATE cliente SET nome = :nome, email = :email, cpf = :cpf WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nome'  => $nome,
            'email' => $email,
            'cpf'   => $cpf,
            'id'    => $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM cliente WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}