<?php
require_once '../senhaanalise.php'; 
require_once '../init.php';

$PDO = db_connect_conf();
$PDOD = db_connect();

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();


$sql_data = "SELECT data FROM analise";
$stmt_data = $PDO->prepare($sql_data);
$stmt_data->execute();
$data =  $stmt_data->fetchColumn();

$sql_data_historico = "SELECT data FROM historicoanalise";
$stmt_dataa_historico = $PDO->prepare($sql_data_historico);
$stmt_dataa_historico->execute();
$data_historico =  $stmt_dataa_historico->fetchColumn();

$convDatea = dateConvert($data);
$convDateh = dateConvert($data_historico);
$convdatacontabil = dateConvert($datacontabil);


if($data_historico == $datacontabile){
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Arquivo já salvo com a data de hoje!');
	window.location.href='analiseconferencia.php';
	</script>");	
} else {
	$sql = "INSERT INTO historicoanalise (data, grupo, meta, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total, media, porcen) SELECT '$convdatacontabil', grupo, meta, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total, media, porcen FROM analise";
	$stmt = $PDO->prepare($sql);
	if ($stmt->execute()) {		
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Arquivo salvo com sucesso!');
		window.location.href='analiseconferencia.php';
		</script>");
	} else {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
}