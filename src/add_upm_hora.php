<?php
require_once 'init.php';

// abre a conexão
$PDO = db_connect_tratativa();
$PDOD = db_connect();

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

$isoDate = dateConvert($datacontabil);

// SQL para retirar o ponto dos numeros da string
$sql_arry_replace = "UPDATE pln0098r SET t_prod = REPLACE ( t_prod , '.' , '' ) WHERE t_prod LIKE '%.%'";
// seleciona os registros
$stmt_array_replace = $PDO->prepare($sql_arry_replace);
$stmt_array_replace->execute();

// SQL para selecionar os registros
$sql_arry = "SELECT id, codigo, nome, tipoErro, qtdErro, total, estacao, rota, hora FROM erro_linha order by hora DESC, rota DESC";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();

// SQL para selecionar erro_total
$sql_arry_erros_total = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) FROM pln0098r WHERE data <> ''";
// seleciona os registros
$stmt_array_erro_total = $PDO->prepare($sql_arry_erros_total);
$stmt_array_erro_total->execute();
$erro_total = $stmt_array_erro_total->fetchColumn();


// SQL para selecionar erros_psico estacao 40
$sql_arry_erros_estacao_40 = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) as soma FROM pln0098r WHERE data <> ''and estacao = 40";
// seleciona os registros
$stmt_array_erro_estacao_40 = $PDO->prepare($sql_arry_erros_estacao_40);
$stmt_array_erro_estacao_40->execute();
$erro_estacao_40 = $stmt_array_erro_estacao_40->fetchColumn();

// SQL para selecionar erros_psico estacao 41
$sql_arry_erros_estacao_41 = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) as soma FROM pln0098r WHERE data <> ''and estacao = 41";
// seleciona os registros
$stmt_array_erro_estacao_41 = $PDO->prepare($sql_arry_erros_estacao_41);
$stmt_array_erro_estacao_41->execute();
$erro_estacao_41 = $stmt_array_erro_estacao_41->fetchColumn();

// SQL para selecionar erros_psico estacao 42
$sql_arry_erros_estacao_42 = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) as soma FROM pln0098r WHERE data <> ''and estacao = 42";
// seleciona os registros
$stmt_array_erro_estacao_42 = $PDO->prepare($sql_arry_erros_estacao_42);
$stmt_array_erro_estacao_42->execute();
$erro_estacao_42 = $stmt_array_erro_estacao_42->fetchColumn();

// SQL para selecionar erros_psico estacao 43
$sql_arry_erros_estacao_43 = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) as soma FROM pln0098r WHERE data <> ''and estacao = 43";
// seleciona os registros
$stmt_array_erro_estacao_43 = $PDO->prepare($sql_arry_erros_estacao_43);
$stmt_array_erro_estacao_43->execute();
$erro_estacao_43 = $stmt_array_erro_estacao_43->fetchColumn();

// SQL para selecionar erros_psico estacao 44
$sql_arry_erros_estacao_44 = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) as soma FROM pln0098r WHERE data <> '' and estacao = 44";
// seleciona os registros
$stmt_array_erro_estacao_44 = $PDO->prepare($sql_arry_erros_estacao_44);
$stmt_array_erro_estacao_44->execute();
$erro_estacao_44 = $stmt_array_erro_estacao_44->fetchColumn();


// SQL para selecionar venda estacao 40
$sql_arry_venda_estacao_40 = "SELECT SUM(t_prod) as soma FROM pln0098r WHERE data <> '' and estacao = 40";
// seleciona os registros
$stmt_array_venda_estacao_40 = $PDO->prepare($sql_arry_venda_estacao_40);
$stmt_array_venda_estacao_40->execute();
$venda_estacao_40 = $stmt_array_venda_estacao_40->fetchColumn();

// SQL para selecionar venda estacao 41
$sql_arry_venda_estacao_41 = "SELECT SUM(t_prod) as soma FROM pln0098r WHERE data <> '' and estacao = 41";
// seleciona os registros
$stmt_array_venda_estacao_41 = $PDO->prepare($sql_arry_venda_estacao_41);
$stmt_array_venda_estacao_41->execute();
$venda_estacao_41 = $stmt_array_venda_estacao_41->fetchColumn();

// SQL para selecionar venda estacao 42
$sql_arry_venda_estacao_42 = "SELECT SUM(t_prod) as soma FROM pln0098r WHERE data <> '' and estacao = 42";
// seleciona os registros
$stmt_array_venda_estacao_42 = $PDO->prepare($sql_arry_venda_estacao_42);
$stmt_array_venda_estacao_42->execute();
$venda_estacao_42 = $stmt_array_venda_estacao_42->fetchColumn();

// SQL para selecionar venda estacao 43
$sql_arry_venda_estacao_43 = "SELECT SUM(t_prod) as soma FROM pln0098r WHERE data <> '' and estacao = 43";
// seleciona os registros
$stmt_array_venda_estacao_43 = $PDO->prepare($sql_arry_venda_estacao_43);
$stmt_array_venda_estacao_43->execute();
$venda_estacao_43 = $stmt_array_venda_estacao_43->fetchColumn();

// SQL para selecionar venda estacao 44
$sql_arry_venda_estacao_44 = "SELECT SUM(t_prod) as soma FROM pln0098r WHERE data <> '' and estacao = 44";
// seleciona os registros
$stmt_array_venda_estacao_44 = $PDO->prepare($sql_arry_venda_estacao_44);
$stmt_array_venda_estacao_44->execute();
$venda_estacao_44 = $stmt_array_venda_estacao_44->fetchColumn();


