<?php
require_once __DIR__ . '/../class/Cliente.php';

class UserController{
    private $clienete;

    public function __construct($pdo){
        $this->cliente = new Cliente($pdo);
    }
    
}

?>