<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

// abre a conexão
$PDO = db_connect_conf();
$PDOD = db_connect();

$user_colaborador = $_SESSION['user'];
$nome_colaborador = $_SESSION['nome'];
$grupo = $_SESSION['grupo'];

$secondsWait = 60;
header("Refresh:$secondsWait");

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();


$data = $datacontabil;
$isoDate = dateConvert($data);

// SQL para selecionar os registros
$sql_arry_atzpdg = "SELECT  id, data, hora1, hora2, hora3, hora4, hora5, hora6, hora7, hora8, hora9, hora10, hora11  FROM atzpedidao  ";
// seleciona os registros
$stmt_array_atzpdg = $PDO->prepare($sql_arry_atzpdg);
$stmt_array_atzpdg->execute();

// SQL para selecionar os registros
$sql_arry = "SELECT id,  meta, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total, media, porcen FROM monitorapedidao where codigo = '".$_SESSION['user']."' order by total desc";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();

// SQL para selecionar os registros
$sql_arry_total = "SELECT  total FROM monitorapedidao where codigo = '".$_SESSION['user']."' order by total desc";
// seleciona os registros
$stmt_arry_total = $PDO->prepare($sql_arry_total);
$stmt_arry_total->execute();
$total =$stmt_arry_total->fetchColumn();


// SQL para selecionar os registros
$sql_arry_hist = "SELECT id, data, grupo, meta, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total, media, porcen FROM historicoanalise where codigo = '".$_SESSION['user']."' order by data desc";
// seleciona os registros
$stmt_array_hist = $PDO->prepare($sql_arry_hist);
$stmt_array_hist->execute();

// SQL para selecionar os registros
$sql_arry_conec = "SELECT micro, nome, total, media, porcen, hora FROM atzconf order by hora desc";
// seleciona os registros
$stmt_array_conec = $PDO->prepare($sql_arry_conec);
$stmt_array_conec->execute();

// SQL para selecionar os registros
$sql_cont_conec = "SELECT count(*) FROM atzconf ";
// seleciona os registros
$stmt_cont_conec = $PDO->prepare($sql_cont_conec);
$stmt_cont_conec->execute();
$total_connect = $stmt_cont_conec->fetchColumn();

//meta
$sql_meta = "SELECT meta FROM monitorapedidao where codigo = '".$_SESSION['user']."' ";
$stmt_meta = $PDO->prepare($sql_meta);
$stmt_meta->execute();
$meta = $stmt_meta->fetchColumn();
//total
$sql_sum_total = "SELECT total FROM monitorapedidao where codigo = '".$_SESSION['user']."' ";
$stmt_sum_total = $PDO->prepare($sql_sum_total);
$stmt_sum_total->execute();
$soma_total = $stmt_sum_total->fetchColumn();
// media
$sql_media = "SELECT media FROM monitorapedidao where codigo = '".$_SESSION['user']."' ";
$stmt_media = $PDO->prepare($sql_media);
$stmt_media->execute();
$media = $stmt_media->fetchColumn();
// porcentagem
$sql_porcen = "SELECT porcen FROM monitorapedidao where codigo = '".$_SESSION['user']."' ";
$stmt_porcen = $PDO->prepare($sql_porcen);
$stmt_porcen->execute();
$porcen = $stmt_porcen->fetchColumn();


//hora de atualizacao grafico
$sql_soma_atual = "SELECT unidades FROM produtividade_hora where data = '$isoDate' order by unidades desc ";
$stmt_soma_atual = $PDO->prepare($sql_soma_atual);
$stmt_soma_atual->execute();
$soma_atual = $stmt_soma_atual->fetchColumn();


//hora de atualizacao producao
$sql_hora_atz_producao = "SELECT hora FROM atz where";
$stmt_hora_atz_producao = $PDO->prepare($sql_hora_atz_producao);
$stmt_hora_atz_producao->execute();
$hora_producao = $stmt_hora_atz_producao->fetchColumn();
 

?>


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
</head>

