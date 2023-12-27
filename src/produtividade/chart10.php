<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=conf;port=3306;charset=utf8', 'default', '123456');

$sql = "SELECT id, hora, linha, conferencia FROM pln0096rproducao ";

$statement = $pdo->prepare($sql);

$statement->execute();

$query = $statement->fetchAll(PDO::FETCH_ASSOC);

$label = [];
$linha = [];
$conferencia = [];
$arrBackgroundColor = [];


foreach ($query as $key => $value) {
    array_push($label, $value['hora']);
    array_push($linha, $value['linha']); 
    array_push($conferencia, $value['conferencia']); 
  

 /*   if ($value['linha'] < 13000) {
        $color = 'red';    
    } else {
        $color = 'green';
    }
    if ($value['conferencia'] < 13000) {
        $color1 = 'DarkRed';
    } else {
        $color1 = 'green';
    }

    array_push($arrBackgroundColor, $color, $color1);
    */
}

$dataset = ['Linha', 'Conferencia'];
for ($i = 0; $i < count($dataset); $i++) {
    $datasets[$i]['label'] = $dataset[$i];
    $datasets[$i]['backgroundColor'] = $arrBackgroundColor;   
    
    if ($i == 0) {
        $arrData = $linha;
    } else  {
        $arrData = $conferencia;      
    }
    $datasets[$i]['data'] = $arrData;
    $datasets[$i]['fill'] = false;
    $datasets[$i]['type'] = 'bar';
    $datasets[$i]['backgroundColor'] = 'RoyalBlue';   
   
   
    if ($i == 1) {
        $datasets[$i]['borderWidth'] = 1;
      //  $datasets[$i]['borderColor'] = 'DarkRed';       
        $datasets[$i]['type'] = 'bar'; 
        $datasets[$i]['backgroundColor'] = 'OrangeRed';  
    }
    
   
}


$obj['labels'] = $label;
$obj['datasets'] = $datasets;

echo json_encode($obj);