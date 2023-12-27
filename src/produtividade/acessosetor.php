<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

$user_colaborador = $_SESSION['user'];
$nome_colaborador = $_SESSION['nome'];


// pega os dados do formuário
$setor = isset($_POST['setor']) ? $_POST['setor'] : null;


	if($setor == '1'){
		header('Location: grupo.php');
	} elseif($setor == '2'){
		header('Location:  produtividadepg.php');
	} elseif($setor == '3'){
		header('Location: auditoria.php');
	} else {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Setor não existe, tente novamente!');
		window.location.href='setor.php';
		</script>");
	}		



