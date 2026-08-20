<?php
require_once __DIR__ . '/../class/Categoria.php';

class CategoriaController{
    private $categoria;

    public function __construct($pdo){
        $this->categoria = new Categoria($pdo);
    }

    public function index(){
       return $this->categoria->read(); 
    }

    public function create($nome_categoria){
        $this->categoria->create($nome_categoria);  
    }
    public function update ($id_categoria,$nome_categoria){
        $this->categoria->update($id_categoria,$nome_categoria);
    }
    public function delete ($id_categoria){
        $this->categoria->delete($id_categoria);
    }

}
?>