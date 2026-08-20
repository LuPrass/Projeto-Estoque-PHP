<?php
require_once __DIR__ . '/../class/Produto.php';

class ProdutoController {
    private $produto;

    public function __construct($pdo) {
        $this->produto = new Produto($pdo);
    }

    public function index() {
        return $this->produto->read();
    }

    public function create($nome, $categoria, $id_fornecedor) {
        $this->produto->create($nome, $categoria, $id_fornecedor);  
    }

    public function update($id_produto, $nome, $categoria, $id_fornecedor) {
        $this->produto->update($id_produto, $nome, $categoria, $id_fornecedor);
    }

    public function delete($id_produto) {
        $this->produto->delete($id_produto);
    }
}
?>