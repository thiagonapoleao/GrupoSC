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



$pdo = db_connect_prsc();

$sql = "SELECT data, falta, atestado, afastamento, covid, maiscedo, advertencia, suspensao, trabalhoexterno, demissao, total FROM resumo where data = '$dataresumo' ";

$statement = $pdo->prepare($sql);

$statement->execute();

$query = $statement->fetchAll(PDO::FETCH_ASSOC);

$label = [];
$falta = [];
$atestado = [];
$afastamento = [];
$covid = [];
$maiscedo = [];
$advertencia = [];
$suspensao = [];
$trabalhoexterno = [];
$demissao = [];
$total = [];
$arrBackgroundColor = [];


foreach ($query as $key => $value) {
    $isoDate = dateConvert($value['data']);
    array_push($label,'Ausências por motivo do dia '. $isoDate );
    array_push($falta, $value['falta']);
    array_push($atestado, $value['atestado']);
    array_push($afastamento, $value['afastamento']);
    array_push($covid, $value['covid']);
    array_push($maiscedo, $value['maiscedo']);
    array_push($demissao, $value['demissao']);
    array_push($advertencia, $value['advertencia']);
    array_push($suspensao, $value['suspensao']);
    array_push($trabalhoexterno, $value['trabalhoexterno']);
    array_push($total, $value['total']);
    
   
    
}

$dataset = ['Falta', 'Atestado', 'Afatamento ', 'Covid-19',  'Embora + Cedo', 'Demissão', 'Advertencia', 'Suspensão', 'Trabalho Ex.', 'Total'];
for ($i = 0; $i < count($dataset); $i++) {
    $datasets[$i]['label'] = $dataset[$i];

    $datasets[$i]['backgroundColor'] = $arrBackgroundColor;
    if ($i == 0) {
        $datasets[$i]['backgroundColor'] = 'DarkGray';
    } else if ($i == 1) {
        $datasets[$i]['backgroundColor'] = 'SteelBlue';
    } else if ($i == 2) {
        $datasets[$i]['backgroundColor'] = 'DarkCyan';
    } else if ($i == 3) {
        $datasets[$i]['backgroundColor'] = 'red';
    } else if ($i == 4) {
        $datasets[$i]['backgroundColor'] = 'Goldenrod';
    } else if ($i == 5) {
        $datasets[$i]['backgroundColor'] = 'black';
    } else if ($i == 6) {
        $datasets[$i]['backgroundColor'] = 'DarkSalmon';
    } else if ($i == 7) {
        $datasets[$i]['backgroundColor'] = 'OrangeRed';
    } else if ($i == 8) {
        $datasets[$i]['backgroundColor'] = 'Gold';
    }  else if ($i == 9) {
        $datasets[$i]['backgroundColor'] = 'DarkRed';
    } 

    if ($i == 0) {
        $arrData = $falta;
    } else if ($i == 1) {
        $arrData = $atestado;
    } else if ($i == 2) {
        $arrData = $afastamento;
    }  else if ($i == 3) {
        $arrData = $covid;
    } else if ($i == 4) {
        $arrData = $maiscedo;
    } else if ($i == 5) {
        $arrData = $demissao;
    } else if ($i == 6) {
        $arrData = $advertencia;
    } else if ($i == 7) {
        $arrData = $suspensao;
    } else if ($i == 8) {
        $arrData = $trabalhoexterno;
    } else  {
        $arrData = $total;
    } 

    $datasets[$i]['data'] = $arrData;

    $datasets[$i]['fill'] = false;
    $datasets[$i]['type'] = 'bar';
  
}

$obj['labels'] = $label;
$obj['datasets'] = $datasets ;

echo json_encode($obj);