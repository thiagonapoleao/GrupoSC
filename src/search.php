<?php

require_once 'init.php';

// abre a conexão
$PDO = db_connect();


if(isset($_POST['searchAdress'])){
    $rota = $_POST['rota'];

    $sql_rota = "SELECT codigo FROM placas where rota = $rota";
    $stmt_array_rota = $PDO->prepare($sql_rota);
    $stmt_array_rota->execute();
    $return = $stmt_array_rota->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($return);
}
