<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

// pega os dados do formuário
$user = isset($_POST['user']) ? $_POST['user'] : null;
$rota = isset($_POST['rota']) ? $_POST['rota'] : null;
$data = isset($_POST['data']) ? $_POST['data'] : null;

$PDO = db_connect_acesso();
$PDOGR = db_connect_grandesredes();

$sql_count = "select count(*) acessos from login where user = '" . $user . "' ";
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$sql_nome = "SELECT nome from login where user = '" . $user . "' ";
$stmt_nome = $PDO->prepare($sql_nome);
$stmt_nome->execute();
$nome = $stmt_nome->fetchColumn();

$sql_count_rota = "select count(*) rota from rotas where rota = '" . $rota . "' ";
$stmt_count_rota = $PDOGR->prepare($sql_count_rota);
$stmt_count_rota->execute();
$total_rota = $stmt_count_rota->fetchColumn();

$_SESSION['nome'] = $nome;
$_SESSION['rota'] = $rota;
$_SESSION['data'] = $data;


if ($total == 1 & $total_rota == 1)
{
	echo ("<script LANGUAGE='JavaScript'>
	window.location.href='auditoria.php';
	</script>");
}
else
{
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Matricula ou Rota não cadastrada, tente novamente!');
	window.location.href='../grandesredes.php';
	</script>");
}

