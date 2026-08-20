<?php

class Produto {

private $pdo;


public function __construct($pdo) {
    $this->pdo = $pdo;
}

//Gets
public function getId() {
    return $this->id_produto;
}
public function getNome() {
    return $this->nome;
}
public function getCategoria() {
    return $this->categoria;
}

//Sets
public function setOId($id_produto) {
    $this->id_produto = $id_produto;
}
public function setNome($nome) {
    $this->nome = $nome;
}
public function setCategoria($categoria) {
    $this->categoria = $categoria;
}



public function create($name, $categoria){
    $sql = "INSERT INTO produto (nome, categoria) VALUES (:nome, :categoria)";
    $stmt = $this->pdo->prepare($sql);
    $stmt-> execute(['nome' => $name, 'categoria' => $categoria]);
}

public function read(){
    $sql = "SELECT * FROM produto";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function update($id_produto, $name, $categoria){
    $sql = "UPDATE produto SET name = :name, categoria = :categoria WHERE id_produto = :id_produto";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(["nome"=> $name,"categoria"=> $categoria,"id_produto"=> $id_produto]);
}
public function delete($id_produto){
    $sql = "DELETE FROM produto WHERE id_produto = :id_produto";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id_produto' => $id_produto]);
}
}
?>