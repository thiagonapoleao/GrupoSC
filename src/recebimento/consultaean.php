<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';


$PDO = db_connect_eerg();

// pega os dados do formuário

$ean = isset($_POST['ean']) ? $_POST['ean'] : null;

$sql_ean = "SELECT ean FROM pln0055r where ean = '$ean'";
$stmt_array_ean = $PDO->prepare($sql_ean);
$stmt_array_ean->execute();
$ean = $stmt_array_ean->fetchColumn();

$sql_codigo = "SELECT codigo FROM pln0055r where ean = $ean";
$stmt_array_codigo = $PDO->prepare($sql_codigo);
$stmt_array_codigo->execute();
$codigo = $stmt_array_codigo->fetchColumn();

$sql_descricao = "SELECT descricao FROM pln0055r where ean = $ean";
$stmt_array_descricao = $PDO->prepare($sql_descricao);
$stmt_array_descricao->execute();
$descricao = $stmt_array_descricao->fetchColumn();

$sql_codigo_sap = "SELECT sap FROM curva_abc where pfat = $codigo";
$stmt_array_codigo_sap = $PDO->prepare($sql_codigo_sap);
$stmt_array_codigo_sap->execute();
$codigo_sap = $stmt_array_codigo_sap->fetchColumn();

$sql_endereco = "SELECT endereco FROM curva_abc where pfat = $codigo";
$stmt_array_endereco = $PDO->prepare($sql_endereco);
$stmt_array_endereco->execute();
$endereco = $stmt_array_endereco->fetchColumn();

$sql_excesso = "SELECT count(saldo) FROM pbl5050m where codigo = $codigo";
$stmt_array_excesso = $PDO->prepare($sql_excesso);
$stmt_array_excesso->execute();
$excesso = $stmt_array_excesso->fetchColumn();

$sql_validade = "SELECT validade FROM pbl5050m where codigo = $codigo order by validade desc";
$stmt_array_validade = $PDO->prepare($sql_validade);
$stmt_array_validade->execute();
$validade = $stmt_array_validade->fetchColumn();

$_SESSION['ean'] = $ean;
$_SESSION['codigo'] = $codigo;
$_SESSION['descricao'] = $descricao;
$_SESSION['codigo_sap'] = $codigo_sap;
$_SESSION['endereco'] = $endereco;
$_SESSION['excesso'] = $excesso;
$_SESSION['validade'] = $validade;


if ($ean > 0) {
    header('Location: ../validadeproduto.php');
} else {
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Código de Barra não cadastrado, tente novamente!');
	window.location.href='../cracha.php';
	</script>");
}