<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GI - Gestão Integrada</title>
    <link rel="stylesheet" type="text/css" href="../css/stilo.css">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width" scale="1">
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <!-- Adicionando JQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>

</head>

<body
    style="background-image: url('../img/logo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
    <header>

    </header>
</body>

</html>



<?php
 
sleep(3);
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

$PDO = db_connect_conf();
$PDOD = db_connect();
$PDOO = db_connect_acesso();

$hora = $_SESSION['hora'];

$sql_del = "DELETE FROM monitorapedidao";
$stmt_del = $PDO->prepare($sql_del);
$stmt_del->execute();

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

// SQL para selecionar os registros
$sql_arry_user = "SELECT user, nome FROM login ";
// seleciona os registros
$stmt_array_user = $PDOO->prepare($sql_arry_user);
$stmt_array_user->execute();

$convdatacontabil = dateConvert($datacontabil);

while ($analise = $stmt_array_user->fetch(PDO::FETCH_ASSOC)) :

$sql_arry_h01 = "SELECT  count(qtd) As Total FROM pln0048r1 where conferente =  '".$analise['user']."' ";
$stmt_array_h01 = $PDO->prepare($sql_arry_h01);
$stmt_array_h01->execute();
$h01 =  $stmt_array_h01->fetchColumn();

$sql_arry_h02 = "SELECT  count(qtd) As Total FROM pln0048r2 where conferente = '".$analise['user']."' ";
$stmt_array_h02 = $PDO->prepare($sql_arry_h02);
$stmt_array_h02->execute();
$h02 =  $stmt_array_h02->fetchColumn();

$sql_arry_h03 = "SELECT  count(qtd) As Total FROM pln0048r3 where conferente = '".$analise['user']."' ";
$stmt_array_h03 = $PDO->prepare($sql_arry_h03);
$stmt_array_h03->execute();
$h03 =  $stmt_array_h03->fetchColumn();

$sql_arry_h04 = "SELECT  count(qtd) As Total FROM pln0048r4 where conferente = '".$analise['user']."' ";
$stmt_array_h04 = $PDO->prepare($sql_arry_h04);
$stmt_array_h04->execute();
$h04 =  $stmt_array_h04->fetchColumn();

$sql_arry_h05 = "SELECT  count(qtd) As Total FROM pln0048r5 where conferente = '".$analise['user']."' ";
$stmt_array_h05 = $PDO->prepare($sql_arry_h05);
$stmt_array_h05->execute();
$h05 =  $stmt_array_h05->fetchColumn();

$sql_arry_h06 = "SELECT  count(qtd) As Total FROM pln0048r6 where conferente = '".$analise['user']."' ";
$stmt_array_h06 = $PDO->prepare($sql_arry_h06);
$stmt_array_h06->execute();
$h06 =  $stmt_array_h06->fetchColumn();

$sql_arry_h07 = "SELECT  count(qtd) As Total FROM pln0048r7 where conferente = '".$analise['user']."' ";
$stmt_array_h07 = $PDO->prepare($sql_arry_h07);
$stmt_array_h07->execute();
$h07 =  $stmt_array_h07->fetchColumn();

$sql_arry_h08 = "SELECT  count(qtd) As Total FROM pln0048r8 where conferente = '".$analise['user']."' ";
$stmt_array_h08 = $PDO->prepare($sql_arry_h08);
$stmt_array_h08->execute();
$h08 =  $stmt_array_h08->fetchColumn();

$sql_arry_h09 = "SELECT  count(qtd) As Total FROM pln0048r9 where conferente = '".$analise['user']."' ";
$stmt_array_h09 = $PDO->prepare($sql_arry_h09);
$stmt_array_h09->execute();
$h09 =  $stmt_array_h09->fetchColumn();

$sql_arry_h10 = "SELECT  count(qtd) As Total FROM pln0048r10 where conferente = '".$analise['user']."' ";
$stmt_array_h10 = $PDO->prepare($sql_arry_h10);
$stmt_array_h10->execute();
$h10 =  $stmt_array_h10->fetchColumn();

