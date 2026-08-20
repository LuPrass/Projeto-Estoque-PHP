<?php
require_once __DIR__ . '/../class/Produto.php';

class ProdutoController{
    private $produto;

    public function __construct($pdo){
        $this->produto = new Produto($pdo);
    }

    public function index(){
       return $this->produto->read(); 
    }

    public function create($name,$categoria){
        $this->produto->create($name,$categoria);  
    }
    public function update ($id_produto,$name,$categoria){
        $this->produto->update($id_produto,$name,$categoria);
    }
    public function delete ($id_produto){
        $this->produto->delete($id_produto);
    }

}
?>