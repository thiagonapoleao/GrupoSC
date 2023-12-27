<?php

require_once '../init.php';
$PDO = db_connect_tratativa();
$PDOA = db_connect_acesso();
$PDOD = db_connect();

$data = isset($_POST['data']) ? $_POST['data'] : null;
$user = isset($_POST['user']) ? $_POST['user'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$convDate = dateConvert($data);
$convDateh = dateConvert($data_historico);


$sql_count = "select count(*) acessos from login where user = '" . $user . "' and password  = '" . $password . "'";
$stmt_count = $PDOA->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();


$sql_data_historico = "select count(data) from hist0040 where data = '" . $data . "' ";
$stmt_dataa_historico = $PDO->prepare($sql_data_historico);
$stmt_dataa_historico->execute();
$data_historico =  $stmt_dataa_historico->fetchColumn();



$sql_hist = "SELECT cod, nome, rota, data, estacao, descricao, erro, motivo FROM pln0040 ";
$stmt_array_hist = $PDO->prepare($sql_hist);
$stmt_array_hist->execute();
$hist = $stmt_array_hist->fetchColumn();

$isoDate = dateConvert($hist['data']);

if ($total == 1) {
	if ($data_historico > 0) {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Arquivo já salvo com a data de hoje!');
		window.location.href='from-listaerros.php';
		</script>");
	} else {
		$sql = "INSERT INTO hist0040(cod, nome, rota, data, estacao, descricao, erro, motivo) SELECT  cod, nome, rota, '$data', estacao, descricao, erro, motivo FROM pln0040r";
		$stmt = $PDO->prepare($sql);
		if ($stmt->execute()) {
			echo ("<script LANGUAGE='JavaScript'>
			window.alert('Arquivo salvo com sucesso!');
			window.location.href='from-listaerros.php';
			</script>");
		} else {
			echo "Erro ao cadastrar";
			print_r($stmt->errorInfo());
		}
	}
} else {
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Matricula ou Senha não confere, tente novamente!');
	window.location.href='from-listaerros.php';
	</script>");
}
