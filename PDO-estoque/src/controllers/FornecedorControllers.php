<?php
require_once __DIR__ . '/../class/Fornecedor.php';

class FornecedorController {
    private $fornecedor;

    public function __construct($pdo) {
        $this->fornecedor = new Fornecedor($pdo);
    }

    public function index() {
        return $this->fornecedor->read(); 
    }

    public function create($nome, $cnpj, $telefone) {
        $this->fornecedor->create($nome, $cnpj, $telefone);  
    }

    public function update($id_fornecedor, $nome, $cnpj, $telefone) {
        $this->fornecedor->update($id_fornecedor, $nome, $cnpj, $telefone);
    }

    public function delete($id_fornecedor) {
        $this->fornecedor->delete($id_fornecedor);
    }
}
?>