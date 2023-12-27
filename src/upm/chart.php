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

$pdo = new PDO('mysql:host=10.16.0.79;dbname=tratativa;port=3306;charset=utf8', 'default', '123456');

$sql = "SELECT horasG, horasD, upm, errosT, difErros, meta FROM upm_hora where data = '$isoDate' order by id ASC";

$statement = $pdo->prepare($sql);

$statement->execute();

$query = $statement->fetchAll(PDO::FETCH_ASSOC);

$label = [];
$upm = [];
$erros = [];
$difErros = [];
$meta = [];
$arrBackgroundColor = [];


foreach ($query as $key => $value) {
    array_push($label, $value['horasD']);
    array_push($upm, $value['upm']);
    array_push($erros, $value['errosT']);
    array_push($difErros, $value['difErros']);
    array_push($meta, $value['meta']);

    if ($value['upm'] > $value['meta']) {
        $color = 'red';
    } else {
        $color = 'green';
    }
    array_push($arrBackgroundColor, $color);
}

$dataset = ['Dif Erros', 'Total Erros ', 'UPM',  'Meta'];
for ($i = 0; $i < count($dataset); $i++) {
    $datasets[$i]['label'] = $dataset[$i];

    $datasets[$i]['backgroundColor'] = $arrBackgroundColor;
    if ($i == 0) {
        $datasets[$i]['backgroundColor'] = 'Yellow';
    } else if ($i == 1) {
        $datasets[$i]['backgroundColor'] = 'DarkRed';
    }

    if ($i == 0) {
        $arrData = $difErros;
    } else if ($i == 1) {
        $arrData = $erros;
    } else if ($i == 2) {
        $arrData = $upm;
    } else {
        $arrData = $meta;
    }
    
    $datasets[$i]['data'] = $arrData;
    $datasets[$i]['fill'] = false;
    $datasets[$i]['type'] = 'bar';
    if ($i == 3) {
        $datasets[$i]['borderWidth'] = 3;
        $datasets[$i]['borderColor'] = 'DarkRed';
        $datasets[$i]['type'] = 'line';
    }
}

$obj['labels'] = $label;
$obj['datasets'] = $datasets;

echo json_encode($obj);
