<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

$PDO = db_connect_grandesredes();

$nome_colaborador = $_SESSION['nome'];
$rota = $_SESSION['rota'];

// pega os dados do formuário
$picklistlido = isset($_POST['picklist']) ? $_POST['picklist'] : null;


$picklist = substr($picklistlido , 0, -9);    
$volume =(INT) substr($picklistlido, 11, -1);    

// SQL para selecionar os registros
$sql_arry = "SELECT picklist, volume, cliente, razao,  rota, roteiro, data, estacao, produto, descricao, lote, validade,  qtd FROM PLN0048R where  picklist = '$picklist'  and volume = '$volume'";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();


// SQL para selecionar os registros
$sql_arry_rota = "SELECT rota  FROM PLN0048R where  picklist = '$picklist'  and volume = '$volume'";
// seleciona os registros
$stmt_array_rota = $PDO->prepare($sql_arry_rota);
$stmt_array_rota->execute();
$rtbanco = $stmt_array_rota->fetchColumn();

$sql_count_picklistlido = "select count(*) picklist from auditoria where picklistlido = '" . $picklistlido . "' ";
$stmt_count_picklistlido = $PDO->prepare($sql_count_picklistlido);
$stmt_count_picklistlido->execute();
$total_picklistlido = $stmt_count_picklistlido->fetchColumn();


$data = date('Y-m-d');
$hora = date('H:i:s');

if ($rtbanco == $rota  ) {
	if($total_picklistlido == 0){
		echo "iniciar";
		while ($rota790 = $stmt_array->fetch(PDO::FETCH_ASSOC)) :
			echo "iniciar1";		
				$sql = "INSERT INTO auditoria(picklistlido, picklist, volume, cliente, razao,  rota, roteiro, data, estacao, produto, descricao, lote, validade,  qtd, data_aud, hora, auditor) VALUES(:picklistlido, :picklist, :volume, :cliente, :razao, :rota, :roteiro, :data, :estacao, :produto, :descricao, :lote, :validade,  :qtd, :data_aud, :hora, :auditor)";
				$stmt = $PDO->prepare($sql);
				$stmt->bindParam(':picklistlido', $picklistlido);
				$stmt->bindParam(':picklist', $rota790['picklist']);
				$stmt->bindParam(':volume', $rota790['volume']);
				$stmt->bindParam(':cliente', $rota790['cliente']);
				$stmt->bindParam(':razao', $rota790['razao']);
				$stmt->bindParam(':rota', $rota790['rota']);
				$stmt->bindParam(':roteiro', $rota790['roteiro']);
				$stmt->bindParam(':data', $rota790['data']);
				$stmt->bindParam(':estacao', $rota790['estacao']);
				$stmt->bindParam(':produto', $rota790['produto']);
				$stmt->bindParam(':descricao', $rota790['descricao']);
				$stmt->bindParam(':lote', $rota790['lote']);
				$stmt->bindParam(':validade', $rota790['validade']);
				$stmt->bindParam(':qtd', $rota790['qtd']);
				$stmt->bindParam(':data_aud', $data);
				$stmt->bindParam(':hora', $hora );
				$stmt->bindParam(':auditor', $nome_colaborador );
				if ($stmt->execute()) {
					header('Location: auditoria.php');
				} else {
					echo "Erro ao cadastrar";
					print_r($stmt->errorInfo());
				}	
		endwhile;		
	} else {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Picklist Duplicado, tente novamente!');
		window.location.href='auditoria.php';
		</script>");
	}

} else {
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Picklist não pertence a rota auditada, tente novamente!');
	window.location.href='auditoria.php';
	</script>");
}