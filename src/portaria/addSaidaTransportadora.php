<?php

require_once '../init.php';


$PDOPORT = db_connect_port();


// pega os dados do formuário

$data = isset($_POST['data']) ? $_POST['data'] : null;
$saida = isset($_POST['horario']) ? $_POST['horario'] : null;
$cdmotorista = isset($_POST['cdmotorista']) ? $_POST['cdmotorista'] : null;
$cdveiculo = isset($_POST['cdveiculo']) ? $_POST['cdveiculo'] : null;
$obs = isset($_POST['obs']) ? $_POST['obs'] : null;
$vigilante = isset($_POST['vigilante']) ? $_POST['vigilante'] : null;


$sql_motorista = "SELECT moto FROM motoristas where codigo = $cdmotorista";
$stmt_array_motorista = $PDOPORT->prepare($sql_motorista);
$stmt_array_motorista->execute();
$motorista = $stmt_array_motorista->fetchColumn();

$sql_empresa = "SELECT Empresa FROM motoristas where codigo = $cdmotorista";
$stmt_array_empresa = $PDOPORT->prepare($sql_empresa);
$stmt_array_empresa->execute();
$empresa = $stmt_array_empresa->fetchColumn();

$sql_placa = "SELECT placa FROM veiculos where codigo = $cdveiculo";
$stmt_array_placa = $PDOPORT->prepare($sql_placa);
$stmt_array_placa->execute();
$placa = $stmt_array_placa->fetchColumn();

// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($data);

// insere no banco
$PDOPORT = db_connect_port();

	$sql = "INSERT INTO saida_transportadora(data, codigomotorista, nome, saida, empresa, placa, obs, vigilante) VALUES(:data, :codigomotorista, :nome, :saida, :empresa, :placa, :obs, :vigilante)";
	$stmt = $PDOPORT->prepare($sql);
	$stmt->bindParam(':data', $isoDate);
	$stmt->bindParam(':codigomotorista', $codigomotorista);
	$stmt->bindParam(':nome', ucwords($motorista));
	$stmt->bindParam(':saida', $saida);
	$stmt->bindParam(':empresa', ucwords($empresa));	
	$stmt->bindParam(':placa', ucwords($placa));
    $stmt->bindParam(':obs', ucwords($obs));
	$stmt->bindParam(':vigilante', ucwords($vigilante));
	
	if ($stmt->execute()) {
        header('Location: saida_transportadora.php');
	} else {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('print_r($stmt->errorInfo());');
		window.location.href='saida_transportadora.php';
		</script>");
	
	}
