<?php

session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';
$PDOA = db_connect_acesso();
$PDO = db_connect_conf();
$PDOD = db_connect();

echo 'Grafico';

$hora = $_SESSION['hora'];

$hora_atz = date('H:i');

//meta
$sql_meta = "SELECT sum(meta) FROM monitorapedidao where h1 > 30";
$stmt_meta = $PDO->prepare($sql_meta);
$stmt_meta->execute();
$meta = $stmt_meta->fetchColumn();

$sql_0048_1 = "SELECT count(qtd) FROM pln0048r'".$hora."' ";
$stmt_0048_1 = $PDO->prepare($sql_0048_1);
$stmt_0048_1->execute();
$plng1= $stmt_0048_1->fetchColumn(); 

$sql = 'INSERT INTO pln0048rgrafico (hora, producao, meta) value("'.$hora_atz.'", "'.$plng1.'", "'.$meta.'")';
$stmt = $PDO->prepare($sql);

	
		if ($stmt->execute()) {		
			echo ("<script LANGUAGE='JavaScript'>
			window.alert('Grafico!');
			window.location.href='analisepedidao.php';
			</script>");
		} else {
			echo "Erro ao cadastrar";
			print_r($stmt->errorInfo());
		}
	