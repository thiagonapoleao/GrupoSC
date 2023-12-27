<?php

require_once '../../init.php';


$PDO = db_connect();

// SQL para selecionar
$sql_arry_data = "SELECT data FROM demonstrativo where id = 1";
// seleciona os registros
$stmt_array_data = $PDO->prepare($sql_arry_data);
$stmt_array_data->execute();
$dataBanco = $stmt_array_data->fetchColumn();


// pega os dados do formuário

$data = isset($_POST['data']) ? $_POST['data'] : null;
$rota = isset($_POST['rota']) ? $_POST['rota'] : null;
$liberada = isset($_POST['horario']) ? $_POST['horario'] : null;
$impressora = isset($_POST['impressora']) ? $_POST['impressora'] : null;
$danfeNormal = isset($_POST['danfenormal']) ? $_POST['danfenormal'] : null;
$danfeEPC = isset($_POST['danfeepc']) ? $_POST['danfeepc'] : null;
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : null;
$codmotorista = isset($_POST['codmotorista']) ? $_POST['codmotorista'] : null;

$sql_operador = "SELECT nome FROM operador where codigo = $codigo";
$stmt_array_operador = $PDO->prepare($sql_operador);
$stmt_array_operador->execute();
$operador = $stmt_array_operador->fetchColumn();

$sql_arry_previsão_nota = "SELECT liberacao_nota FROM horario_rotas where rota = '$rota'";
$stmt_array_previsão_nota = $PDO->prepare($sql_arry_previsão_nota);
$stmt_array_previsão_nota->execute();
$previsão_nota =  $stmt_array_previsão_nota->fetchColumn();

$sql_arry_previsão_saida = "SELECT saida FROM horario_rotas where rota = '$rota'";
$stmt_array_previsão_saida = $PDO->prepare($sql_arry_previsão_saida);
$stmt_array_previsão_saida->execute();
$previsão_saida =  $stmt_array_previsão_saida->fetchColumn();

$sql_sequencia = "SELECT sequencia FROM horario_rotas where rota = '$rota'";
$stmt_sequencia = $PDO->prepare($sql_sequencia);
$stmt_sequencia->execute();
$sequencia = $stmt_sequencia->fetchColumn();


// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($data);

// insere no banco
$PDO = db_connect();
if ($rota > 0) {
	$sql = "INSERT INTO demonstrativo(data, rota, meta_liberacao_nota, liberacaocpd, impressora, danfenormal, danfeepec, meta_saida, operador, sequencia, codmotorista) VALUES(:data, :rota, :meta_liberacao_nota, :liberda, :impressora, :danfeNormal, :danfeEPC, :meta_saida, :operador, :sequencia, :codmotorista)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':data', $isoDate);
	$stmt->bindParam(':rota', $rota);
	$stmt->bindParam(':meta_liberacao_nota', $previsão_nota);
	$stmt->bindParam(':liberda', $liberada);
	$stmt->bindParam(':impressora', $impressora);	
	$stmt->bindParam(':danfeNormal', $danfeNormal);
    $stmt->bindParam(':danfeEPC', $danfeEPC);
	$stmt->bindParam(':meta_saida', $previsão_saida);
	$stmt->bindParam(':operador', $operador);
	$stmt->bindParam(':codmotorista', $codmotorista);
	$stmt->bindParam(':sequencia', $sequencia);
	if ($stmt->execute()) {
        header('Location: ../../fechamento.php');
	} else {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('print_r($stmt->errorInfo());');
		window.location.href='../fechamento.php';
		</script>");
	
	}
} else {
	header('Location: ../../fechamento.php');
}