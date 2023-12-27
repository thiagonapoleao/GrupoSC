<?php

require_once '../init.php';


$PDO = db_connect_tratativa();

$PDOD = db_connect();
// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

$isoDate = dateConvert($datacontabil);

// pega os dados do formuário

$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : null;
$erro = isset($_POST['terro']) ? $_POST['terro'] : null;
$quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : null;
//$nome = isset($_POST['separador']) ? $_POST['separador'] : null;
$estacao = isset($_POST['estacao']) ? $_POST['estacao'] : null;
$rota = isset($_POST['rota']) ? $_POST['rota'] : null;
if ($erro == 3) {
	$total = $quantidade * 2;
} else {
	$total = $quantidade;
}
$hora = date("H:i");
$mes = date("m");
$hora1 = date("H");
$sql_separador = "SELECT nome FROM separadores where codigo = $codigo";
$stmt_array_separador = $PDO->prepare($sql_separador);
$stmt_array_separador->execute();
$separador = $stmt_array_separador->fetchColumn();
$nome = $separador;

// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd


// insere no banco
$PDO = db_connect_tratativa();
if ($codigo > 0) {
	$sql = "INSERT INTO erro_linha(data, codigo, tipoErro, qtdErro, nome, total, rota, estacao, hora, mes, hora1) VALUES(:data, :codigo, :terro, :quantidade, :nome, :total, :rota, :estacao, :hora, :mes, :hora1)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':data', $isoDate);
	$stmt->bindParam(':codigo', $codigo);
	$stmt->bindParam(':terro', $erro);
	$stmt->bindParam(':quantidade', $quantidade);
	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':total', $total);
	$stmt->bindParam(':estacao', $estacao);
	$stmt->bindParam(':rota', $rota);
	$stmt->bindParam(':hora', $hora);
	$stmt->bindParam(':mes', $mes);
	$stmt->bindParam(':hora1', $hora1);
	if ($stmt->execute()) {
		header('Location: ../tratativa.php');
	} else {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Erro ao lançar o erro!!');
		window.location.href='../tratativa.php';
		</script>");
	}
} else {
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Codigo não cadastrado, tente novamente!');
	window.location.href='../tratativa.php';
	</script>");
}
