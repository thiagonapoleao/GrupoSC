<?php
require_once '../init.php';

// abre a conexão
$PDO = db_connect_conf();
$PDOD = db_connect();

$data = isset($_POST['data']) ? $_POST['data'] : null;

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();


$isoDate = dateConvert($data);

// SQL para selecionar os registros
$sql_arry_0096 = "SELECT id, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total FROM pln0096r where nome = 'NOME' ";
// seleciona os registros
$stmt_array_0096 = $PDO->prepare($sql_arry_0096);
$stmt_array_0096->execute();

// SQL para selecionar os registros
$sql_arry = "SELECT id, grupo, meta, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total, media, porcen FROM historicoanalise where data = '$data' order by total desc";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();

// soma hora 1
$sql_sum = "SELECT SUM(h1) FROM historicoanalise where data = '$data'";
$stmt_sum = $PDO->prepare($sql_sum);
$stmt_sum->execute();
$somah1 = $stmt_sum->fetchColumn();
// soma hora 2
$sql_sum2 = "SELECT SUM(h2) FROM historicoanalise where data = '$data'";
$stmt_sum2 = $PDO->prepare($sql_sum2);
$stmt_sum2->execute();
$somah2 = $stmt_sum2->fetchColumn();
// soma hora 3
$sql_sum3 = "SELECT SUM(h3) FROM historicoanalise where data = '$data'";
$stmt_sum3 = $PDO->prepare($sql_sum3);
$stmt_sum3->execute();
$somah3 = $stmt_sum3->fetchColumn();
// soma hora 4
$sql_sum4 = "SELECT SUM(h4) FROM historicoanalise where data = '$data'";
$stmt_sum4 = $PDO->prepare($sql_sum4);
$stmt_sum4->execute();
$somah4 = $stmt_sum4->fetchColumn();
// soma hora 5
$sql_sum5 = "SELECT SUM(h5) FROM historicoanalise where data = '$data'";
$stmt_sum5 = $PDO->prepare($sql_sum5);
$stmt_sum5->execute();
$somah5 = $stmt_sum5->fetchColumn();
// soma hora 6
$sql_sum6 = "SELECT SUM(h6) FROM historicoanalise where data = '$data'";
$stmt_sum6 = $PDO->prepare($sql_sum6);
$stmt_sum6->execute();
$somah6 = $stmt_sum6->fetchColumn();
// soma hora 7
$sql_sum7 = "SELECT SUM(h7) FROM historicoanalise where data = '$data'";
$stmt_sum7 = $PDO->prepare($sql_sum7);
$stmt_sum7->execute();
$somah7 = $stmt_sum7->fetchColumn();
// soma hora 8
$sql_sum8 = "SELECT SUM(h8) FROM historicoanalise where data = '$data'";
$stmt_sum8 = $PDO->prepare($sql_sum8);
$stmt_sum8->execute();
$somah8 = $stmt_sum8->fetchColumn();
// soma hora 9
$sql_sum9 = "SELECT SUM(h9) FROM historicoanalise where data = '$data'";
$stmt_sum9 = $PDO->prepare($sql_sum9);
$stmt_sum9->execute();
$somah9 = $stmt_sum9->fetchColumn();
// soma hora 10
$sql_sum10 = "SELECT SUM(h10) FROM historicoanalise where data = '$data'";
$stmt_sum10 = $PDO->prepare($sql_sum10);
$stmt_sum10->execute();
$somah10 = $stmt_sum10->fetchColumn();
// soma hora 11 
$sql_sum11 = "SELECT SUM(h11) FROM historicoanalise where data = '$data'";
$stmt_sum11 = $PDO->prepare($sql_sum11);
$stmt_sum11->execute();
$somah11 = $stmt_sum11->fetchColumn();
// soma hora total
$sql_sum_total = "SELECT SUM(total) FROM historicoanalise where data = '$data'";
$stmt_sum_total = $PDO->prepare($sql_sum_total);
$stmt_sum_total->execute();
$soma_total = $stmt_sum_total->fetchColumn();
// media
$sql_media = "SELECT AVG(total) FROM historicoanalise where data = '$data'";
$stmt_media = $PDO->prepare($sql_media);
$stmt_media->execute();
$media = $stmt_media->fetchColumn();


