<?php

require_once '../init.php';
$PDO = db_connect();
$PDOC = db_connect_conf();
$PDOE = db_connect_eerg();

   // SQL para selecionar os registros
   $sql_cancelados = "TRUNCATE TABLE cancelados ";
   // seleciona os registros
   $stmt_cancelados = $PDOC->prepare($sql_cancelados);
   $stmt_cancelados->execute();

   
   // SQL para selecionar os registros
   $sql_1027 = "SELECT id, data, produto, descricao, cancelado, motivo FROM pln1027";
   // seleciona os registros
   $stmt_1027 = $PDOC->prepare($sql_1027);
   $stmt_1027->execute();

   while ($cancel = $stmt_1027->fetch(PDO::FETCH_ASSOC)) {        

	$sql_pfat = "SELECT endereco, est, descricao  FROM curva_abc  where pfat = $cancel[produto]";
	$stmt_array_pfat = $PDOE->prepare($sql_pfat);
	$stmt_array_pfat->execute();
	$return = $stmt_array_pfat->fetch(PDO::FETCH_ASSOC);
   
	$estacao = substr($return['endereco'], 1, 3);
	$endereco = substr($return['endereco'], 4, 6);
	
		$sql = "INSERT INTO cancelados(data, estacao, endereco, motivo, estoque, descricao, cancelado, codigo) VALUES(:data, :estacao, :endereco, :motivo, :estoque, :descricao, :cancelado, :codigo)";
		$stmt = $PDOC->prepare($sql);
		$stmt->bindParam(':data', $cancel['data']);
		$stmt->bindParam(':estacao', $estacao);
		$stmt->bindParam(':endereco', $endereco);
		$stmt->bindParam(':motivo', $cancel['motivo']);
		$stmt->bindParam(':estoque', $return['est']);
		$stmt->bindParam(':descricao', $cancel['descricao']);
		$stmt->bindParam(':cancelado', $cancel['cancelado']);
		$stmt->bindParam(':codigo', $cancel['produto']);
		if ($stmt->execute()) {
			header('Location: cancelar.php');
		} else {
			echo "Erro ao cadastrar";
			print_r($stmt->errorInfo());
			header('Location: addcancelados.php');
		}
	
	


}            


?>