<body
       style="background-image:  url('../img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; margin-top: 10px">
    <header>
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light"
            style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">
            <a class="navbar-brand" href="">GrupoSC</a>
        </nav>
        <br>
        <div class="container" align="center">
            <div class="container" style="width: 90%;">
                <div class="border border-danger"
                    style="margin-top: 25px; background-color: white; color: black; width: 90%; border-radius: 20px; ">
                    <br>
                    <div class="row justify-content-start">
                        <div class="col-md-2 mb-2" style="margin-left: 10%;">
                            <label type="text" class="form-control"
                                style="text-align: center; font-size: 12px;">Meta</label>
                            <label type="text" class="form-control"
                                style="text-align: center; font-size: 12px;"><?php echo number_format($meta, 0, ',', '.') ?></label>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label type="text" class="form-control"
                                style="text-align: left; font-size: 12px;">Conferente</label>
                            <label type="text" class="form-control"
                                style="text-align: left; font-size: 12px;"><?php echo $_SESSION['nome'] ?> </label>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label type="text" class="form-control"
                                style="text-align: center; font-size: 12px;">Total</label>
                            <label type="text" class="form-control"
                                style="text-align: center; font-size: 12px;"><?php echo number_format($soma_total, 0, ',', '.') ?></label>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label type="text" class="form-control"
                                style="text-align: center; font-size: 12px;">Media</label>
                            <label type="text" class="form-control"
                                style="text-align: center; font-size: 12px;"><?php echo number_format($media, 0, ',', '.') ?></label>
                        </div>
                        <div class="col-md-9 mb-1"
                            style="margin-left: 3%;margin-top: -10px; border-top-style: groove;border-left-style: groove;border-bottom-style: groove;">
                            <div class="progress-bar"
                                style=" height: 40px; padding: 5px; margin-top: 2px; background-color: #ccc; display: flex;max-width: 100%;  width: <?php echo ($porcen*100) .'%' ?>;  background-color: <?php if($porcen < 0.70) : echo 'red';  elseif($porcen >= 0.70 & $porcen <= 0.90) : echo  'Yellow'; else : echo 'green'; endif ?>;">
                            </div>
                        </div>
                        <div class="col-md-2 mb-1"
                            style=" margin-top: -10px; border-top-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <label type="text" class="form-control"
                                style="margin-top: 5%; text-align: center; font-size: 12px;"><?php echo number_format(($porcen * 100), 2, ',', ' ') .'%' ?></label>
                        </div>
                    </div>
                    <div
                        style="margin-top: 15px; font-size: 14px; background-color: white; color: black; width: 90%; border-radius: 20px; ">
                        <br>
                        <table align="center" id="tbl" width="100%" style="font-size: 12px; color: black;">
                            <thead>
                                <?php while ($analise0096 = $stmt_array_atzpdg->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr style="background-color: Gray;">
                                    <td align="center"
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                        <?php  echo $analise0096['hora1'] ?></td>
                                    <td align="center"
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                        <?php echo $analise0096['hora2'] ?></td>
                                    <td align="center"
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                        <?php echo $analise0096['hora3'] ?></td>
                                    <td align="center"
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                        <?php echo $analise0096['hora4'] ?></td>
                                    <td align="center"
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                        <?php echo $analise0096['hora5'] ?></td>
                                    <td align="center"
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                        <?php echo $analise0096['hora6'] ?></td>
                                    <td align="center"
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                        <?php echo $analise0096['hora7'] ?></td>
                                    <td align="center"
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                        <?php echo $analise0096['hora8'] ?></td>
                                    <td align="center"
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                        <?php echo $analise0096['hora9'] ?></td>
                                    <td align="center"
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                        <?php echo $analise0096['hora10'] ?></td>
                                    <td align="center"
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                        <?php echo $analise0096['hora11'] ?></td>

                                </tr>
                                <?php endwhile; ?>
                            </thead>
                            <tbody>
                                <?php while ($analise = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr>
                                    <td align="center"
                                        <?php if($analise['h1'] >= ($analise['meta'] - 100)) : $cor1 = 'green' ; elseif($analise['h1'] <= ($analise['meta']*(90/100)) & $analise['h1'] >= ($analise['meta']*(70/100))): echo $cor1 = 'DarkOrange'; elseif($analise['h1'] == 0): echo $cor1 = 'White'; else : $cor1 = 'red' ; endif ?>
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor1)?>;">
                                        <b><?php echo number_format($analise['h1'], 0, ',', '.') ?>
                                    </td>
                                    <td align="center"
                                        <?php if($analise['h2'] >= ($analise['meta'] - 100)) : $cor2 = 'green' ; elseif($analise['h2'] <= ($analise['meta']*(90/100)) & $analise['h2'] >= ($analise['meta']*(70/100))): echo $cor2 = 'DarkOrange'; elseif($analise['h2'] == 0): echo $cor2 = 'White'; else : $cor2 = 'red' ; endif ?>
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor2)?>;">
                                        <b><?php echo number_format($analise['h2'], 0, ',', '.') ?>
                                    </td>
                                    <td align="center"
                                        <?php if($analise['h3'] >= ($analise['meta'] - 100)) : $cor3 = 'green' ; elseif($analise['h3'] <= ($analise['meta']*(90/100)) & $analise['h3'] >= ($analise['meta']*(70/100))): echo $cor3 = 'DarkOrange'; elseif($analise['h3'] == 0): echo $cor3 = 'White'; else : $cor3 = 'red' ; endif ?>
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor3)?>;">
                                        <b><?php echo number_format($analise['h3'], 0, ',', '.') ?>
                                    </td>
                                    <td align="center"
                                        <?php if($analise['h4'] >= ($analise['meta'] - 100)) : $cor4= 'green' ; elseif($analise['h4'] <= ($analise['meta']*(90/100)) & $analise['h4'] >= ($analise['meta']*(70/100))): echo $cor4= 'DarkOrange'; elseif($analise['h4'] == 0): echo $cor4= 'White'; else : $cor4= 'red' ; endif ?>
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor4)?>;">
                                        <b><?php echo number_format($analise['h4'], 0, ',', '.') ?>
                                    </td>
                                    <td align="center"
                                        <?php if($analise['h5'] >= ($analise['meta'] - 100)) : $cor5= 'green' ; elseif($analise['h5'] <= ($analise['meta']*(90/100)) & $analise['h5'] >= ($analise['meta']*(70/100))): echo $cor5 = 'DarkOrange'; elseif($analise['h5'] == 0): echo $cor5 = 'White'; else : $cor5 = 'red' ; endif ?>
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor5)?>;">
                                        <b><?php echo number_format($analise['h5'], 0, ',', '.') ?>
                                    </td>
                                    <td align="center"
                                        <?php if($analise['h6'] >= ($analise['meta'] - 100)) : $cor6 = 'green' ; elseif($analise['h6'] <= ($analise['meta']*(90/100)) & $analise['h6'] >= ($analise['meta']*(70/100))): echo $cor6 = 'DarkOrange'; elseif($analise['h6'] == 0): echo $cor6 = 'White'; else : $cor6 = 'red' ; endif ?>
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor6)?>;">
                                        <b><?php echo number_format($analise['h6'], 0, ',', '.') ?>
                                    </td>
                                    <td align="center"
                                        <?php if($analise['h7'] >= ($analise['meta'] - 100)) : $cor7 = 'green' ; elseif($analise['h7'] <= ($analise['meta']*(90/100)) & $analise['h7'] >= ($analise['meta']*(70/100))): echo $cor7 = 'DarkOrange'; elseif($analise['h7'] == 0): echo $cor7 = 'White'; else : $cor7 = 'red' ; endif ?>
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor7)?>;">
                                        <b><?php echo number_format($analise['h7'], 0, ',', '.') ?>
                                    </td>
                                    <td align="center"
                                        <?php if($analise['h8'] >= ($analise['meta'] - 100)) : $cor8 = 'green' ; elseif($analise['h8'] <= ($analise['meta']*(90/100)) & $analise['h8'] >= ($analise['meta']*(70/100))): echo $cor8 = 'DarkOrange'; elseif($analise['h8'] == 0): echo $cor8 = 'White'; else : $cor8 = 'red' ; endif ?>
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor8)?>;">
                                        <b><?php echo number_format($analise['h8'], 0, ',', '.') ?>
                                    </td>
                                    <td align="center"
                                        <?php if($analise['h9'] >= ($analise['meta'] - 100)) : $cor9 = 'green' ; elseif($analise['h9'] <= ($analise['meta']*(90/100)) & $analise['h9'] >= ($analise['meta']*(70/100))): echo $cor9 = 'DarkOrange'; elseif($analise['h9'] == 0): echo $cor9 = 'White'; else : $cor9 = 'red' ; endif ?>
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor9)?>;">
                                        <b><?php echo number_format($analise['h9'], 0, ',', '.') ?>
                                    </td>
                                    <td align="center"
                                        <?php if($analise['h10'] >= ($analise['meta'] - 100)) : $cor10 = 'green' ; elseif($analise['h10'] <= ($analise['meta']*(90/100)) & $analise['h10'] >= ($analise['meta']*(70/100))): echo $cor10 = 'DarkOrange'; elseif($analise['h10'] == 0): echo $cor10 = 'White'; else : $cor10 = 'red' ; endif ?>
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor10)?>;">
                                        <b><?php echo number_format($analise['h10'], 0, ',', '.') ?>
                                    </td>
                                    <td align="center"
                                        <?php if($analise['h11'] >= ($analise['meta'] - 100)) : $cor11 = 'green' ; elseif($analise['h11'] <= ($analise['meta']*(90/100)) & $analise['h11'] >= ($analise['meta']*(70/100))): echo $cor11 = 'DarkOrange'; elseif($analise['h11'] == 0): echo $cor11 = 'White'; else : $cor11 = 'red' ; endif ?>
                                        style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor11)?>;">
                                        <b><?php  echo number_format($analise['h11'], 0, ',', '.') ?>
                                    </td>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
            <br>
            <div class="container" id="interface"
                style="background-image:  url('../img/pagina.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; margin-top: -10px ; width: 60%; border-radius: 10px;">
                <canvas id="myHoraP" style=" width : 120%; height : 300px"></canvas>
                <script type="text/javascript" src="../chart/jquery.min.js"></script>
                <script type="text/javascript" src="../chart/Chart.js"></script>
                <script src="js/app11.js"></script>
            </div>
            <div class="container" align="center" style="margin-top: 2px;">
                <div class="border border-danger"
                    style=" font-size: 12px; background-color: white; color: black; width: 80%; border-radius: 20px; min-height: 500px;">
                    <br>
                    <table align="center" id="tbl" width="95%" style="font-size: 12px; color: black;">
                        <thead>
                            <tr style="background-color: Gray;">
                                <td
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo 'Data' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo 'Grupo' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo 'Meta' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php  echo '19:00' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo'20:00' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo '21:00' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo '22:00' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo '23:00' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo '00:00' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo '01:00' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo '02:00' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo '03:00' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo '04:00' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo '05:00' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo 'Total'?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo 'Media' ?></td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo '%' ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($analise_hist = $stmt_array_hist->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                    <b><?php echo dateConvert($analise_hist['data']) ?>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                    <b><?php echo $analise_hist['grupo'] ?>
                                </td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <b><?php echo $analise_hist['meta'] ?>
                                </td>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['h1'] >= ($analise_hist['meta'] - 100)) : $cor1 = 'green' ; elseif($analise_hist['h1'] <= ($analise_hist['meta']*(90/100)) & $analise_hist['h1'] >= ($analise_hist['meta']*(70/100))): echo $cor1 = 'DarkOrange'; elseif($analise_hist['h1'] == 0): echo $cor1 = 'White'; else : $cor1 = 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor1)?>;">
                                    <b><?php echo number_format($analise_hist['h1'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['h2'] >= ($analise_hist['meta'] - 100)) : $cor2 = 'green' ; elseif($analise_hist['h2'] <= ($analise_hist['meta']*(90/100)) & $analise_hist['h2'] >= ($analise_hist['meta']*(70/100))): echo $cor2 = 'DarkOrange'; elseif($analise_hist['h2'] == 0): echo $cor2 = 'White'; else : $cor2 = 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor2)?>;">
                                    <b><?php echo number_format($analise_hist['h2'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['h3'] >= ($analise_hist['meta'] - 100)) : $cor3 = 'green' ; elseif($analise_hist['h3'] <= ($analise_hist['meta']*(90/100)) & $analise_hist['h3'] >= ($analise_hist['meta']*(70/100))): echo $cor3 = 'DarkOrange'; elseif($analise_hist['h3'] == 0): echo $cor3 = 'White'; else : $cor3 = 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor3)?>;">
                                    <b><?php echo number_format($analise_hist['h3'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['h4'] >= ($analise_hist['meta'] - 100)) : $cor4= 'green' ; elseif($analise_hist['h4'] <= ($analise_hist['meta']*(90/100)) & $analise_hist['h4'] >= ($analise_hist['meta']*(70/100))): echo $cor4= 'DarkOrange'; elseif($analise_hist['h4'] == 0): echo $cor4= 'White'; else : $cor4= 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor4)?>;">
                                    <b><?php echo number_format($analise_hist['h4'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['h5'] >= ($analise_hist['meta'] - 100)) : $cor5= 'green' ; elseif($analise_hist['h5'] <= ($analise_hist['meta']*(90/100)) & $analise_hist['h5'] >= ($analise_hist['meta']*(70/100))): echo $cor5 = 'DarkOrange'; elseif($analise_hist['h5'] == 0): echo $cor5 = 'White'; else : $cor5 = 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor5)?>;">
                                    <b><?php echo number_format($analise_hist['h5'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['h6'] >= ($analise_hist['meta'] - 100)) : $cor6 = 'green' ; elseif($analise_hist['h6'] <= ($analise_hist['meta']*(90/100)) & $analise_hist['h6'] >= ($analise_hist['meta']*(70/100))): echo $cor6 = 'DarkOrange'; elseif($analise_hist['h6'] == 0): echo $cor6 = 'White'; else : $cor6 = 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor6)?>;">
                                    <b><?php echo number_format($analise_hist['h6'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['h7'] >= ($analise_hist['meta'] - 100)) : $cor7 = 'green' ; elseif($analise_hist['h7'] <= ($analise_hist['meta']*(90/100)) & $analise_hist['h7'] >= ($analise_hist['meta']*(70/100))): echo $cor7 = 'DarkOrange'; elseif($analise_hist['h7'] == 0): echo $cor7 = 'White'; else : $cor7 = 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor7)?>;">
                                    <b><?php echo number_format($analise_hist['h7'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['h8'] >= ($analise_hist['meta'] - 100)) : $cor8 = 'green' ; elseif($analise_hist['h8'] <= ($analise_hist['meta']*(90/100)) & $analise_hist['h8'] >= ($analise_hist['meta']*(70/100))): echo $cor8 = 'DarkOrange'; elseif($analise_hist['h8'] == 0): echo $cor8 = 'White'; else : $cor8 = 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor8)?>;">
                                    <b><?php echo number_format($analise_hist['h8'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['h9'] >= ($analise_hist['meta'] - 100)) : $cor9 = 'green' ; elseif($analise_hist['h9'] <= ($analise_hist['meta']*(90/100)) & $analise_hist['h9'] >= ($analise_hist['meta']*(70/100))): echo $cor9 = 'DarkOrange'; elseif($analise_hist['h9'] == 0): echo $cor9 = 'White'; else : $cor9 = 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor9)?>;">
                                    <b><?php echo number_format($analise_hist['h9'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['h10'] >= ($analise_hist['meta'] - 100)) : $cor10 = 'green' ; elseif($analise_hist['h10'] <= ($analise_hist['meta']*(90/100)) & $analise_hist['h10'] >= ($analise_hist['meta']*(70/100))): echo $cor10 = 'DarkOrange'; elseif($analise_hist['h10'] == 0): echo $cor10 = 'White'; else : $cor10 = 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor10)?>;">
                                    <b><?php echo number_format($analise_hist['h10'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['h11'] >= ($analise_hist['meta'] - 100)) : $cor11 = 'green' ; elseif($analise_hist['h11'] <= ($analise_hist['meta']*(90/100)) & $analise_hist['h11'] >= ($analise_hist['meta']*(70/100))): echo $cor11 = 'DarkOrange'; elseif($analise_hist['h11'] == 0): echo $cor11 = 'White'; else : $cor11 = 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor11)?>;">
                                    <b><?php  echo number_format($analise_hist['h11'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <b><?php echo number_format($analise_hist['total'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <b><?php echo number_format($analise_hist['media'], 0, ',', '.') ?>
                                </td>
                                <td align="center"
                                    <?php if($analise_hist['porcen'] > .9) : $corporcen = 'green' ; elseif($analise_hist['porcen'] <= 0.9 & $analise_hist['porcen'] >= 0.70): echo $corporcen = 'DarkOrange'; elseif($analise_hist['porcen'] < 0.00): echo $corporcen = 'White'; else : $corporcen = 'red' ; endif ?>
                                    style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($corporcen)?>;">
                                    <b><?php if($analise_hist['porcen'] > 10.00) : echo number_format($analise_hist['porcen']*10, 2, ',', ' ') .'%';  else : echo number_format($analise_hist['porcen']*100, 2, ',', ' ') .'%'; endif ?>
                                </td>

                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <br>
                </div>
                <br>

            </div>
        </div>
    </header>
    <br>

    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: blanchedalmond; ">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed
            By Thiago
            Cesar Napoleão</p>
    </footer>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>
</body>

</html>

<?php




$color = array(
    array('porcen'), 
    
  );

function cor($porcen)
{
if ($porcen <= 0.8)
{
    return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;color:red"';
}
else if ($porcen > 0.8 && $porcen <= 0.99)
{
    return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color:DarkOrange"';
}
else
{
    return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color:green"';
}
}

$color = array(
    array('valor'), 
    
  );

function corh($valor)
{
if ($valor > 0 && $valor <= 500)
{
    return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;color:red"';
}
else if ($valor > 500 && $valor < 800)
{
    return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color:DarkOrange"';
}
else if($valor > 800)
{
    return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color:green"';
}
else {
    return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color:White"';
}
}
?>