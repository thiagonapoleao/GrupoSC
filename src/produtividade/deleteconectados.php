<?php

require_once '../init.php';


// remove do banco
$PDO = db_connect_conf();
$sql = "DELETE FROM atzconf ";
$stmt = $PDO->prepare($sql);

if ($stmt->execute())
{
	header('Location: analiseconferencia.php');	
}
else
{
	echo "Erro ao remover";
	print_r($stmt->errorInfo());
}