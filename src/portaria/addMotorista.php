<?php

require_once '../init.php';


$PDOPORT = db_connect_port();

// pega os dados do formuário
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$nome = ucwords(isset($_POST['nome'])) ? $_POST['nome'] : null;
$empresa = ucwords(isset($_POST['empresa'])) ? $_POST['empresa'] : null;

// SQL para selecionar os registros
$sql_arry = "SELECT codigo FROM motoristas GROUP BY codigo desc ";
// seleciona os registros
$stmt_array = $PDOPORT->prepare($sql_arry);
$stmt_array->execute();
$ultimo_codigo = $stmt_array->fetchColumn();

$novo_codigo = $ultimo_codigo + 1;


if (empty($cpf) || empty($nome) || empty($empresa)) {
	echo "Erro ao cadastrar";
} else {
	$sql_count = "select count(*) cpf from motoristas where cpf = '" . $cpf. "' ";
	$stmt_count = $PDOPORT->prepare($sql_count);
	$stmt_count->execute();
	$total = $stmt_count->fetchColumn();
	if ($total == 1)
	{
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Motorista já  não cadastrada, tente novamente!');
		window.location.href='cadastro.php';
		</script>");
	}
	else
	{
	// insere no banco
	$sql = "INSERT INTO motoristas(codigo, cpf, moto, empresa) VALUES(:codigo, :cpf, :moto, :empresa)";
	$stmt = $PDOPORT->prepare($sql);
	$stmt->bindParam(':codigo', $novo_codigo);
	$stmt->bindParam(':cpf', $cpf);
	$stmt->bindParam(':moto', ucwords($nome));
	$stmt->bindParam(':empresa', ucwords($empresa));
	if ($stmt->execute()) {
		header('Location: cadastro_motorista.php');
	} else {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
		header('Location: cadastro.php');
	}
	}
	
	
}
