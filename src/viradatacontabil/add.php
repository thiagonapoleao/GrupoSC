<?php

require_once '../init.php';
$PDO = db_connect();
// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
$stmt_array_datacontabil = $PDO->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();


// pega os dados do formuário
$data = isset($_POST['data']) ? $_POST['data'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$maticuala = isset($_POST['user']) ? $_POST['user'] : null;

$hora = date("H:i");

$PDOO = db_connect_acesso();
$sql_operador = "SELECT nome FROM login where user = '$maticuala'";
$stmt_array_operador = $PDOO->prepare($sql_operador);
$stmt_array_operador->execute();
$operador = $stmt_array_operador->fetchColumn();


// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($data);

if(empty($operador)){
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('Maricula não cadastrada, tente novamente!');
	window.location.href='../inicial.php';
	</script>");
	
}else {
		if($password == 'somentecpdconsegue'){

			$sql_dell = "DELETE FROM datacontabil";
			$stmt_dell = $PDO->prepare($sql_dell);
			$stmt_dell->execute();

			// insere no banco
			$PDO = db_connect();
		
			$sql = "INSERT INTO datacontabil(data, hora, operador) VALUES(:data, :hora, :operador)";
			$stmt = $PDO->prepare($sql);
			$stmt->bindParam(':data', $isoDate);
			$stmt->bindParam(':hora', $hora);	
			$stmt->bindParam(':operador', $operador);
			if ($stmt->execute()) {
				header('Location: ../inicial.php');
			} else {
				echo "Erro ao cadastrar";
				print_r($stmt->errorInfo());
			}
	
		} else {
			echo ("<script LANGUAGE='JavaScript'>
			window.alert('Senha não confere, tente novamente!');
			window.location.href='../inicial.php';
			</script>");
		}
}

?>