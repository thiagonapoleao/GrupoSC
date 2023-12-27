<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

// resgata os valores do formulário
$data = isset($_POST['data']) ? $_POST['data'] : null;
$motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null;
$colaborador = isset($_POST['colaborador']) ? $_POST['colaborador'] : null;
$obs = isset($_POST['obs']) ? $_POST['obs'] : null;
$justificativa = isset($_POST['justificativa']) ? $_POST['justificativa'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;


// atualiza o banco
$PDO = db_connect_prsc();
	$sql = "UPDATE faltas SET data = :data, colaborador = :colaborador, motivo = :motivo, obs = :obs, justificativa = :justificativa WHERE id = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':data', $data);
	$stmt->bindParam(':colaborador', $colaborador);
	$stmt->bindParam(':motivo', $motivo);
	$stmt->bindParam(':obs', $obs);
	$stmt->bindParam(':justificativa', $justificativa);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	
	if ($stmt->execute()) {
			header('Location: listapresenca.php');
	} else {
		echo "Erro ao alterar";
		print_r($stmt->errorInfo());
	}



?>