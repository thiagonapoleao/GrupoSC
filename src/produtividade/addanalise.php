<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>GI - Gestão Integrada</title>
	<link rel="stylesheet" type="text/css" href="../css/stilo.css">
	<meta name="author" content="">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width" scale="1">
	<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<!-- Adicionando JQuery -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
	</script>

</head>

<body style="background: linear-gradient(to top,#004e92, #000428, #000000); background-attachment: fixed; background-size: 100% 100%; ">
	<header>

	</header>
</body>

</html>



<?php
require_once '../init.php';

$PDO = db_connect_conf();
$PDOD = db_connect();


$sql_del = "DELETE FROM analise";
$stmt_del = $PDO->prepare($sql_del);
$stmt_del->execute();

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

// SQL para selecionar os registros
$sql_arry_0096 = "SELECT  codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total FROM pln0096r  where codigo != '' and codigo !='CODIGO' ";
// seleciona os registros
$stmt_array_0096 = $PDO->prepare($sql_arry_0096);
$stmt_array_0096->execute();

$convdatacontabil = dateConvert($datacontabil);

while ($analise = $stmt_array_0096->fetch(PDO::FETCH_ASSOC)) :

	if (!isset($analise['cosdigo'])) {
		$sql_grupo = "SELECT micro FROM atzconf where codigo = '" . $analise['codigo'] . "' ";
		$stmt_grupo = $PDO->prepare($sql_grupo);
		$stmt_grupo->execute();
		$grupo =  $stmt_grupo->fetchColumn();

		$sql_meta = "SELECT meta FROM micro where micro = '$grupo'";
		$stmt_meta = $PDO->prepare($sql_meta);
		$stmt_meta->execute();
		$meta =  $stmt_meta->fetchColumn();

		if ($grupo == null) {
			$grupoconf = 'Sem Grupo';
			$metagrupo = 1000;
		} else {
			$grupoconf = $grupo;
			$metagrupo = $meta;
		}

		if ((int)$analise['h1'] > 0) {
			$hora1 =  str_replace('.', '', $analise['h1']);
		} else {
			$hora1 = 0;
		}
		if ((int)$analise['h2'] > 0) {
			$hora2 =  str_replace('.', '', $analise['h2']);
		} else {
			$hora2 = 0;
		}
		if ((int)$analise['h3'] > 0) {
			$hora3 =  str_replace('.', '', $analise['h3']);
		} else {
			$hora3 = 0;
		}
		if ((int)$analise['h4'] > 0) {
			$hora4 =  str_replace('.', '', $analise['h4']);
		} else {
			$hora4 = 0;
		}
		if ((int)$analise['h5'] > 0) {
			$hora5 =  str_replace('.', '', $analise['h5']);
		} else {
			$hora5 = 0;
		}
		if ((int)$analise['h6'] > 0) {
			$hora6 =  str_replace('.', '', $analise['h6']);
		} else {
			$hora6 = 0;
		}
		if ((int)$analise['h7'] > 0) {
			$hora7 =  str_replace('.', '', $analise['h7']);
		} else {
			$hora7 = 0;
		}
		if ((int)$analise['h8'] > 0) {
			$hora8 =  str_replace('.', '', $analise['h8']);
		} else {
			$hora8 = 0;
		}
		if ((int)$analise['h9'] > 0) {
			$hora9 =  str_replace('.', '', $analise['h9']);
		} else {
			$hora9 = 0;
		}
		if ((int)$analise['h10'] > 0) {
			$hora10 =  str_replace('.', '', $analise['h10']);
		} else {
			$hora10 = 0;
		}
		if ((int)$analise['h11'] > 0) {
			$hora11 =  str_replace('.', '', $analise['h11']);
		} else {
			$hora11 = 0;
		}


		if ((int)str_replace(".", "", $analise['h1']) > 200) {
			$contmediah1 = 1;
		} else {
			$contmediah1 = 0;
		}
		if ((int)str_replace(".", "", $analise['h2']) > 200) {
			$contmediah2 = 1;
		} else {
			$contmediah2 = 0;
		}
		if ((int)str_replace(".", "", $analise['h3']) > 200) {
			$contmediah3 = 1;
		} else {
			$contmediah3 = 0;
		}
		if ((int)str_replace(".", "", $analise['h4']) > 200) {
			$contmediah4 = 1;
		} else {
			$contmediah4 = 0;
		}
		if ((int)str_replace(".", "", $analise['h5']) > 200) {
			$contmediah5 = 1;
		} else {
			$contmediah5 = 0;
		}
		if ((int)str_replace(".", "", $analise['h6']) > 200) {
			$contmediah6 = 1;
		} else {
			$contmediah6 = 0;
		}
		if ((int)str_replace(".", "", $analise['h7']) > 200) {
			$contmediah7 = 1;
		} else {
			$contmediah7 = 0;
		}
		if ((int)str_replace(".", "", $analise['h8']) > 200) {
			$contmediah8 = 1;
		} else {
			$contmediah8 = 0;
		}
		if ((int)str_replace(".", "", $analise['h9']) > 200) {
			$contmediah9 = 1;
		} else {
			$contmediah9 = 0;
		}
		if ((int)str_replace(".", "", $analise['h10']) > 200) {
			$contmediah10 = 1;
		} else {
			$contmediah10 = 0;
		}
		if ((int)str_replace(".", "", $analise['h11']) > 200) {
			$contmediah11 = 1;
		} else {
			$contmediah11 = 0;
		}

		$contmedia = $contmediah1 + $contmediah2 +  $contmediah3 + $contmediah4 + $contmediah5 + $contmediah6 + $contmediah7 + $contmediah8 + $contmediah9 + $contmediah10 + $contmediah11;
		$total = str_replace('.', '', $analise['total']);


		if ($contmedia > 0) {
			$media = round($total / $contmedia);
		} else {
			$media = 0;
		}

		$porcen = (int)round($media) / (int)$metagrupo;
		$nome = strtoupper($analise['nome']);

		$sql = "INSERT INTO  analise (data, grupo, meta, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total, media, porcen) value(:data, :grupo, :meta, :codigo, :nome, :h1, :h2, :h3, :h4, :h5, :h6, :h7, :h8, :h9, :h10, :h11, :total, :media, :porcen )";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':data', $datacontabil);
		$stmt->bindParam(':grupo', $grupoconf);
		$stmt->bindParam(':meta', $metagrupo);
		$stmt->bindParam(':codigo', $analise['codigo']);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':h1', $hora1);
		$stmt->bindParam(':h2', $hora2);
		$stmt->bindParam(':h3', $hora3);
		$stmt->bindParam(':h4', $hora4);
		$stmt->bindParam(':h5', $hora5);
		$stmt->bindParam(':h6', $hora6);
		$stmt->bindParam(':h7', $hora7);
		$stmt->bindParam(':h8', $hora8);
		$stmt->bindParam(':h9', $hora9);
		$stmt->bindParam(':h10', $hora10);
		$stmt->bindParam(':h11', $hora11);
		$stmt->bindParam(':total', $total);
		$stmt->bindParam(':media', $media);
		$stmt->bindParam(':porcen', $porcen);
		$stmt->execute();
	}
