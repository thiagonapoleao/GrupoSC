<?php

require_once '../../init.php';


$PDO = db_connect();


// pega os dados do formuário

$data = isset($_POST['data']) ? $_POST['data'] : null;
$rota = isset($_POST['rota']) ? $_POST['rota'] : null;
$liberada = isset($_POST['horario']) ? $_POST['horario'] : null;
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : null;

$isoDate = dateConvert($data);

$sql_operador_laser = "SELECT nome FROM operador where codigo = $codigo";
$stmt_array_operador_laser = $PDO->prepare($sql_operador_laser);
$stmt_array_operador_laser->execute();
$operador_laser = $stmt_array_operador_laser->fetchColumn();

$sql_id = "SELECT id FROM demonstrativo where data = '$isoDate' and rota = '$rota' order by id desc, rota desc  ";
$stmt_id = $PDO->prepare($sql_id);
$stmt_id->execute();
$id =  $stmt_id->fetchColumn();


$sql_liberacaocpd = "SELECT liberacaocpd FROM demonstrativo where data = '$isoDate'";
$stmt_liberacaocpd = $PDO->prepare($sql_liberacaocpd);
$stmt_liberacaocpd->execute();
$liberacaocpd =  $stmt_liberacaocpd->fetchColumn();

// insere no banco
$PDO = db_connect();
if ($rota > 0) {
	$sql = "UPDATE demonstrativo SET data = :data, fim_impressao = :fim_impressao,tempo_impr= :tempo_impr, operador_laser = :operador_laser WHERE id = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':data', $isoDate);
	$stmt->bindParam(':fim_impressao', $liberada);	
	$stmt->bindParam(':tempo_impr', $diff);	
	$stmt->bindParam(':operador_laser', $operador_laser);	
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	if ($stmt->execute()) {
        header('Location: ../../impressaolaser.php');
	} else {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
} else {
	header('Location: ../../impressaolaser.php');
}