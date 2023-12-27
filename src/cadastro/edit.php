<?php

require_once '../init.php';

// resgata os valores do formulário
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;


// atualiza o banco
$PDO = db_connect_tratativa();
$sql = "UPDATE separadores SET codigo = :codigo, nome = :nome WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':codigo', $codigo);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
	header('Location: cadastro.php');
} else {
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}
