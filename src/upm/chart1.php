<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=conf;port=3306;charset=utf8', 'root', '');

$sql = "SELECT id, hora, producao FROM pln0096rgrafico ";

$statement = $pdo->prepare($sql);

$statement->execute();

$query = $statement->fetchAll(PDO::FETCH_ASSOC);

$label = [];
$unidades = [];
$arrBackgroundColor = [];


foreach ($query as $key => $value) {
    array_push($label, $value['hora']);
    array_push($unidades, $value['producao']); 
  

    if ($value['producao'] < 15000) {
        $color = 'darkred';
    } else {
        $color = 'green';
    }
    array_push($arrBackgroundColor, $color);
}

$dataset = ['Unidades por Hora ( Meta 15.000/h )'];
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