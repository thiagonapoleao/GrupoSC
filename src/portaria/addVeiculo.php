<?php

require_once '../init.php';


$PDOPORT = db_connect_port();

// pega os dados do formuário
$placa = isset($_POST['placa']) ? $_POST['placa'] : null;
$transportadora = ucwords(isset($_POST['transportadora'])) ? $_POST['transportadora'] : null;

$rest0 = substr($placa, 0, -4);
$rest1 = substr($placa, 3);
$novaPlaca = $rest0 ."-". $rest1;

// SQL para selecionar os registros
$sql_arry = "SELECT codigo FROM veiculos GROUP BY codigo desc ";
// seleciona os registros
$stmt_array = $PDOPORT->prepare($sql_arry);
$stmt_array->execute();
$ultimo_codigo = $stmt_array->fetchColumn();

$novo_codigo = $ultimo_codigo + 1;


if (empty($placa) || empty($transportadora)) {
	echo "Erro ao cadastrar";
} else {
	$sql_count = "select count(*) placa from veiculos where placa = '" . $novaPlaca. "' ";
	$stmt_count = $PDOPORT->prepare($sql_count);
	$stmt_count->execute();
	$total = $stmt_count->fetchColumn();
	if ($total == 1)
	{
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Veiculo já cadastrado, tente novamente!');
		window.location.href='cadastro_veiculo.php';
		</script>");
	}
	else
	{
	// insere no banco
	$sql = "INSERT INTO veiculos(codigo, placa, transportadora) VALUES(:codigo, :placa, :transportadora)";
	$stmt = $PDOPORT->prepare($sql);
	$stmt->bindParam(':codigo', $novo_codigo);
	$stmt->bindParam(':placa', ucwords($novaPlaca));
	$stmt->bindParam(':transportadora', ucwords($transportadora));	
	if ($stmt->execute()) {
		header('Location: cadastro_veiculo.php');
	} else {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
		header('Location: cadastro.php');
	}
	}
	
	
}
