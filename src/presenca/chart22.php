<?php

require_once '../init.php';

// abre a conexão
$PDOP = db_connect_prsc();

// SQL para selecionar os registros
$sql_arry_dataconsulta = "SELECT mes_ano FROM dataconsulta";
// seleciona os registros
$stmt_array_dataconsulta = $PDOP->prepare($sql_arry_dataconsulta);
$stmt_array_dataconsulta->execute();
$dataconsulta =  $stmt_array_dataconsulta->fetchColumn();

$array = explode("-", $dataconsulta);
$mes = $array[1];
$ano = $array[0];
$concatena_data = $mes."/".$ano;

$isoDate = dateConvert($dataconsulta);

$pdo = db_connect_prsc();

$sql = "SELECT count(setor) AS ausencia, setor FROM faltas WHERE data LIKE '%$dataconsulta%' GROUP BY setor order by ausencia asc";

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

$dataset = ['Ausências por setor referente a  '.$concatena_data];
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