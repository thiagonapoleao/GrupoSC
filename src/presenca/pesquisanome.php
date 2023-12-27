<?php

require_once '../init.php';

$PDOP = db_connect_prsc();

$colaborador = isset($_POST['colaborador']) ? $_POST['colaborador'] : null;

// SQL para selecionar
$sql_arry_colaborador = "SELECT colaborador FROM ativo where colaborador = '$colaborador'";
// seleciona os registros
$stmt_array_colaborador = $PDOP->prepare($sql_arry_colaborador);
$stmt_array_colaborador->execute();
$nome = $stmt_array_colaborador->fetchColumn();


	if (empty($nome)) {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	} else {
        echo $nome;
        header('Location: listapresenca.php');
	}