endwhile;


$hora_atz = date('H:i:s');

$sql_del_atz = "DELETE FROM atz";
$stmt_del_atz = $PDO->prepare($sql_del_atz);
$stmt_del_atz->execute();

$sqlatz = "INSERT INTO  atz (data, hora) value(:data, :hora )";
$stmt_atz = $PDO->prepare($sqlatz);
$stmt_atz->bindParam(':data', $datacontabil);
$stmt_atz->bindParam(':hora', $hora_atz);
$stmt_atz->execute();

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();
$isoDate = dateConvert($datacontabil);

// SQL para selecionar os registros
$sql_arry_0096_hora = "SELECT id, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total FROM pln0096r where nome = 'NOME' ";
// seleciona os registros
$stmt_array_0096_hora = $PDO->prepare($sql_arry_0096_hora);
$stmt_array_0096_hora->execute();


// SQL para selecionar os registros
$sql_arry_0096_unid = "SELECT id, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total FROM pln0096r where nome = 'TOTAL' ";
// seleciona os registros
$stmt_array_0096_unid = $PDO->prepare($sql_arry_0096_unid);
$stmt_array_0096_unid->execute();

//hora de atualizacao grafico
$sql_soma_produtividade = "SELECT unidades FROM produtividade_hora where data = '$isoDate' order by unidades desc ";
$stmt_soma_produtividade = $PDO->prepare($sql_soma_produtividade);
$stmt_soma_produtividade->execute();
$soma_produtividade = $stmt_soma_produtividade->fetchColumn();

