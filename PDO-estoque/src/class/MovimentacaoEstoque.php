<?php

class MovimentacaoEstoque {

    private $pdo;
    private $id_movimentacao;
    private $id_produto;
    private $id_tipo;
    private $id_usuario;
    private $quantidade;
    private $data_movimentacao;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Gets
    public function getId() {
        return $this->id_movimentacao;
    }
    public function getIdProduto() {
        return $this->id_produto;
    }
    public function getIdTipo() {
        return $this->id_tipo;
    }
    public function getIdUsuario() {
        return $this->id_usuario;
    }
    public function getQuantidade() {
        return $this->quantidade;
    }
    public function getDataMovimentacao() {
        return $this->data_movimentacao;
    }

    // Sets
    public function setId($id_movimentacao) {
        $this->id_movimentacao = $id_movimentacao;
    }
    public function setIdProduto($id_produto) {
        $this->id_produto = $id_produto;
    }
    public function setIdTipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }
    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
    public function setDataMovimentacao($data_movimentacao) {
        $this->data_movimentacao = $data_movimentacao;
    }

    // CRUD
    public function create($id_produto, $id_tipo, $id_usuario, $quantidade) {
        $sql = "INSERT INTO MovimentacaoEstoque (id_produto, id_tipo, id_usuario, quantidade) VALUES (:id_produto, :id_tipo, :id_usuario, :quantidade)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id_produto' => $id_produto,
            'id_tipo'    => $id_tipo,
            'id_usuario' => $id_usuario,
            'quantidade' => $quantidade
        ]);
    }

    public function read() {
        $sql = "SELECT * FROM MovimentacaoEstoque";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id_movimentacao, $id_produto, $id_tipo, $id_usuario, $quantidade) {
        $sql = "UPDATE MovimentacaoEstoque SET id_produto = :id_produto, id_tipo = :id_tipo, id_usuario = :id_usuario, quantidade = :quantidade WHERE id_movimentacao = :id_movimentacao";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id_produto'      => $id_produto,
            'id_tipo'         => $id_tipo,
            'id_usuario'      => $id_usuario,
            'quantidade'      => $quantidade,
            'id_movimentacao' => $id_movimentacao
        ]);
    }

    public function delete($id_movimentacao) {
        $sql = "DELETE FROM MovimentacaoEstoque WHERE id_movimentacao = :id_movimentacao";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_movimentacao' => $id_movimentacao]);
    }
}
?>