// cont hora 1
$sql_cont = "SELECT count(h1) FROM historicoanalise where data = '$data' and h1 > 0";
$stmt_cont = $PDO->prepare($sql_cont);
$stmt_cont->execute();
$cont1 = $stmt_cont->fetchColumn();
// cont hora 2
$sql_cont2 = "SELECT count(h2) FROM historicoanalise where data = '$data' and h2 > 0";
$stmt_cont2 = $PDO->prepare($sql_cont2);
$stmt_cont2->execute();
$cont2 = $stmt_cont2->fetchColumn();
// cont hora 3
$sql_cont3 = "SELECT count(h3) FROM historicoanalise where data = '$data' and h3 > 0";
$stmt_cont3 = $PDO->prepare($sql_cont3);
$stmt_cont3->execute();
$cont3 = $stmt_cont3->fetchColumn();
// cont hora 4
$sql_cont4 = "SELECT count(h4) FROM historicoanalise where data = '$data' and h4 > 0";
$stmt_cont4 = $PDO->prepare($sql_cont4);
$stmt_cont4->execute();
$cont4 = $stmt_cont4->fetchColumn();
// cont hora 5
$sql_cont5 = "SELECT count(h5) FROM historicoanalise where data = '$data' and h5 > 0";
$stmt_cont5 = $PDO->prepare($sql_cont5);
$stmt_cont5->execute();
$cont5 = $stmt_cont5->fetchColumn();
// cont hora 6
$sql_cont6 = "SELECT count(h6) FROM historicoanalise where data = '$data' and h6 > 0";
$stmt_cont6 = $PDO->prepare($sql_cont6);
$stmt_cont6->execute();
$cont6 = $stmt_cont6->fetchColumn();
// cont hora 7
$sql_cont7 = "SELECT count(h7) FROM historicoanalise where data = '$data' and h7 > 0";
$stmt_cont7 = $PDO->prepare($sql_cont7);
$stmt_cont7->execute();
$cont7 = $stmt_cont7->fetchColumn();
// cont hora 8
$sql_cont8 = "SELECT count(h8) FROM historicoanalise where data = '$data' and h8 > 0";
$stmt_cont8 = $PDO->prepare($sql_cont8);
$stmt_cont8->execute();
$cont8 = $stmt_cont8->fetchColumn();
// cont hora 9
$sql_cont9 = "SELECT count(h9) FROM historicoanalise where data = '$data' and h9 > 0";
$stmt_cont9 = $PDO->prepare($sql_cont9);
$stmt_cont9->execute();
$cont9 = $stmt_cont9->fetchColumn();
// cont hora 10
$sql_cont10 = "SELECT count(h10) FROM historicoanalise where data = '$data' and h10 > 0";
$stmt_cont10 = $PDO->prepare($sql_cont10);
$stmt_cont10->execute();
$cont10 = $stmt_cont10->fetchColumn();
// cont hora 11 
$sql_cont11 = "SELECT count(h11) FROM historicoanalise where data = '$data' and h11 > 0";
$stmt_cont11 = $PDO->prepare($sql_cont11);
$stmt_cont11->execute();
$cont11 = $stmt_cont11->fetchColumn();



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
    <!-- Adicionando JQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
</head>

<body
style="background: linear-gradient(to top,#004e92, #000428, #000000); background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light" style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">  
            <a class="navbar-brand" href="">GrupoSC</a>
            <div id="collapse-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Conferencia
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="analiseconferencia.php">Painel da Produtividade</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="analiseconferenciadata.php">Produtividade por Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="analiseconferenciaindividual.php">Produtividade por
                                Conferente</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <br>
        <div class="container" align="center" style="margin-top: 40px;">
            <div class="border border-danger"
                style="margin-top: 40px; font-size: 12px; background-color: white; color: black; width: 100%; border-radius: 20px; min-height: 500px;">
                <br>
                <form action="analiseconferenciadata.php" method="post">
                    <div class="form-row" style="margin-left: 125px;">
                        <div class="col-md-2 mb-2">
                            <input type="date" name="data" id="data" style="font-size: 12px;" class="form-control"
                                value="<?php echo $data ?>" autofocus autocomplete="off" readonly
                                onfocus="this.removeAttribute('readonly');this.select();">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" style="font-size: 12px;">Consulta</button>
                        </div>
                    </div>
                </form>
                <table align="center" id="tbl" width="95%" style="font-size: 12px; color: black;">
                    <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Conferente / Hora' ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont1, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont2, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont3, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont4, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont5, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont6, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont7, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont8, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont9, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont10, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont11, 0, ',', '.') ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            </td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <td></td>
                            <td> </td>
                            <td
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Produção / Hora' ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah1, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah2, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah3, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah4, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah5, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah6, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah7, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah8, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah9, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah10, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah11, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($soma_total, 0, ',', '.') ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($media, 0, ',', '.') ?></td>
                            <td align="center"> <a class="dropdown-item" href="add.php" style="color: blue;">salvar</a>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </thead>

                    <thead>
                        <?php while ($analise0096 = $stmt_array_0096->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr style="background-color: Gray;">
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Grupo' ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Meta' ?></td>
                            <td
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Nome' ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php  echo $analise0096['h1'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $analise0096['h2'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $analise0096['h3'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $analise0096['h4'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $analise0096['h5'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $analise0096['h6'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $analise0096['h7'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $analise0096['h8'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $analise0096['h9'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $analise0096['h10'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $analise0096['h11'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $analise0096['total'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Media' ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo '%' ?></td>
                            <td>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </thead>
                    <tbody>
                        <?php while ($analise = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                <b><?php echo $analise['grupo'] ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <b><?php echo $analise['meta'] ?>
                            </td>
                            <td
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                <b><?php echo $analise['nome'] ?>
                            </td>
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
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <b><?php echo number_format($analise['total'], 0, ',', '.') ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <b><?php echo number_format($analise['media'], 0, ',', '.') ?>
                            </td>
                            <td align="center"
                                <?php if($analise['porcen'] > .9) : $corporcen = 'green' ; elseif($analise['porcen'] <= 0.9 & $analise['porcen'] >= 0.70): echo $corporcen = 'DarkOrange'; elseif($analise['porcen'] < 0.00): echo $corporcen = 'White'; else : $corporcen = 'red' ; endif ?>
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($corporcen)?>;">
                                <b><?php if($analise['porcen'] > 10.00) : echo number_format($analise['porcen']*10, 2, ',', ' ') .'%';  else : echo number_format($analise['porcen']*100, 2, ',', ' ') .'%'; endif ?>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <br>
            </div>
            <br>
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