//hora de atualizacao producao
$sql_soma_producao = "SELECT sum(total) FROM analise where data = '$datacontabil' ";
$stmt_soma_producao = $PDO->prepare($sql_soma_producao);
$stmt_soma_producao->execute();
$soma_producao = $stmt_soma_producao->fetchColumn();


// soma hora 1
$sql_sum = "SELECT SUM(h1) FROM analise";
$stmt_sum = $PDO->prepare($sql_sum);
$stmt_sum->execute();
$somah1 = $stmt_sum->fetchColumn();
// soma hora 2
$sql_sum2 = "SELECT SUM(h2) FROM analise";
$stmt_sum2 = $PDO->prepare($sql_sum2);
$stmt_sum2->execute();
$somah2 = $stmt_sum2->fetchColumn();
// soma hora 3
$sql_sum3 = "SELECT SUM(h3) FROM analise";
$stmt_sum3 = $PDO->prepare($sql_sum3);
$stmt_sum3->execute();
$somah3 = $stmt_sum3->fetchColumn();
// soma hora 4
$sql_sum4 = "SELECT SUM(h4) FROM analise";
$stmt_sum4 = $PDO->prepare($sql_sum4);
$stmt_sum4->execute();
$somah4 = $stmt_sum4->fetchColumn();
// soma hora 5
$sql_sum5 = "SELECT SUM(h5) FROM analise";
$stmt_sum5 = $PDO->prepare($sql_sum5);
$stmt_sum5->execute();
$somah5 = $stmt_sum5->fetchColumn();
// soma hora 6
$sql_sum6 = "SELECT SUM(h6) FROM analise";
$stmt_sum6 = $PDO->prepare($sql_sum6);
$stmt_sum6->execute();
$somah6 = $stmt_sum6->fetchColumn();
// soma hora 7
$sql_sum7 = "SELECT SUM(h7) FROM analise";
$stmt_sum7 = $PDO->prepare($sql_sum7);
$stmt_sum7->execute();
$somah7 = $stmt_sum7->fetchColumn();
// soma hora 8
$sql_sum8 = "SELECT SUM(h8) FROM analise";
$stmt_sum8 = $PDO->prepare($sql_sum8);
$stmt_sum8->execute();
$somah8 = $stmt_sum8->fetchColumn();
// soma hora 9
$sql_sum9 = "SELECT SUM(h9) FROM analise";
$stmt_sum9 = $PDO->prepare($sql_sum9);
$stmt_sum9->execute();
$somah9 = $stmt_sum9->fetchColumn();
// soma hora 10
$sql_sum10 = "SELECT SUM(h10) FROM analise";
$stmt_sum10 = $PDO->prepare($sql_sum10);
$stmt_sum10->execute();
$somah10 = $stmt_sum10->fetchColumn();
// soma hora 11 
$sql_sum11 = "SELECT SUM(h11) FROM analise";
$stmt_sum11 = $PDO->prepare($sql_sum11);
$stmt_sum11->execute();
$somah11 = $stmt_sum11->fetchColumn();
// soma hora total
$sql_sum_total = "SELECT SUM(total) FROM analise";
$stmt_sum_total = $PDO->prepare($sql_sum_total);
$stmt_sum_total->execute();
$soma_total = $stmt_sum_total->fetchColumn();
// media
$sql_media = "SELECT AVG(total) FROM analise";
$stmt_media = $PDO->prepare($sql_media);
$stmt_media->execute();
$media = $stmt_media->fetchColumn();


