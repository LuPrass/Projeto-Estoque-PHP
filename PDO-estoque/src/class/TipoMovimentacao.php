<?php

class TipoMovimentacao {

    private $pdo;
    private $id_tipo;
    private $descricao;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Gets
    public function getId() {
        return $this->id_tipo;
    }
    public function getDescricao() {
        return $this->descricao;
    }

    // Sets
    public function setId($id_tipo) {
        $this->id_tipo = $id_tipo;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    // CRUD
    public function create($descricao) {
        $sql = "INSERT INTO tipo_movimentacao (descricao) VALUES (:descricao)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['descricao' => $descricao]);
    }

    public function read() {
        $sql = "SELECT * FROM tipo_movimentacao";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id_tipo, $descricao) {
        $sql = "UPDATE tipo_movimentacao SET descricao = :descricao WHERE id_tipo = :id_tipo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'descricao' => $descricao,
            'id_tipo'   => $id_tipo
        ]);
    }

    public function delete($id_tipo) {
        $sql = "DELETE FROM tipo_movimentacao WHERE id_tipo = :id_tipo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_tipo' => $id_tipo]);
    }
}
?>