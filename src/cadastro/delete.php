<?php

require_once '../init.php';

// pega o ID da URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// valida o ID
if (empty($id)) {
	echo "ID não informado";
	exit;
}

// remove do banco
$PDO = db_connect_tratativa();
$sql = "DELETE FROM separadores WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
	header('Location: cadastro.php');
} else {
	echo "Erro ao remover";
	print_r($stmt->errorInfo());
}
