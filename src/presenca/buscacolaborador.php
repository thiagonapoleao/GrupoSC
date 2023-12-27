<?php


    $pdo = new PDO('mysql:host= 127.0.0.1 ;dbname=presenca;charset=utf8', 'default', '123456');
    $dados = $pdo->prepare("SELECT * FROM ativo");
    $dados->execute();
    echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));
?>