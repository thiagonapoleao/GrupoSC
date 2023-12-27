<?php

require_once 'init.php';

// abre a conexão
$PDOPORT = db_connect_port();

if(isset($_POST['searchAdress'])){
    $codigo = $_POST['cdrota'];

    $sql_cdrota = "SELECT rt, destino, meta  FROM rota  where codigo = $codigo";
    $stmt_array_cdrota = $PDOPORT->prepare($sql_cdrota);
    $stmt_array_cdrota->execute();
    $return = $stmt_array_cdrota->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($return);
}