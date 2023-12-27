<?php

require_once 'init.php';

// abre a conexão
$PDOE = db_connect_eerg();

if(isset($_POST['searchAdress'])){
    $codigo = $_POST['pfat'];

    $sql_pfat = "SELECT endereco, est, descricao  FROM curva_abc  where pfat = $codigo";
    $stmt_array_pfat = $PDOE->prepare($sql_pfat);
    $stmt_array_pfat->execute();
    $return = $stmt_array_pfat->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($return);
}