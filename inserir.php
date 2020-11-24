<?php

header('Content-Type: application/json');

$name = $_POST['name'];
$comment = $_POST['comment'];

$pdo = new PDO('mysql:host=localhost; dbname=db_contacts;', 'root', '');

$stmt = $pdo->prepare('INSERT INTO ajax_data (nome, comentario) VALUES (:na, :co)');
$stmt->bindValue(':na', $name);
$stmt->bindValue(':co', $comment);
$stmt->execute();

if($stmt->rowCount() >= 1){
    echo json_encode('Comentário salvo!');
} else {
    echo json_encode('Error!');
}