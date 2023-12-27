<?php

require_once '../init.php';


$PDOPORT = db_connect_port();


// pega os dados do formuário

$data = isset($_POST['data']) ? $_POST['data'] : null;
$entrada = isset($_POST['horario']) ? $_POST['horario'] : null;
$placa = isset($_POST['placa']) ? $_POST['placa'] : null;
$motorista = isset($_POST['motorista']) ? $_POST['motorista'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$ajudante = isset($_POST['ajudante']) ? $_POST['ajudante'] : null;
$cpf2 = isset($_POST['cpf2']) ? $_POST['cpf2'] : null;
$obs = isset($_POST['obs']) ? $_POST['obs'] : null;
$empresa = isset($_POST['empresa']) ? $_POST['empresa'] : null;
$vigilante = isset($_POST['vigilante']) ? $_POST['vigilante'] : null;

$rest0 = substr($placa, 0, -4);
$rest1 = substr($placa, 3);
$novaPlaca = $rest0 ."-". $rest1;

// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($data);

// insere no banco
$PDOPORT = db_connect_port();

	$sql = "INSERT INTO entrada_veiculo(data, nome, cpf, nome1, cpf1, entrada, empresa, placa, obs, vigilante) VALUES(:data, :nome, :cpf, :nome1, :cpf1, :entrada, :empresa, :placa, :obs, :vigilante)";
	$stmt = $PDOPORT->prepare($sql);
	$stmt->bindParam(':data', $data);
	$stmt->bindParam(':cpf', $cpf);
	$stmt->bindParam(':nome', ucwords($motorista));
	$stmt->bindParam(':cpf1', $cpf2);
	$stmt->bindParam(':nome1', ucwords($ajudante));
	$stmt->bindParam(':entrada', $entrada);
	$stmt->bindParam(':empresa', ucwords($empresa));	
	$stmt->bindParam(':placa', strtoupper($novaPlaca));
    $stmt->bindParam(':obs', ucwords($obs));
	$stmt->bindParam(':vigilante', ucwords($vigilante));
	
	if ($stmt->execute()) {
        header('Location: entrada_recebimento.php');
	} else {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('print_r($stmt->errorInfo());');
		window.location.href='entrada_recebimento.php';
		</script>");
	
	}