$sql_arry_h11 = "SELECT  count(qtd) As Total FROM pln0048r11 where conferente = '".$analise['user']."' ";
$stmt_array_h11 = $PDO->prepare($sql_arry_h11);
$stmt_array_h11->execute();
$h11 =  $stmt_array_h11->fetchColumn();




	if($h02 >= $h01) {
		$conf2 = $h02-$h01;
	} else {
		$conf2 = $h02;
	}
	if($h03 >= $h02){
		$conf3 = $h03-$h02;
	} else {
		$conf3 = $h03;
	}
	if($h04 >= $h03){
		$conf4 = $h04-$h03;
	} else {
		$conf4 = $h04;
	}
	if($h05 >= $h04){
		$conf5 = $h05-$h04;
	} else {
		$conf5 = $h05;
	}
	if($h06 >= $h05){
		$conf6 = $h06-$h05;
	} else {
		$conf6 = $h06;
	}
	if($h07 >= $h06){
		$conf7 = $h07-$h06;
	} else {
		$conf7 = $h07;
	}
	if($h08 >= $h07){
		$conf8 = $h08-$h07;
	} else {
		$conf8 = $h08;
	}
	if($h09 >= $h08){
		$conf9 = $h09-$h08;
	} else {
		$conf9 = $h09;
	}
	if($h10 >= $h09){
		$conf10 = $h10-$h09;
	} else {
		$conf10 = $h10;
	}
	if($h11 >= $h10){
		$conf11 = $h11-$h10;
	} else {
		$conf11 = $h11;
	}


	
	if((int)$h01 > 50){
		$contmediah1 = 1;
	} else {
		$contmediah1 = 0;
	}
	if((int)$conf2 > 50){
		$contmediah2 = 1;
	} else {
		$contmediah2 = 0;
	}
	if((int)$conf3 > 50){
		$contmediah3 = 1;
	} else {
		$contmediah3 = 0;
	}
	if((int)$conf4 > 50){
		$contmediah4 = 1;
	} else {
		$contmediah4 = 0;
	}
	if((int)$conf5 > 50){
		$contmediah5 = 1;
	} else {
		$contmediah5 = 0;
	}
	if((int)$conf6 > 50){
		$contmediah6 = 1;
	} else {
		$contmediah6 = 0;
	}
	if((int)$conf7 > 50){
		$contmediah7 = 1;
	} else {
		$contmediah7 = 0;
	}
	if((int)$conf8 > 50){
		$contmediah8 = 1;
	} else {
		$contmediah8 = 0;
	}
	if((int)$conf9 > 50){
		$contmediah9 = 1;
	} else {
		$contmediah9 = 0;
	}
	if((int)$conf10 > 50){
		$contmediah10 = 1;
	} else {
		$contmediah10 = 0;
	}
	if((int) $conf11 > 50){
		$contmediah11 = 1;
	} else {
		$contmediah11 = 0;
	}

	$contmedia = $contmediah1 + $contmediah2 +  $contmediah3 + $contmediah4 + $contmediah5 + $contmediah6 + $contmediah7 + $contmediah8 + $contmediah9 + $contmediah10 + $contmediah11; 
	$total = $h01 + $conf2 + $conf3 + $conf4 + $conf5 + $conf6 + $conf7 + $conf8 + $conf9 + $conf10 + $conf11;


	if($contmedia > 0){
		$media = round($total / $contmedia);
	} else {
		$media = 0;
	}

	$metagrupo = 160;

	$porcen = (int)round($media) / (int)$metagrupo ;
	$nome = strtoupper($analise['nome']);

	$isoDate = dateConvert($datacontabil);
	$hora_atz = date('H:i:s');

	if($total > 0 ){
		$sql = "INSERT INTO monitorapedidao (data, codigo, nome, tipo, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total, media, meta,  porcen, hora) value(:data, :codigo, :nome, :tipo, :h1, :h2, :h3, :h4, :h5, :h6, :h7, :h8, :h9, :h10, :h11, :total, :media, :meta, :porcen, :hora )";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':data', $isoDate);	
		$stmt->bindParam(':codigo', $analise['user']);
		$stmt->bindParam(':nome',$analise['nome']);
		$stmt->bindParam(':tipo',  $analise['nome']);
		$stmt->bindParam(':h1', $h01);
		$stmt->bindParam(':h2', $conf2);
		$stmt->bindParam(':h3', $conf3);
		$stmt->bindParam(':h4', $conf4);
		$stmt->bindParam(':h5', $conf5);
		$stmt->bindParam(':h6', $conf6);
		$stmt->bindParam(':h7', $conf7);
		$stmt->bindParam(':h8', $conf8);
		$stmt->bindParam(':h9', $conf9);
		$stmt->bindParam(':h10', $conf10);
		$stmt->bindParam(':h11', $conf11);
		$stmt->bindParam(':total', $total);
		$stmt->bindParam(':meta', $metagrupo);
		$stmt->bindParam(':media', $media);
		$stmt->bindParam(':porcen', $porcen);	
		$stmt->bindParam(':hora', $hora_atz);	
		$stmt->execute();
	} 	


endwhile;

echo ("<script LANGUAGE='JavaScript'>
window.alert('Arquivo salvo com sucesso!');
window.location.href='analisepedidao.php';
</script>");


 