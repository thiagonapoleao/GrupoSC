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

$datames = $datacontabil;
$array = explode("/", $datames);
$dia = $array[0];
$mes = $array[1];
$ano = $array[2];
$concatena_data = "Mês-".$mes;
$isoDate = dateConvert($datacontabil);

$pdo = db_connect_prsc();

$sql = "SELECT count(setor) AS ausencia, setor FROM faltas WHERE data LIKE '%-$mes-%' GROUP BY setor order by ausencia asc";

$statement = $pdo->prepare($sql);

$statement->execute();

$query = $statement->fetchAll(PDO::FETCH_ASSOC);

$label = [];
$ausencia = [];
$arrBackgroundColor = 'DarkRed';


foreach ($query as $key => $value) {
    array_push($label, $value['setor']);
    array_push($ausencia, $value['ausencia']);
}

$dataset = ['Ausências por setor do Mês - '.$mes];
for ($i = 0; $i < count($dataset); $i++) {
    $datasets[$i]['label'] = $dataset[$i];
    $datasets[1]['backgroundColor'] = $arrBackgroundColor;   
   
    }   
    $arrData = $ausencia; 

    $datasets[$i]['data'] = $arrData;
    $datasets[$i]['fill'] = false;
    $datasets[$i]['type'] = 'bar';
  


$obj['labels'] = $label;
$obj['datasets'] = $datasets;

echo json_encode($obj);