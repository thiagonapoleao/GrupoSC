<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

$estacao = isset($_POST['estacao']) ? $_POST['estacao'] : null;
$_SESSION['estacao'] = $estacao;


if ( $estacao >= 0)
{
    header('Location: listacancelados.php');
}
else
{
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Estação não existe, tente novamente!');
	window.location.href='estacao.php';
	</script>");
}