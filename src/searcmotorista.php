<?php

require_once 'init.php';

// abre a conexão
$PDOPORT = db_connect_port();

if(isset($_POST['searchAdress'])){
    $codigo = $_POST['cdmotorista'];

    $sql_cdmotorista = "SELECT cpf, moto, empresa  FROM motoristas  where codigo = $codigo";
    $stmt_array_cdmotorista = $PDOPORT->prepare($sql_cdmotorista);
    $stmt_array_cdmotorista->execute();
    $return = $stmt_array_cdmotorista->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($return);
}