// meta hora 1
$sql_meta = "SELECT meta FROM metahora where hora = '19:00'";
$stmt_meta = $PDO->prepare($sql_meta);
$stmt_meta->execute();
$metah1 = $stmt_meta->fetchColumn();
// meta hora 2
$sql_meta2 = "SELECT meta FROM metahora where hora = '20:00'";
$stmt_meta2 = $PDO->prepare($sql_meta2);
$stmt_meta2->execute();
$metah2 = $stmt_meta2->fetchColumn();
// meta hora 3
$sql_meta3 = "SELECT meta FROM metahora where hora = '21:00'";
$stmt_meta3 = $PDO->prepare($sql_meta3);
$stmt_meta3->execute();
$metah3 = $stmt_meta3->fetchColumn();
// meta hora 4
$sql_meta4 = "SELECT meta FROM metahora where hora = '22:00'";
$stmt_meta4 = $PDO->prepare($sql_meta4);
$stmt_meta4->execute();
$metah4 = $stmt_meta4->fetchColumn();
// meta hora 5
$sql_meta5 = "SELECT meta FROM metahora where hora = '23:00'";
$stmt_meta5 = $PDO->prepare($sql_meta5);
$stmt_meta5->execute();
$metah5 = $stmt_meta5->fetchColumn();
// meta hora 6
$sql_meta6 = "SELECT meta FROM metahora where hora = '00:00'";
$stmt_meta6 = $PDO->prepare($sql_meta6);
$stmt_meta6->execute();
$metah6 = $stmt_meta6->fetchColumn();
// meta hora 7
$sql_meta7 = "SELECT meta FROM metahora where hora = '01:00'";
$stmt_meta7 = $PDO->prepare($sql_meta7);
$stmt_meta7->execute();
$metah7 = $stmt_meta7->fetchColumn();
// meta hora 8
$sql_meta8 = "SELECT meta FROM metahora where hora = '02:00'";
$stmt_meta8 = $PDO->prepare($sql_meta8);
$stmt_meta8->execute();
$metah8 = $stmt_meta8->fetchColumn();
// meta hora 9
$sql_meta9 = "SELECT meta FROM metahora where hora = '03:00'";
$stmt_meta9 = $PDO->prepare($sql_meta9);
$stmt_meta9->execute();
$metah9 = $stmt_meta9->fetchColumn();
// meta hora 10
$sql_meta10 = "SELECT meta FROM metahora where hora = '04:00'";
$stmt_meta10 = $PDO->prepare($sql_meta10);
$stmt_meta10->execute();
$metah10 = $stmt_meta10->fetchColumn();
// meta hora 11 
$sql_meta11 = "SELECT meta FROM metahora where hora = '05:00'";
$stmt_meta11 = $PDO->prepare($sql_meta11);
$stmt_meta11->execute();
$metah11 = $stmt_meta11->fetchColumn();



