<?php

require_once '../init.php';

// abre a conexão
$PDOD = db_connect();
$PDOP = db_connect_prsc();


// SQL para selecionar os registros
$sql_arry_data_resumo = "SELECT data FROM resumo order by data desc";
// seleciona os registros
$stmt_array_data_resumo = $PDOP->prepare($sql_arry_data_resumo);
$stmt_array_data_resumo->execute();
$dataresumo =  $stmt_array_data_resumo->fetchColumn();


// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

$datames = $dataresumo;
$array = explode("-", $datames);
$dia = $array[2];
$mes = $array[1];
$ano = $array[0];
$concatena_data = "Mês-".$mes;
$isoDate = dateConvert($dataresumo);

$pdo = db_connect_prsc();

$sql = "SELECT count(setor) AS ausencia, setor FROM faltas WHERE data LIKE '%$mes-$dia%' GROUP BY setor order by ausencia asc";

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

$dataset = ['Ausências por setor do Dia - '.$isoDate];
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