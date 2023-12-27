<?php

require_once 'init.php';

    $PDO = db_connect();
    $sqlGrafico = "TRUNCATE TABLE upm_hora";
    $stmtGrafico = $PDO->prepare($sqlGrafico);
    $stmtGrafico->execute();

    $PDO = db_connect();
    $sql = "TRUNCATE TABLE erro_linha";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();

    $meta = 950;
    $erros_linha = 0;
    $upm_linha = 0;
    $venda_linha = 0;
    $metaT = 800;
    $erro_total = 0;
    $upm_total= 0;
    $venda_total = 0;
    $metaP = 0;
    $erros_psico = 0;
    $upm_psico = 0;
    $venda_psico = 0;

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
    $metaP = 50;
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
    $metaT = 1000;
    $sql_upmT = "UPDATE upm SET tipo = :tipo, meta = :meta, erros = :erros, upm = :upm, conferencia = :conferencia WHERE id = :id";
    $stmtT = $PDO->prepare($sql_upmT);
    $stmtT->bindParam(':tipo', $tipoT);
    $stmtT->bindParam(':meta', $metaT);
    $stmtT->bindParam(':erros', $erro_total);
    $stmtT->bindParam(':upm', $upm_total);
    $stmtT->bindParam(':conferencia', $venda_total);
    $stmtT->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtT->execute();

    header('Location: inicial.php');
