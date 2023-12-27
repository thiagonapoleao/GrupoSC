<?php

require_once '../../init.php';


$PDO = db_connect();
$isoDate = dateConvert($data);

// pega os dados do formuário

$data = isset($_POST['data']) ? $_POST['data'] : null;
$rota = isset($_POST['rota']) ? $_POST['rota'] : null;
$horario = isset($_POST['horario']) ? $_POST['horario'] : null;
$codigo = isset($_POST['codigoc']) ? $_POST['codigoc'] : null;
$operador = isset($_POST['operador']) ? $_POST['operador'] : null;

$isoDate = dateConvert($data);

$sql_id = "SELECT id FROM demonstrativo where data = '$isoDate' and rota = '$rota' order by rota desc";
$stmt_id = $PDO->prepare($sql_id);
$stmt_id->execute();
$id =  $stmt_id->fetchColumn();

if ($rota > 0) {
	$sql = "UPDATE demonstrativo SET comprovei = :comprovei, operador_comprovei = :operador_comprovei WHERE id = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':comprovei', $horario);
	$stmt->bindParam(':operador_comprovei', $operador);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	
	if ($stmt->execute()) {
		header('Location: ../../comprovei.php');
	} else {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
} else {
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Rota não exite, tente novamente!');
	window.location.href='../../comprovei.php';
	</script>");
}