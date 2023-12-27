<?php

require_once '../init.php';

// abre a conexão
$PDOD = db_connect();

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();
$isoDate = dateConvert($datacontabil);

$pdo = new PDO('mysql:host=127.0.0.1;dbname=conf;port=3306;charset=utf8', 'default', '123456');

$sql = "SELECT data, hora, unidades FROM produtividade_hora where data = '$isoDate' order by id asc";

$statement = $pdo->prepare($sql);

$statement->execute();

$query = $statement->fetchAll(PDO::FETCH_ASSOC);

$label = [];
$unidades = [];
$arrBackgroundColor = [];


foreach ($query as $key => $value) {
    array_push($label, $value['hora']);
    array_push($unidades, number_format($value['unidades'], 0, ',', '.'));
    $color = 'green';
    array_push($arrBackgroundColor, $color);
}

$dataset = [dateConvert($value['data']) . ' - Tempo x Relatorio '   ];
for ($i = 0; $i < count($dataset); $i++) {
    $datasets[$i]['label'] = $dataset[$i];
    $datasets[$i]['backgroundColor'] = $arrBackgroundColor;   
   
 
    $arrData = $unidades; 

    $datasets[$i]['data'] = $arrData;
    $datasets[$i]['fill'] = false;
    $datasets[$i]['type'] = 'bar';
}   

$obj['labels'] = $label;
$obj['datasets'] = $datasets;

echo json_encode($obj);