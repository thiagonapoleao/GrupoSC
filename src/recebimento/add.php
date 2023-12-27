<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

$PDO = db_connect_eerg();

// pega os dados do formuário
$quantidade = isset($_POST['escrquantidade']) ? $_POST['escrquantidade'] : null;
$pfat = isset($_POST['pfat']) ? $_POST['pfat'] : null;
$sap = isset($_POST['sap']) ? $_POST['sap'] : null;
$barra = isset($_POST['barra']) ? $_POST['barra'] : null;
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$excesso = isset($_POST['excesso']) ? $_POST['excesso'] : null;
$escrvalidade = $_SESSION['escrvalidade'];

$data = date('Y-m-d');
$hora = date('H:i:s');
$emissor = 'Thiago Cesar Napoleao';
$usuario = 'Thiago Cesar Napoleao';
$zerado = '1';

if ($quantidade > 0) {
	$sql = "INSERT INTO log_emissao_etq(data, hora, emissor, usuario, codigo, descricao, estacao, validade, zerado) VALUES(:data, :hora, :emissor, :usuario, :codigo, :descricao, :estacao, :validade, :zerado)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':data', $data);
	$stmt->bindParam(':hora', $hora);
    $stmt->bindParam(':emissor', $emissor);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':codigo', $pfat);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':estacao', $endereco);
    $stmt->bindParam(':validade', $escrvalidade);
    $stmt->bindParam(':zerado', $zerado);

	if ($stmt->execute()) {
		header('Location: ../cracha.php');
	} else {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
} else {
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Quandidade não digitada, tente novamente!');
	window.location.href='../cracha.php';
	</script>");
}