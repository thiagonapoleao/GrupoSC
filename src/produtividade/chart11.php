<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=conf;port=3306;charset=utf8', 'default', '123456');

$sql = "SELECT id, hora, producao, meta FROM pln0048rgrafico ";

$statement = $pdo->prepare($sql);

$statement->execute();

$query = $statement->fetchAll(PDO::FETCH_ASSOC);

$label = [];
$unidades = [];
$meta = [];
$arrBackgroundColor = [];


foreach ($query as $key => $value) {
    array_push($label, $value['hora']);
    array_push($unidades, $value['producao']); 
    array_push($meta, $value['meta']); 
  

    if ($value['producao'] < $value['meta']) {
        $color = 'red';      
    } else {
        $color = 'green';       
    }
    array_push($arrBackgroundColor, $color);
}

$dataset = ['Volumes', 'Meta'];
for ($i = 0; $i < count($dataset); $i++) {
    $datasets[$i]['label'] = $dataset[$i];
    $datasets[$i]['backgroundColor'] = $arrBackgroundColor;   
    
    if ($i == 0) {
        $arrData = $unidades;
    } else  {
        $arrData = $meta;      
    }

    $datasets[$i]['data'] = $arrData;
    $datasets[$i]['fill'] = false;
    $datasets[$i]['type'] = 'bar';
    if ($i == 1) {
        $datasets[$i]['borderWidth'] = 1;
        $datasets[$i]['borderColor'] = 'DarkRed';       
        $datasets[$i]['type'] = 'line'; 
    }
   
}

$obj['labels'] = $label;
$obj['datasets'] = $datasets;

echo json_encode($obj);