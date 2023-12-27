<?php
require_once 'senhazerando.php';
require_once '../init.php';

// remove do banco
$PDO = db_connect_conf();

$sql_monitorapedidao = "DELETE FROM monitorapedidao";
$stmt_monitorapedidao = $PDO->prepare($sql_monitorapedidao);
$stmt_monitorapedidao->execute();
$sql_pln0048rgrafico = "DELETE FROM pln0048rgrafico";
$stmt_pln0048rgrafico = $PDO->prepare($sql_pln0048rgrafico);
$stmt_pln0048rgrafico->execute();
$sql_h1 = "DELETE FROM pln0048r1";
$stmt_h1 = $PDO->prepare($sql_h1);
$stmt_h1->execute();
$sql_h2 = "DELETE FROM pln0048r2";
$stmt_h2 = $PDO->prepare($sql_h2);
$stmt_h2->execute();
$sql_h3 = "DELETE FROM pln0048r3";
$stmt_h3 = $PDO->prepare($sql_h3);
$stmt_h3->execute();
$sql_h4 = "DELETE FROM pln0048r4";
$stmt_h4 = $PDO->prepare($sql_h4);
$stmt_h4->execute();
$sql_h5 = "DELETE FROM pln0048r5";
$stmt_h5 = $PDO->prepare($sql_h5);
$stmt_h5->execute();
$sql_h6 = "DELETE FROM pln0048r6";
$stmt_h6 = $PDO->prepare($sql_h6);
$stmt_h6->execute();
$sql_h7 = "DELETE FROM pln0048r7";
$stmt_h7 = $PDO->prepare($sql_h7);
$stmt_h7->execute();
$sql_h8 = "DELETE FROM pln0048r8";
$stmt_h8 = $PDO->prepare($sql_h8);
$stmt_h8->execute();
$sql_h9 = "DELETE FROM pln0048r9";
$stmt_h9 = $PDO->prepare($sql_h9);
$stmt_h9->execute();
$sql_h10 = "DELETE FROM pln0048r10";
$stmt_h10 = $PDO->prepare($sql_h10);
$stmt_h10->execute();
$sql_h11 = "DELETE FROM pln0048r11";
$stmt_h11 = $PDO->prepare($sql_h11);
$stmt_h11->execute();

echo "<script type=\"text/javascript\">
alert(\"Produção zerada com sucesso!!\");
window.location = \"analisepedidao.php\"
</script>";    