// SQL para selecionar unidades vendidas
$sql_arry_venda = "SELECT SUM(t_prod) FROM pln0098r WHERE data <> ''";
// seleciona os registros
$stmt_array_venda = $PDO->prepare($sql_arry_venda);
$stmt_array_venda->execute();
$venda_total = $stmt_array_venda->fetchColumn();

// calculo UPM psico
$venda_psico = $venda_estacao_40 + $venda_estacao_41 + $venda_estacao_42 + $venda_estacao_43 + $venda_estacao_44;
$erros_psico = $erro_estacao_40 + $erro_estacao_41 + $erro_estacao_42 + $erro_estacao_43 + $erro_estacao_44;
$upm_psico = round(($erros_psico / $venda_psico) * 1000000);

// calculo UPM Total
$upm_total = round(($erro_total / $venda_total) * 1000000);

//calculo UPM Linha
$erros_linha = $erro_total - $erros_psico;
$venda_linha = $venda_total - $venda_psico;
$upm_linha = round(($erros_linha / $venda_linha) * 1000000);

$horasAtual = date("H:i:s");
$horasAtual1 = date("H:i");
$meta = 1000;

// SQL para selecionar os registros
$sql_arry_errosT = "SELECT errosT FROM upm_hora order by id DESC";
// seleciona os registros
$stmt_array_errosT = $PDO->prepare($sql_arry_errosT);
$stmt_array_errosT->execute();
$errosT = $stmt_array_errosT->fetchColumn();

// SQL para selecionar os registros
$sql_arry_horasG = "SELECT horasG FROM upm_hora order by id DESC";
// seleciona os registros
$stmt_array_horasG = $PDO->prepare($sql_arry_horasG);
$stmt_array_horasG->execute();
$horasG = $stmt_array_horasG->fetchColumn();

$difErros = $erros_linha - $errosT;

//Calcula o tempo de upload
$horaLancamento = $horasAtual;
$ultimaHora = $horasG;
$hora1 = explode(":", $horasAtual);
$hora2 = explode(":", $ultimaHora);
$acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60);
$acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60);

if($acumulador1 < $acumulador2){
    $resultado = ($acumulador1 + 86341) - $acumulador2;
} else {
    $resultado = $acumulador1 - $acumulador2;
}

$hora_ponto = floor($resultado / 3600);
$resultado = $resultado - ($hora_ponto * 3600);
$min_ponto = floor($resultado / 60);
$resultado = $resultado - ($min_ponto * 60);
$secs_ponto = $resultado;
if (!empty($horasG)) {
    if ($min_ponto < 10) {
        $tempo = $hora_ponto . ":0" . $min_ponto;
    } else {
        $tempo = $hora_ponto . ":" . $min_ponto;
    }
} else {
    $tempo = '00:00';
}

$horasD = $horasAtual1 . ' / ' . $tempo;

//Grava na variável resultado final
$sql = "INSERT INTO upm_hora(data, confT, errosT, upm, difErros, horasG, horasD, meta) VALUES(:data, :confT, :errosT, :upm, :difErros, :horasG, :horasD, :meta)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':data', $isoDate);
$stmt->bindParam(':confT', $venda_linha);
$stmt->bindParam(':errosT', $erros_linha);
$stmt->bindParam(':upm', $upm_linha);
$stmt->bindParam(':difErros', $difErros);
$stmt->bindParam(':horasG', $horasAtual);
$stmt->bindParam(':horasD', $horasD);
$stmt->bindParam(':meta', $meta);

if ($stmt->execute()) {
    header('Location: upm/from-grafico.php');
} else {
    echo "Erro ao lançar as horas";
    print_r($stmt->errorInfo());
    header('Location: tratativa.php');
}

$tipoL = 'Linha';
$id = 2;
$sql_upmL = "UPDATE upm SET tipo = :tipo, meta = :meta, erros = :erros, upm = :upm, conferencia = :conferencia WHERE id = :id";
$stmtL = $PDO->prepare($sql_upmL);
$stmtL->bindParam(':tipo', $tipoL);
$stmtL->bindParam(':meta', $meta);
$stmtL->bindParam(':erros', $erros_linha);
$stmtL->bindParam(':upm', $upm_linha);
$stmtL->bindParam(':conferencia', $venda_linha);
$stmtL->bindParam(':id', $id, PDO::PARAM_INT);
$stmtL->execute();

$tipoP = 'Psico';
$id = 3;
$metaP = 0;
$sql_upmP = "UPDATE upm SET tipo = :tipo, meta = :meta, erros = :erros, upm = :upm, conferencia = :conferencia WHERE id = :id";
$stmtP = $PDO->prepare($sql_upmP);
$stmtP->bindParam(':tipo', $tipoP);
$stmtP->bindParam(':meta', $metaP);
$stmtP->bindParam(':erros', $erros_psico);
$stmtP->bindParam(':upm', $upm_psico);
$stmtP->bindParam(':conferencia', $venda_psico);
$stmtP->bindParam(':id', $id, PDO::PARAM_INT);
$stmtP->execute();

$tipoT = 'Total';
$id = 1;
$metaT = 800;
$sql_upmT = "UPDATE upm SET tipo = :tipo, meta = :meta, erros = :erros, upm = :upm, conferencia = :conferencia WHERE id = :id";
$stmtT = $PDO->prepare($sql_upmT);
$stmtT->bindParam(':tipo', $tipoT);
$stmtT->bindParam(':meta', $metaT);
$stmtT->bindParam(':erros', $erro_total);
$stmtT->bindParam(':upm', $upm_total);
$stmtT->bindParam(':conferencia', $venda_total);
$stmtT->bindParam(':id', $id, PDO::PARAM_INT);
$stmtT->execute();
