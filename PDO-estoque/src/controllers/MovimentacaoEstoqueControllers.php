<?php
require_once __DIR__ . '/../class/MovimentacaoEstoque.php';

class MovimentacaoEstoqueController {
    private $movimentacaoEstoque;

    public function __construct($pdo) {
        $this->movimentacaoEstoque = new MovimentacaoEstoque($pdo);
    }

    public function index() {
        return $this->movimentacaoEstoque->read();
    }

    public function create($id_produto, $id_tipo, $id_usuario, $quantidade) {
        $this->movimentacaoEstoque->create($id_produto, $id_tipo, $id_usuario, $quantidade);
    }

    public function update($id_movimentacao, $id_produto, $id_tipo, $id_usuario, $quantidade) {
        $this->movimentacaoEstoque->update($id_movimentacao, $id_produto, $id_tipo, $id_usuario, $quantidade);
    }

    public function delete($id_movimentacao) {
        $this->movimentacaoEstoque->delete($id_movimentacao);
    }
}
?>