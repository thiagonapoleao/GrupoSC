<?php

require_once '../init.php';

// pega os dados do formuário
$data = isset($_POST['data']) ? $_POST['data'] : null;
$pfat = isset($_POST['pfat']) ? $_POST['pfat'] : null;
$est = isset($_POST['estacao']) ? $_POST['estacao'] : null;
$motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null;
$estoque = isset($_POST['estoque']) ? $_POST['estoque'] : null;
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;

$estacao = substr($est, 1, 3);
$endereco = substr($est, 4, 6);

$isoDate = dateConvert($data);


	// insere no banco
	$PDOC = db_connect_conf();

	$sql = "INSERT INTO cancelados(data,  estacao, endereco, motivo, estoque, descricao) VALUES(:data,  :estacao, :endereco, :motivo, :estoque, :descricao)";
	$stmt = $PDOC->prepare($sql);
	$stmt->bindParam(':data', $isoDate);
	$stmt->bindParam(':estacao', $estacao);
	$stmt->bindParam(':endereco', $endereco);
	$stmt->bindParam(':motivo', $motivo);
	$stmt->bindParam(':estoque', $estoque);
	$stmt->bindParam(':descricao', $descricao);
	if ($stmt->execute()) {
		header('Location: cancelar.php');
	} else {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
		header('Location: cancelar.php');
	}


?>