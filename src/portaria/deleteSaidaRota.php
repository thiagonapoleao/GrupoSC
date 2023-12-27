<?php

require_once '../init.php';

// pega o ID da URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// valida o ID
if (empty($id))
{
	echo "ID não informado";
	exit;
}

// remove do banco
$PDOPORT = db_connect_port();
$sql = "DELETE FROM saida_rota WHERE id = :id";
$stmt = $PDOPORT->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute())
{
	header('Location: saida_rotas.php');	
}
else
{
	echo "Erro ao remover";
	print_r($stmt->errorInfo());
}