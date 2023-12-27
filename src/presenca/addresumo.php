<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

$PDOP = db_connect_prsc();
$PDO = db_connect();
$datalista = $_SESSION['dataadd'];

// sql_count para contar o total de registros
$sql_id = "SELECT id FROM resumo where data = '$datalista'";
// conta o toal de registros
$stmt_id = $PDOP->prepare($sql_id);
$stmt_id->execute();
$id = $stmt_id->fetchColumn();

// sql_count para contar o total de registros
$sql_count_total = "SELECT count(colaborador) FROM faltas where data = '$datalista' ";
// conta o toal de registros
$stmt_count_total = $PDOP->prepare($sql_count_total);
$stmt_count_total->execute();
$total = $stmt_count_total->fetchColumn();

// sql_count para contar o total de registros
$sql_count_falta = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'FALTA'";
// conta o toal de registros
$stmt_count_falta = $PDOP->prepare($sql_count_falta);
$stmt_count_falta->execute();
$falta = $stmt_count_falta->fetchColumn();

// sql_count para contar o total de registros
$sql_count_atestado = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'ATESTADO'";
// conta o toal de registros
$stmt_count_atestado = $PDOP->prepare($sql_count_atestado);
$stmt_count_atestado->execute();
$atestado = $stmt_count_atestado->fetchColumn();

// sql_count para contar o total de registros
$sql_count_afastado = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'afastamento'";
// conta o toal de registros
$stmt_count_afastado = $PDOP->prepare($sql_count_afastado);
$stmt_count_afastado->execute();
$afastamento = $stmt_count_afastado->fetchColumn();

// sql_count para contar o total de registros
$sql_count_covid = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'COVID-19'";
// conta o toal de registros
$stmt_count_covid = $PDOP->prepare($sql_count_covid);
$stmt_count_covid->execute();
$covid = $stmt_count_covid->fetchColumn();

// sql_count para contar o total de registros
$sql_count_cedo = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'EMBORA MAIS CEDO'";
// conta o toal de registros
$stmt_count_cedo = $PDOP->prepare($sql_count_cedo);
$stmt_count_cedo->execute();
$maiscedo = $stmt_count_cedo->fetchColumn();

// sql_count para contar o total de registros
$sql_count_suspensao = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'SUSPENSÃO'";
// conta o toal de registros
$stmt_count_suspensao = $PDOP->prepare($sql_count_suspensao);
$stmt_count_suspensao->execute();
$suspensao = $stmt_count_suspensao->fetchColumn();

// sql_count para contar o total de registros
$sql_count_advertencia = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'ADVERTENCIA'";
// conta o toal de registros
$stmt_count_advertencia = $PDOP->prepare($sql_count_advertencia);
$stmt_count_advertencia->execute();
$advertencia = $stmt_count_advertencia->fetchColumn();

// sql_count para contar o total de registros
$sql_count_trabalho = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'TRABALHO EXTERNO'";
// conta o toal de registros
$stmt_count_trabalho = $PDOP->prepare($sql_count_trabalho);
$stmt_count_trabalho->execute();
$trabalhoexterno = $stmt_count_trabalho->fetchColumn();

// sql_count para contar o total de registros
$sql_count_demissao = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'Demissão'";
// conta o toal de registros
$stmt_count_demissao = $PDOP->prepare($sql_count_demissao);
$stmt_count_demissao->execute();
$demissao = $stmt_count_demissao->fetchColumn();


$isoDate = dateConvert($datalista);

if(empty($id)){
    $sql = "INSERT INTO resumo(data, falta, atestado, afastamento, covid, maiscedo, suspensao, advertencia, trabalhoexterno, demissao, total) VALUES(:data, :falta, :atestado, :afastamento, :covid, :maiscedo, :suspensao, :advertencia, :trabalhoexterno, :demissao,  :total)";
	$stmt = $PDOP->prepare($sql);
	$stmt->bindParam(':data', $datalista);
	$stmt->bindParam(':falta', $falta);
	$stmt->bindParam(':atestado', $atestado);	
	$stmt->bindParam(':afastamento', $afastamento);	
    $stmt->bindParam(':covid', $covid);	
    $stmt->bindParam(':maiscedo', $maiscedo);	
    $stmt->bindParam(':suspensao', $suspensao);	
    $stmt->bindParam(':advertencia', $advertencia);	
    $stmt->bindParam(':trabalhoexterno', $trabalhoexterno);	  
	$stmt->bindParam(':demissao', $demissao);	  
	$stmt->bindParam(':total', $total);	   
	if ($stmt->execute()) {
		header('Location: ../presenca.php');		
	} else {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
} else {
    $sql = "UPDATE resumo SET data = :data, falta = :falta, atestado = :atestado, afastamento = :afastamento, covid = :covid, maiscedo = :maiscedo, suspensao = :suspensao, advertencia = :advertencia, trabalhoexterno = :trabalhoexterno, demissao = :demissao, total= :total WHERE id = :id";
	$stmt = $PDOP->prepare($sql);
	$stmt->bindParam(':data', $datalista);
	$stmt->bindParam(':falta', $falta);
	$stmt->bindParam(':atestado', $atestado);	
	$stmt->bindParam(':afastamento', $afastamento);	
    $stmt->bindParam(':covid', $covid);	
    $stmt->bindParam(':maiscedo', $maiscedo);	
    $stmt->bindParam(':suspensao', $suspensao);	
    $stmt->bindParam(':advertencia', $advertencia);	
    $stmt->bindParam(':trabalhoexterno', $trabalhoexterno);	
	$stmt->bindParam(':demissao', $demissao);	
	$stmt->bindParam(':total', $total);	 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	if ($stmt->execute()) {
		header('Location: ../presenca.php');		
	} else {
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
}

   