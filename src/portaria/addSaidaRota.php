<?php

require_once '../init.php';


$PDOPORT = db_connect_port();


// pega os dados do formuário

$data = isset($_POST['data']) ? $_POST['data'] : null;
$cdrota = isset($_POST['cdrota']) ? $_POST['cdrota'] : null;
$saida = isset($_POST['horario']) ? $_POST['horario'] : null;
$cdmotorista = isset($_POST['cdmotorista']) ? $_POST['cdmotorista'] : null;
$cdveiculo = isset($_POST['cdveiculo']) ? $_POST['cdveiculo'] : null;
$meta = isset($_POST['meta']) ? $_POST['meta'] : null;



$sql_rota = "SELECT rt FROM rota where codigo = $cdrota";
$stmt_array_rota = $PDOPORT->prepare($sql_rota);
$stmt_array_rota->execute();
$rota = $stmt_array_rota->fetchColumn();

$sql_destino = "SELECT destino FROM rota where codigo = $cdrota";
$stmt_array_destino = $PDOPORT->prepare($sql_destino);
$stmt_array_destino->execute();
$destino = $stmt_array_destino->fetchColumn();

$sql_meta = "SELECT meta FROM rota where codigo = $cdrota";
$stmt_array_meta = $PDOPORT->prepare($sql_meta);
$stmt_array_meta->execute();
$meta = $stmt_array_meta->fetchColumn();

$sql_motorista = "SELECT moto FROM motoristas where codigo = $cdmotorista";
$stmt_array_motorista = $PDOPORT->prepare($sql_motorista);
$stmt_array_motorista->execute();
$motorista = $stmt_array_motorista->fetchColumn();

$sql_placa = "SELECT placa FROM veiculos where codigo = $cdveiculo";
$stmt_array_placa = $PDOPORT->prepare($sql_placa);
$stmt_array_placa->execute();
$placa = $stmt_array_placa->fetchColumn();

// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($data);

// insere no banco
$PDOPORT = db_connect_port();

	$sql = "INSERT INTO saida_rota(data, rt, destino, saida, moto, placa, meta) VALUES(:data, :rt, :destino, :saida, :moto, :placa, :meta)";
	$stmt = $PDOPORT->prepare($sql);
	$stmt->bindParam(':data', $isoDate);
	$stmt->bindParam(':rt', $rota);
	$stmt->bindParam(':destino', ucwords($destino));
	$stmt->bindParam(':saida', $saida);
	$stmt->bindParam(':moto', ucwords($motorista));	
	$stmt->bindParam(':placa', ucwords($placa));
    $stmt->bindParam(':meta', $meta);
	
	if ($stmt->execute()) {
        header('Location: saida_rotas.php');
	} else {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('print_r($stmt->errorInfo());');
		window.location.href='saida_rotas.php';
		</script>");
	
	}
