<?php
require_once __DIR__ . '/../class/Cliente.php';

class ClienteController {
    private $cliente;

    public function __construct($pdo) {
        $this->cliente = new Cliente($pdo);
    }

    public function index() {
        return $this->cliente->read(); 
    }

    public function create($nome, $email, $cpf) {
        $this->cliente->create($nome, $email, $cpf);  
    }

    public function update($id, $nome, $email, $cpf) {
        $this->cliente->update($id, $nome, $email, $cpf);
    }

    public function delete($id) {
        $this->cliente->delete($id);
    }
}
?>