<?php

require_once '../init.php';

// pega os dados do formuário
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$conta = isset($_POST['conta']) ? $_POST['conta'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
/**Script em PHP para formatar o valor para gravar no banco de dados usando a função str_replace**/
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;
$valor = str_replace(".", "", $valor);

$data = date("Y-m-d"); 

// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($data);

// insere no banco
$PDO = db_connect_tratativa();
$sql = "INSERT INTO despesas(data, categoria, descricao, conta, valor, status) VALUES(:data, :categoria, :descricao, :conta, :valor, :status)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':data', $data);
$stmt->bindParam(':categoria', $categoria);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':conta', $conta);
$stmt->bindParam(':valor', $valor);
$stmt->bindParam(':status', $status);



if ($stmt->execute()) {
	header('Location: fromdespesas.php');
} else {
	echo "Erro ao cadastrar";
	print_r($stmt->errorInfo());
}
