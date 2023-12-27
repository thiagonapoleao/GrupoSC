<?php

require_once 'init.php';

// abre a conexão
$PDO = db_connect();

if(isset($_POST['searchAdress'])){
    $codigo = $_POST['codigo'];

    $sql_separador = "SELECT nome FROM operador where codigo = $codigo";
    $stmt_array_separador = $PDO->prepare($sql_separador);
    $stmt_array_separador->execute();
    $return = $stmt_array_separador->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($return);
}