<?php

require_once '../init.php';

// resgata os valores do formulário
$data = isset($_POST['data']) ? $_POST['data'] : null;
$entrada = isset($_POST['horario']) ? $_POST['horario'] : null;
$placa = isset($_POST['placa']) ? $_POST['placa'] : null;
$motorista = isset($_POST['motorista']) ? $_POST['motorista'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$ajudante = isset($_POST['ajudante']) ? $_POST['ajudante'] : null;
$cpf2 = isset($_POST['cpf2']) ? $_POST['cpf2'] : null;
$obs = isset($_POST['obs']) ? $_POST['obs'] : null;
$empresa = isset($_POST['empresa']) ? $_POST['empresa'] : null;
$vigilante = isset($_POST['vigilante']) ? $_POST['vigilante'] : null;
$dtsaida = isset($_POST['dtsaida']) ? $_POST['dtsaida'] : null;
$saida = isset($_POST['saida']) ? $_POST['saida'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;


$isoDate = dateConvert($data);

// atualiza o banco
$PDOPORT = db_connect_port();
$sql = "UPDATE entrada_veiculo SET data = :data, entrada = :entrada, placa = :placa, nome = :nome, cpf = :cpf, nome1 = :nome1, cpf1 = :cpf1, obs = :obs, vigilante = :vigilante, empresa = :empresa, datasaida = :datasaida, saida = :saida WHERE id = :id ";
$stmt = $PDOPORT->prepare($sql);
$stmt->bindParam(':data', $data);
$stmt->bindParam(':entrada', $entrada);
$stmt->bindParam(':placa', ucwords($placa));
$stmt->bindParam(':nome', ucwords($motorista));
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':nome1', ucwords($ajudante));
$stmt->bindParam(':cpf1', $cpf2);
$stmt->bindParam(':empresa', ucwords($empresa));
$stmt->bindParam(':obs', ucwords($obs));
$stmt->bindParam(':vigilante', ucwords($vigilante));
$stmt->bindParam(':datasaida', $dtsaida);
$stmt->bindParam(':saida', $saida);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
	header('Location: entrada_recebimento.php');
} else {
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}
