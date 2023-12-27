<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

$PDOP = db_connect_prsc();
$PDO = db_connect();

$data = isset($_POST['data']) ? $_POST['data'] : null;
$colaborador = isset($_POST['colaborador']) ? $_POST['colaborador'] : null;
$motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null;
$obs = isset($_POST['obs']) ? $_POST['obs'] : null;
$_SESSION['dataadd'] = $data ;
// SQL para selecionar
$sql_arry_data = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_data = $PDO->prepare($sql_arry_data);
$stmt_array_data->execute();
$dataBanco = $stmt_array_data->fetchColumn();

// SQL para selecionar
$sql_arry_setor = "SELECT setor FROM ativo where colaborador = '$colaborador'";
// seleciona os registros
$stmt_array_setor = $PDOP->prepare($sql_arry_setor);
$stmt_array_setor->execute();
$setor = $stmt_array_setor->fetchColumn();

$datames = $data;
$array = explode("-", $datames);
$dia = $array[0];
$mes = $array[1];
$ano = $array[2];


// SQL para selecionar
$sql_arry_demissao = "SELECT count(motivo) FROM faltas where colaborador = '$colaborador' and motivo = 'Demissão' and data like '%-$mes-%'";
// seleciona os registros
$stmt_array_demissao = $PDOP->prepare($sql_arry_demissao);
$stmt_array_demissao->execute();
$demissao = $stmt_array_demissao->fetchColumn();


if($demissao > 0){
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Já lançada a demissão do funcioanrio!');
	window.location.href='../presenca.php';
	</script>");
} else {
	$sql = "INSERT INTO faltas(data, colaborador, motivo, setor, obs) VALUES(:data, :colaborador, :motivo, :setor, :obs)";
	$stmt = $PDOP->prepare($sql);
	$stmt->bindParam(':data', $data);
	$stmt->bindParam(':colaborador', $colaborador);
	$stmt->bindParam(':motivo', $motivo);	
	$stmt->bindParam(':setor', $setor);	
	$stmt->bindParam(':obs', $obs);	
	if ($stmt->execute()) {
		header('Location: addresumo.php');
	} else {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
}