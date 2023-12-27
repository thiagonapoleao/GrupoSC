<?php

require_once '../../init.php';


$PDO = db_connect();


// pega os dados do formuário
$rota = isset($_POST['rota']) ? $_POST['rota'] : null;
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : null;
$placa = isset($_POST['placa']) ? $_POST['placa'] : null;
$motorista = isset($_POST['motorista']) ? $_POST['motorista'] : null;
$transportadora = isset($_POST['transportadora']) ? $_POST['transportadora'] : null;

$sql_id = "SELECT id FROM placas where rota = '$rota'";
$stmt_id = $PDO->prepare($sql_id);
$stmt_id->execute();
$id =  $stmt_id->fetchColumn();


// insere no banco
$PDO = db_connect();
if ($rota > 0) {
	$sql = "UPDATE placas SET codigo = :codigo, placa = :placa, motorista= :motorista, transportadora = :transportadora WHERE id = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':codigo', $codigo);
	$stmt->bindParam(':placa', $placa);	
	$stmt->bindParam(':motorista', $motorista);	
	$stmt->bindParam(':transportadora', $transportadora);	
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	if ($stmt->execute()) {
        header('Location: ../../transportadoras.php');
	} else {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
} else {
	header('Location: ../../transportadoras.php');
}
