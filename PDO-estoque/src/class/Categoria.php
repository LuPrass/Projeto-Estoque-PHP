<?php

class Categoria {

private $pdo;


public function __construct($pdo) {
    $this->pdo = $pdo;
}

//Gets
public function getId() {
    return $this->id_categoria;
}
public function getNome() {
    return $this->nome_categoria;
}

//Sets
public function setOId($id_categoria) {
    $this->id_categoria = $id_categoria;
}
public function setNome($nome_categoria) {
    $this->nome_categoria = $nome_categoria;
}

public function create($nome_categoria){
    $sql = "INSERT INTO categoria (nome) VALUES (:nome)";
    $stmt = $this->pdo->prepare($sql);
    $stmt-> execute(['nome' => $nome_categoria]);
}

public function read(){
    $sql = "SELECT * FROM categoria";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function update($id_categoria, $nome_categoria){
    $sql = "UPDATE categoria SET nome = :nome WHERE id_categoria = :id_categoria";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(["nome"=> $nome_categoria,"id_categoria"=> $id_categoria]);
}
public function delete($id_categoria){
    $sql = "DELETE FROM categoria WHERE id_categoria = :id_categoria";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id_categoria' => $id_categoria]);
}
}
?>