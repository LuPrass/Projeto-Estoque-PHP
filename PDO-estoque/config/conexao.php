<?php
$host = 'localhost';
$dbname = 'estoque';
$username = 'root';
$password = '';

try{
    $pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
} catch(PDOException $e){
    echo "Erro na conexão: " . $e->getMessage();
}

?>