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
$PDOC = db_connect_conf();
$sql = "DELETE FROM cancelados WHERE id = :id";
$stmt = $PDOC->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute())
{
	header('Location: cancelar.php');	
}
else
{
	echo "Erro ao remover";
	print_r($stmt->errorInfo());
}