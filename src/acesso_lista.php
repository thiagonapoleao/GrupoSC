<?php

require_once 'init.php';

// pega os dados do formuário
$user = isset($_POST['user']) ? $_POST['user'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;


$PDO = db_connect_acesso();
$sql_count = "select count(*) acessos from login where user = '" . $user . "' and password  = '" . $password . "'";
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

if ($total == 1)
{
	header('Location: tratativa/from-listaerros.php');
}
else
{
	header('Location: erro_senha.php');
}