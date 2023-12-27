<?php

require_once '../init.php';

$datalista = isset($_POST['datalista']) ? $_POST['datalista'] : null;

$PDOP = db_connect_prsc();

$sql_dell = "DELETE FROM dataconsulta";
$stmt_dell = $PDOP->prepare($sql_dell);
$stmt_dell->execute();

$sql = "INSERT INTO dataconsulta(mes_ano) VALUES(:mes_ano)";
$stmt = $PDOP->prepare($sql);
$stmt->bindParam(':mes_ano', $datalista);

if ($stmt->execute()) {
	header('Location: listapresenca-mes.php');
} else {
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Erro de consulta, tentar novamente!!');
	window.location.href='listapresenca-mes.php';
	</script>");
}