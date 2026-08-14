<?php
require_once __DIR__ . '/../class/Cliente.php';

class UserController{
    private $clienete;

    public function __construct($pdo){
        $this->cliente = new Cliente($pdo);
    }

    public function index(){
       return $this->cliente->read(); 
    }

    public function create($name,$email,$cpf){
        $this->cliente->create($name,$email,$cpf);  
    }
    public function update ($id,$name,$email,$cpf){
        $this->cliente->update($id,$name,$email,$cpf);
    }
    public function delete ($id){
        $this->cliente->delete($id);
    }

}
?>