<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';


$user_colaborador = $_SESSION['user'];
$nome_colaborador = $_SESSION['nome'];
$grupo = isset($_POST['grupo']) ? $_POST['grupo'] : null;
$_SESSION['grupo'] = $grupo;


if ( $grupo >= 0)
{
    header('Location: produtividadeindividual.php');
}
else
{
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Grupo não existe, tente novamente!');
	window.location.href='grupo.php';
	</script>");
}