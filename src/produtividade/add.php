<?php

require_once '../init.php';
$PDOA = db_connect_acesso();
$PDO = db_connect_conf();
$PDOD = db_connect();

$data = isset($_POST['data']) ? $_POST['data'] : null;
$user = isset($_POST['user']) ? $_POST['user'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();


$sql_count = "select count(*) acessos from login where user = '" . $user . "' and password  = '" . $password . "'";
$stmt_count = $PDOA->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();


$sql_data_historico = "select count(data) from hist0040 where data = '" . $data . "' ";
$stmt_dataa_historico = $PDO->prepare($sql_data_historico);
$stmt_dataa_historico->execute();
$data_historico =  $stmt_dataa_historico->fetchColumn();

$convDatea = dateConvert($data);
$convDateh = dateConvert($data_historico);


if ($total == 1) {
	if ($data_historico > 0) {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Arquivo já salvo com a data de hoje!');
		window.location.href='analiseconferencia.php';
		</script>");
	} else {
		$sql = "INSERT INTO historicoanalise (data, grupo, meta, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total, media, porcen) SELECT '$data', grupo, meta, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total, media, porcen FROM analise";
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
} else {
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Matricula ou Senha não confere, tente novamente!');
	window.location.href='analiseconferencia.php';
	</script>");
}
