<?php

require_once '../init.php';


$PDO = db_connect_eerg();

// pega os dados do formuário

$cracha = isset($_POST['cracha']) ? $_POST['cracha'] : null;


$sql_cracha = "SELECT cracha FROM login where cracha = $cracha";
$stmt_array_cracha = $PDO->prepare($sql_cracha);
$stmt_array_cracha->execute();
$cracha = $stmt_array_cracha->fetchColumn();


if ($cracha > 0) {
    header('Location: ../eanproduto.php');
} else {
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Cracha não cadastrado, tente novamente!');
	window.location.href='../cracha.php';
	</script>");
}