if ((int)$soma_produtividade < $soma_producao) {
	$sql = "INSERT INTO produtividade_hora (data, hora, unidades) VALUES(:data, :hora, :unidades)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':data', $isoDate);
	$stmt->bindParam(':hora', $hora_atz);
	$stmt->bindParam(':unidades', $soma_producao);
	$stmt->execute();


	while ($analise0096h = $stmt_array_0096_hora->fetch(PDO::FETCH_ASSOC)) :
		$sqldel = "DELETE FROM pln0096rgrafico";
		$stmtdel = $PDO->prepare($sqldel);
		$stmtdel->execute();
		$sqlh1 = "INSERT INTO pln0096rgrafico (hora, producao, meta) VALUES(:hora, :producao, :meta)";
		$stmth1 = $PDO->prepare($sqlh1);
		$stmth1->bindParam(':hora', $analise0096h['h1']);
		$stmth1->bindParam(':producao', str_replace('.', '', $somah1));
		$stmth1->bindParam(':meta', $metah1);
		$stmth1->execute();
		$sqlh2 = "INSERT INTO pln0096rgrafico (hora, producao, meta) VALUES(:hora, :producao, :meta)";
		$stmth2 = $PDO->prepare($sqlh2);
		$stmth2->bindParam(':hora', $analise0096h['h2']);
		$stmth2->bindParam(':producao', str_replace('.', '', $somah2));
		$stmth2->bindParam(':meta', $metah2);
		$stmth2->execute();
		$sqlh3 = "INSERT INTO pln0096rgrafico (hora, producao, meta) VALUES(:hora, :producao, :meta)";
		$stmth3 = $PDO->prepare($sqlh3);
		$stmth3->bindParam(':hora', $analise0096h['h3']);
		$stmth3->bindParam(':producao', str_replace('.', '', $somah3));
		$stmth3->bindParam(':meta', $metah3);
		$stmth3->execute();
		$sqlh4 = "INSERT INTO pln0096rgrafico (hora, producao, meta) VALUES(:hora, :producao, :meta)";
		$stmth4 = $PDO->prepare($sqlh4);
		$stmth4->bindParam(':hora', $analise0096h['h4']);
		$stmth4->bindParam(':producao',  str_replace('.', '', $somah4));
		$stmth4->bindParam(':meta', $metah4);
		$stmth4->execute();
		$sqlh5 = "INSERT INTO pln0096rgrafico (hora, producao, meta) VALUES(:hora, :producao, :meta)";
		$stmth5 = $PDO->prepare($sqlh5);
		$stmth5->bindParam(':hora', $analise0096h['h5']);
		$stmth5->bindParam(':producao',  str_replace('.', '', $somah5));
		$stmth5->bindParam(':meta', $metah5);
		$stmth5->execute();
		$sqlh6 = "INSERT INTO pln0096rgrafico (hora, producao, meta) VALUES(:hora, :producao, :meta)";
		$stmth6 = $PDO->prepare($sqlh6);
		$stmth6->bindParam(':hora', $analise0096h['h6']);
		$stmth6->bindParam(':producao',  str_replace('.', '', $somah6));
		$stmth6->bindParam(':meta', $metah6);
		$stmth6->execute();
		$sqlh7 = "INSERT INTO pln0096rgrafico (hora, producao, meta) VALUES(:hora, :producao, :meta)";
		$stmth7 = $PDO->prepare($sqlh7);
		$stmth7->bindParam(':hora', $analise0096h['h7']);
		$stmth7->bindParam(':producao',  str_replace('.', '', $somah7));
		$stmth7->bindParam(':meta', $metah7);
		$stmth7->execute();
		$sqlh8 = "INSERT INTO pln0096rgrafico (hora, producao, meta) VALUES(:hora, :producao, :meta)";
		$stmth8 = $PDO->prepare($sqlh8);
		$stmth8->bindParam(':hora', $analise0096h['h8']);
		$stmth8->bindParam(':producao',  str_replace('.', '', $somah8));
		$stmth8->bindParam(':meta', $metah8);
		$stmth8->execute();
		$sqlh9 = "INSERT INTO pln0096rgrafico (hora, producao, meta) VALUES(:hora, :producao, :meta)";
		$stmth9 = $PDO->prepare($sqlh9);
		$stmth9->bindParam(':hora', $analise0096h['h9']);
		$stmth9->bindParam(':producao',  str_replace('.', '', $somah9));
		$stmth9->bindParam(':meta', $metah9);
		$stmth9->execute();
		$sqlh10 = "INSERT INTO pln0096rgrafico (hora, producao, meta) VALUES(:hora, :producao, :meta)";
		$stmth10 = $PDO->prepare($sqlh10);
		$stmth10->bindParam(':hora', $analise0096h['h10']);
		$stmth10->bindParam(':producao',  str_replace('.', '', $somah10));
		$stmth10->bindParam(':meta', $metah10);
		$stmth10->execute();
		$sqlh11 = "INSERT INTO pln0096rgrafico (hora, producao, meta) VALUES(:hora, :producao, :meta)";
		$stmth11 = $PDO->prepare($sqlh11);
		$stmth11->bindParam(':hora', $analise0096h['h11']);
		$stmth11->bindParam(':producao',  str_replace('.', '', $somah11));
		$stmth11->bindParam(':meta', $metah11);
		$stmth11->execute();
	endwhile;
}

echo ("<script LANGUAGE='JavaScript'>
window.alert('Arquivo salvo com sucesso!');
window.location.href='analiseconferencia.php';
</script>");
