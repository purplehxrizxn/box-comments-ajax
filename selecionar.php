<?php

header('Content-Type: application/json');

$pdo = new PDO('mysql:host=localhost; dbname=db_contacts;', 'root', '');

$stmt = $pdo->prepare('SELECT * FROM ajax_data');
$stmt->execute();

if($stmt->rowCount() >= 1){
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} else {
    echo json_encode('Falha ao realizar query!');
}