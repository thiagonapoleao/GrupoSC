<?php
require_once '../init.php';

// abre a conexão
$PDO = db_connect_conf();
$PDOD = db_connect();

$secondsWait = 60;
header("Refresh:$secondsWait");

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();


$isoDate = dateConvert($datacontabil);

$convDate = dateConvert($datacontabil);

// SQL para selecionar os registros
$sql_arry_0096 = "SELECT id, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total FROM pln0096r where nome = 'NOME' ";
// seleciona os registros
$stmt_array_0096 = $PDO->prepare($sql_arry_0096);
$stmt_array_0096->execute();

// SQL para selecionar os registros
$sql_arry_0096_unid = "SELECT id, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total FROM pln0096r where nome = 'NOME' ";
// seleciona os registros
$stmt_array_0096_unid = $PDO->prepare($sql_arry_0096_unid);
$stmt_array_0096_unid->execute();

// SQL para selecionar os registros
$sql_arry = "SELECT id, grupo, meta, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total, media, porcen FROM analise  order by total desc";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();

// SQL para selecionar os registros
$sql_arry_hora = "SELECT  h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11 FROM PLN0096R where nome = 'TOTAL'";
// seleciona os registros
$stmt_array_hora = $PDO->prepare($sql_arry_hora);
$stmt_array_hora->execute();

// SQL para selecionar os registros
$sql_arry_conec = "SELECT micro, nome, total, media, porcen, hora FROM atzconf order by total desc";
// seleciona os registros
$stmt_array_conec = $PDO->prepare($sql_arry_conec);
$stmt_array_conec->execute();

// SQL para selecionar os registros
$sql_cont_conec = "SELECT count(*) FROM atzconf ";
// seleciona os registros
$stmt_cont_conec = $PDO->prepare($sql_cont_conec);
$stmt_cont_conec->execute();
$total_connect = $stmt_cont_conec->fetchColumn();


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
$sql_media = "SELECT AVG(media) FROM analise where media > 0";
$stmt_media = $PDO->prepare($sql_media);
$stmt_media->execute();
$media = $stmt_media->fetchColumn();


// cont hora 1
$sql_cont = "SELECT count(h1) FROM analise where h1 > 100";
$stmt_cont = $PDO->prepare($sql_cont);
$stmt_cont->execute();
$cont1 = $stmt_cont->fetchColumn();
// cont hora 2
$sql_cont2 = "SELECT count(h2) FROM analise where h2 > 100";
$stmt_cont2 = $PDO->prepare($sql_cont2);
$stmt_cont2->execute();
$cont2 = $stmt_cont2->fetchColumn();
// cont hora 3
$sql_cont3 = "SELECT count(h3) FROM analise where h3 > 100";
$stmt_cont3 = $PDO->prepare($sql_cont3);
$stmt_cont3->execute();
$cont3 = $stmt_cont3->fetchColumn();
// cont hora 4
$sql_cont4 = "SELECT count(h4) FROM analise where h4 > 100";
$stmt_cont4 = $PDO->prepare($sql_cont4);
$stmt_cont4->execute();
$cont4 = $stmt_cont4->fetchColumn();
// cont hora 5
$sql_cont5 = "SELECT count(h5) FROM analise where h5 > 100";
$stmt_cont5 = $PDO->prepare($sql_cont5);
$stmt_cont5->execute();
$cont5 = $stmt_cont5->fetchColumn();
// cont hora 6
$sql_cont6 = "SELECT count(h6) FROM analise where h6 > 100";
$stmt_cont6 = $PDO->prepare($sql_cont6);
$stmt_cont6->execute();
$cont6 = $stmt_cont6->fetchColumn();
// cont hora 7
$sql_cont7 = "SELECT count(h7) FROM analise where h7 > 100";
$stmt_cont7 = $PDO->prepare($sql_cont7);
$stmt_cont7->execute();
$cont7 = $stmt_cont7->fetchColumn();
// cont hora 8
$sql_cont8 = "SELECT count(h8) FROM analise where h8 > 100";
$stmt_cont8 = $PDO->prepare($sql_cont8);
$stmt_cont8->execute();
$cont8 = $stmt_cont8->fetchColumn();
// cont hora 9
$sql_cont9 = "SELECT count(h9) FROM analise where h9 > 100";
$stmt_cont9 = $PDO->prepare($sql_cont9);
$stmt_cont9->execute();
$cont9 = $stmt_cont9->fetchColumn();
// cont hora 10
$sql_cont10 = "SELECT count(h10) FROM analise where h10 > 100";
$stmt_cont10 = $PDO->prepare($sql_cont10);
$stmt_cont10->execute();
$cont10 = $stmt_cont10->fetchColumn();
// cont hora 11 
$sql_cont11 = "SELECT count(h11) FROM analise where h11 > 100";
$stmt_cont11 = $PDO->prepare($sql_cont11);
$stmt_cont11->execute();
$cont11 = $stmt_cont11->fetchColumn();

while ($analisehora = $stmt_array_hora->fetch(PDO::FETCH_ASSOC)) :

    if ((int)str_replace(".", "", $analisehora['h1']) > 200) {
        $contmediah1 = 1;
    } else {
        $contmediah1 = 0;
    }
    if ((int)str_replace(".", "", $analisehora['h2']) > 200) {
        $contmediah2 = 1;
    } else {
        $contmediah2 = 0;
    }
    if ((int)str_replace(".", "", $analisehora['h3']) > 200) {
        $contmediah3 = 1;
    } else {
        $contmediah3 = 0;
    }
    if ((int)str_replace(".", "", $analisehora['h4']) > 200) {
        $contmediah4 = 1;
    } else {
        $contmediah4 = 0;
    }
    if ((int)str_replace(".", "", $analisehora['h5']) > 200) {
        $contmediah5 = 1;
    } else {
        $contmediah5 = 0;
    }
    if ((int)str_replace(".", "", $analisehora['h6']) > 200) {
        $contmediah6 = 1;
    } else {
        $contmediah6 = 0;
    }
    if ((int)str_replace(".", "", $analisehora['h7']) > 200) {
        $contmediah7 = 1;
    } else {
        $contmediah7 = 0;
    }
    if ((int)str_replace(".", "", $analisehora['h8']) > 200) {
        $contmediah8 = 1;
    } else {
        $contmediah8 = 0;
    }
    if ((int)str_replace(".", "", $analisehora['h9']) > 200) {
        $contmediah9 = 1;
    } else {
        $contmediah9 = 0;
    }
    if ((int)str_replace(".", "", $analisehora['h10']) > 200) {
        $contmediah10 = 1;
    } else {
        $contmediah10 = 0;
    }
    if ((int)str_replace(".", "", $analisehora['h11']) > 200) {
        $contmediah11 = 1;
    } else {
        $contmediah11 = 0;
    }

endwhile;

$contmedia = $contmediah1 + $contmediah2 +  $contmediah3 + $contmediah4 + $contmediah5 + $contmediah6 + $contmediah7 + $contmediah8 + $contmediah9 + $contmediah10 + $contmediah11;

// cont hora 11 
$sql_cont_conf = "SELECT count(nome) FROM analise where total > 1500";
$stmt_conf = $PDO->prepare($sql_cont_conf);
$stmt_conf->execute();
$qtconf = $stmt_conf->fetchColumn();

if ($qtconf > 0) {
    $mediaconf = ($soma_total / $qtconf) / $contmedia;
} else {
    $mediaconf = 0;
}


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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>

</head>

<body style="background-image:  url('../img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light" style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">
            <a class="navbar-brand" href="../inicial.php">GrupoSC</a>
            <div id="collapse-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CPD
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../demonstrativo.php">Demonstrativo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../fechamento.php">Fechamento de Rotas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../transportadoras.php">Placas de Veiculos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../impressaolaser.php">Termino de Impresão</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cancelamento
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../cancelamento/cancelar.php">Cancelar Itens</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../cancelamento/estacao.php">Lista de Cancelados</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Conferencia
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Analise da Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Atualiza Produção</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Metas por Grupo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Painel da Produtividade</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="analiseconferenciadata.php">Produtividade por Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="analiseconferenciaindividual.php">Produtividade por
                                Conferente</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Produção da Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Produção da Conferencia</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pedido Grande
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../produtividade/analisepedidao.php">Painel da
                                Produtividade </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="">Produtividade
                                por Conferente</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tratativa
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../tratativa.php">Tratativa de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../tratativa/from-listaerros.php">Lista de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../upm/from-grafico.php">Grafico</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../cadastro/cadastro.php">Cadastro</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Grandes Redes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../grandesredes.php">Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="grandesredes/import.php">Importar Arquivo</a>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
        <div>
            <!-- Modal -->
            <div id="meuModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Conteúdo do modal-->
                    <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <!-- Corpo do modal -->
                        <div class="modal-body" style="font-size: 10px; color: whitesmoke;">
                            <div id="wrap">
                                <div class="container">
                                    <div class="row">
                                        <form class="form-horizontal" action="0096.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                            <fieldset>
                                                <!-- Form Name -->
                                                <legend>Import PLN0096R</legend>
                                                <!-- File Button -->
                                                <div class="form-group">
                                                    <label class="col-md-8 control-label" for="filebutton">Selecione o
                                                        Arquivo</label>
                                                    <div class="col-md-4">
                                                        <input type="file" name="file" id="file" class="input-large">
                                                    </div>

                                                </div>
                                                <!-- Button -->
                                                <div class="form-gr oup">
                                                    <label class="col-md-8 control-label" for="singlebutton">Produção da
                                                        Conferencia</label>
                                                    <div class="col-md-8">
                                                        <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <!-- Modal -->
            <div id="meuModal-linha" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Conteúdo do modal-->
                    <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <!-- Corpo do modal -->
                        <div class="modal-body" style="font-size: 10px; color: whitesmoke;">
                            <div id="wrap">
                                <div class="container">
                                    <div class="row">
                                        <form class="form-horizontal" action="0096r-linha.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                            <fieldset>
                                                <!-- Form Name -->
                                                <legend>Import PLN0096R</legend>
                                                <!-- File Button -->
                                                <div class="form-group">
                                                    <label class="col-md-8 control-label" for="filebutton">Selecione o
                                                        Arquivo</label>
                                                    <div class="col-md-4">
                                                        <input type="file" name="file" id="file" class="input-large">
                                                    </div>

                                                </div>
                                                <!-- Button -->
                                                <div class="form-gr oup">
                                                    <label class="col-md-8 control-label" for="singlebutton">Produção da
                                                        Linha</label>
                                                    <div class="col-md-8">
                                                        <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </divl>
            <!-- Modal -->
            <div class="modal fade" id="addanalise" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Salvar a produção
                                da conferencia!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="add.php" method="post" class="needs-validation" id="formSearch" novalidate>
                                <div class="form-group" style="color: whitesmoke;">
                                    <label for="recipient-name" class="col-form-label">Data:</label>
                                    <input type="date" name="data" id="data" style="width: 200px;" value="<?php echo $convDate ?>" class="form-control" placeholder="Matrícula" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group" style="color: whitesmoke;">
                                    <label for="recipient-name" class="col-form-label">Matricula:</label>
                                    <input type="text" name="user" id="user" style="width: 200px;" class="form-control" placeholder="Matrícula" autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group" style="color: whitesmoke;">
                                    <label for="message-text" class="col-form-label">Senha:</label>
                                    <input type="password" name="password" id="password" style="width: 280px;" class="form-control" placeholder="Senha" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container" align="center" style="margin-top: 40px;">
            <div class="border border-danger" style="margin-top: 40px; font-size: 10px; background-color: white; color: black; width: 85%; border-radius: 20px; min-height: 500px;">
                <br>
                <table align="center" id="tbl" width="90%" style="font-size: 10px; color: black;">
                    <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Conferente / Hora' ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont1, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont2, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont3, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont4, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont5, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont6, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont7, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont8, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont9, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont10, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($cont11, 0, ',', '.') ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <td> </td>
                            <td></td>
                            <td style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Media / Hora' ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if (($cont1) > 0) : echo number_format(($somah1 / $cont1), 0, ',', '.');
                                else : echo 0;
                                endif ?>
                            </td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if (($cont2) > 0) : echo number_format(($somah2 / $cont2), 0, ',', '.');
                                else : echo 0;
                                endif ?>
                            </td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if (($cont3) > 0) : echo number_format(($somah3 / $cont3), 0, ',', '.');
                                else : echo 0;
                                endif ?>
                            </td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if (($cont4) > 0) : echo number_format(($somah4 / $cont4), 0, ',', '.');
                                else : echo 0;
                                endif ?>
                            </td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if (($cont5) > 0) : echo number_format(($somah5 / $cont5), 0, ',', '.');
                                else : echo 0;
                                endif ?>
                            </td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if (($cont6) > 0) : echo number_format(($somah6 / $cont6), 0, ',', '.');
                                else : echo 0;
                                endif ?>
                            </td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if (($cont7) > 0) : echo number_format(($somah7 / $cont7), 0, ',', '.');
                                else : echo 0;
                                endif ?>
                            </td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if (($cont8) > 0) : echo number_format(($somah8 / $cont8), 0, ',', '.');
                                else : echo 0;
                                endif ?>
                            </td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if (($cont9) > 0) : echo number_format(($somah9 / $cont9), 0, ',', '.');
                                else : echo 0;
                                endif ?>
                            </td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if (($cont10) > 0) : echo number_format(($somah10 / $cont10), 0, ',', '.');
                                else : echo 0;
                                endif ?>
                            </td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if (($cont11) > 0) : echo number_format(($somah11 / $cont11), 0, ',', '.');
                                else : echo 0;
                                endif ?>
                            </td>
                            <td align="center"> <a class="btn btn-primary btn-sm" style="font-size: 10px;" href="#" role="button" data-toggle="modal" data-target="#meuModal">PLN0096R-C</a></td>
                            <td align="center"> <a class="btn btn-primary btn-sm" style="font-size: 10px;" href="#" role="button" data-toggle="modal" data-target="#meuModal-linha">PLN0096R-L</a></td>
                            <td align="center"> <a class="btn btn-primary btn-sm" style="font-size: 10px;" href="#" role="button" data-toggle="modal" data-target="#addanalise">Salvar</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <td style="font-size: 10px;"><?php echo $datacontabil ?> </td>
                            <td></td>
                            <td style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Produção / Hora' ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah1, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah2, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah3, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah4, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah5, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah6, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah7, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah8, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah9, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah10, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($somah11, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($soma_total, 0, ',', '.') ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo number_format($media, 0, ',', '.') ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>


                    <thead>
                        <?php while ($analise0096 = $stmt_array_0096->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr style="background-color: Gray;">
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 70px; min-height: 20px;">
                                    <?php echo 'Grupo' ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo 'Meta' ?></td>
                                <td style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 200px; min-height: 20px;">
                                    <?php echo 'Nome' ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $analise0096['h1'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $analise0096['h2'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $analise0096['h3'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $analise0096['h4'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $analise0096['h5'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $analise0096['h6'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $analise0096['h7'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $analise0096['h8'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $analise0096['h9'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $analise0096['h10'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $analise0096['h11'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;min-width: 70px; min-height: 20px;">
                                    <?php echo $analise0096['total'] ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo 'Media' ?></td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo '%' ?></td>
                                <td></td>
                            </tr>
                        <?php endwhile; ?>
                    </thead>
                    <tbody>
                        <?php while ($analise = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                    <b><?php echo $analise['grupo'] ?>
                                </td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <b><?php echo $analise['meta'] ?>
                                </td>
                                <td style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                    <b><?php echo $analise['nome'] ?>
                                </td>
                                <td align="center" <?php if ($analise['h1'] >= ($analise['meta'] - 100)) : $cor1 = 'green';
                                                    elseif ($analise['h1'] <= ($analise['meta'] * (90 / 100)) & $analise['h1'] >= ($analise['meta'] * (70 / 100))) : echo $cor1 = 'DarkOrange';
                                                    elseif ($analise['h1'] == 0) : echo $cor1 = 'White';
                                                    else : $cor1 = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor1) ?>;">
                                    <b><?php echo number_format($analise['h1'], 0, ',', '.') ?>
                                </td>
                                <td align="center" <?php if ($analise['h2'] >= ($analise['meta'] - 100)) : $cor2 = 'green';
                                                    elseif ($analise['h2'] <= ($analise['meta'] * (90 / 100)) & $analise['h2'] >= ($analise['meta'] * (70 / 100))) : echo $cor2 = 'DarkOrange';
                                                    elseif ($analise['h2'] == 0) : echo $cor2 = 'White';
                                                    else : $cor2 = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor2) ?>;">
                                    <b><?php echo number_format($analise['h2'], 0, ',', '.') ?>
                                </td>
                                <td align="center" <?php if ($analise['h3'] >= ($analise['meta'] - 100)) : $cor3 = 'green';
                                                    elseif ($analise['h3'] <= ($analise['meta'] * (90 / 100)) & $analise['h3'] >= ($analise['meta'] * (70 / 100))) : echo $cor3 = 'DarkOrange';
                                                    elseif ($analise['h3'] == 0) : echo $cor3 = 'White';
                                                    else : $cor3 = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor3) ?>;">
                                    <b><?php echo number_format($analise['h3'], 0, ',', '.') ?>
                                </td>
                                <td align="center" <?php if ($analise['h4'] >= ($analise['meta'] - 100)) : $cor4 = 'green';
                                                    elseif ($analise['h4'] <= ($analise['meta'] * (90 / 100)) & $analise['h4'] >= ($analise['meta'] * (70 / 100))) : echo $cor4 = 'DarkOrange';
                                                    elseif ($analise['h4'] == 0) : echo $cor4 = 'White';
                                                    else : $cor4 = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor4) ?>;">
                                    <b><?php echo number_format($analise['h4'], 0, ',', '.') ?>
                                </td>
                                <td align="center" <?php if ($analise['h5'] >= ($analise['meta'] - 100)) : $cor5 = 'green';
                                                    elseif ($analise['h5'] <= ($analise['meta'] * (90 / 100)) & $analise['h5'] >= ($analise['meta'] * (70 / 100))) : echo $cor5 = 'DarkOrange';
                                                    elseif ($analise['h5'] == 0) : echo $cor5 = 'White';
                                                    else : $cor5 = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor5) ?>;">
                                    <b><?php echo number_format($analise['h5'], 0, ',', '.') ?>
                                </td>
                                <td align="center" <?php if ($analise['h6'] >= ($analise['meta'] - 100)) : $cor6 = 'green';
                                                    elseif ($analise['h6'] <= ($analise['meta'] * (90 / 100)) & $analise['h6'] >= ($analise['meta'] * (70 / 100))) : echo $cor6 = 'DarkOrange';
                                                    elseif ($analise['h6'] == 0) : echo $cor6 = 'White';
                                                    else : $cor6 = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor6) ?>;">
                                    <b><?php echo number_format($analise['h6'], 0, ',', '.') ?>
                                </td>
                                <td align="center" <?php if ($analise['h7'] >= ($analise['meta'] - 100)) : $cor7 = 'green';
                                                    elseif ($analise['h7'] <= ($analise['meta'] * (90 / 100)) & $analise['h7'] >= ($analise['meta'] * (70 / 100))) : echo $cor7 = 'DarkOrange';
                                                    elseif ($analise['h7'] == 0) : echo $cor7 = 'White';
                                                    else : $cor7 = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor7) ?>;">
                                    <b><?php echo number_format($analise['h7'], 0, ',', '.') ?>
                                </td>
                                <td align="center" <?php if ($analise['h8'] >= ($analise['meta'] - 100)) : $cor8 = 'green';
                                                    elseif ($analise['h8'] <= ($analise['meta'] * (90 / 100)) & $analise['h8'] >= ($analise['meta'] * (70 / 100))) : echo $cor8 = 'DarkOrange';
                                                    elseif ($analise['h8'] == 0) : echo $cor8 = 'White';
                                                    else : $cor8 = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor8) ?>;">
                                    <b><?php echo number_format($analise['h8'], 0, ',', '.') ?>
                                </td>
                                <td align="center" <?php if ($analise['h9'] >= ($analise['meta'] - 100)) : $cor9 = 'green';
                                                    elseif ($analise['h9'] <= ($analise['meta'] * (90 / 100)) & $analise['h9'] >= ($analise['meta'] * (70 / 100))) : echo $cor9 = 'DarkOrange';
                                                    elseif ($analise['h9'] == 0) : echo $cor9 = 'White';
                                                    else : $cor9 = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor9) ?>;">
                                    <b><?php echo number_format($analise['h9'], 0, ',', '.') ?>
                                </td>
                                <td align="center" <?php if ($analise['h10'] >= ($analise['meta'] - 100)) : $cor10 = 'green';
                                                    elseif ($analise['h10'] <= ($analise['meta'] * (90 / 100)) & $analise['h10'] >= ($analise['meta'] * (70 / 100))) : echo $cor10 = 'DarkOrange';
                                                    elseif ($analise['h10'] == 0) : echo $cor10 = 'White';
                                                    else : $cor10 = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor10) ?>;">
                                    <b><?php echo number_format($analise['h10'], 0, ',', '.') ?>
                                </td>
                                <td align="center" <?php if ($analise['h11'] >= ($analise['meta'] - 100)) : $cor11 = 'green';
                                                    elseif ($analise['h11'] <= ($analise['meta'] * (90 / 100)) & $analise['h11'] >= ($analise['meta'] * (70 / 100))) : echo $cor11 = 'DarkOrange';
                                                    elseif ($analise['h11'] == 0) : echo $cor11 = 'White';
                                                    else : $cor11 = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($cor11) ?>;">
                                    <b><?php echo number_format($analise['h11'], 0, ',', '.') ?>
                                </td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <b><?php echo number_format($analise['total'], 0, ',', '.') ?>
                                </td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <b><?php echo number_format($analise['media'], 0, ',', '.') ?>
                                </td>
                                <td align="center" <?php if ($analise['porcen'] > .9) : $corporcen = 'green';
                                                    elseif ($analise['porcen'] <= 0.9 & $analise['porcen'] >= 0.70) : echo $corporcen = 'DarkOrange';
                                                    elseif ($analise['porcen'] < 0.00) : echo $corporcen = 'White';
                                                    else : $corporcen = 'red';
                                                    endif ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: <?php echo ($corporcen) ?>;">
                                    <b><?php if ($analise['porcen'] > 10.00) : echo number_format($analise['porcen'] * 10, 2, ',', ' ') . '%';
                                        else : echo number_format($analise['porcen'] * 100, 2, ',', ' ') . '%';
                                        endif ?>
                                </td>
                                <td></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <br>
            </div>
            <br>
            <div class="container" id="interface" style="background-image:  url('img/pagina.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; margin-top: 10px ; width: 60%; border-radius: 10px;">
                <canvas id="myChart" style=" width : 120%; height : 400px"></canvas>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
                <script src="js/app.js"></script>
            </div>
            <br>
            <div id="interface" style="background-image:  url('img/pagina.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; margin-top: 10px ; width: 60%; border-radius: 10px;">
                <canvas id="myProd" style=" width : 120%; height : 400px"></canvas>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
                <script src="js/app10.js"></script>
            </div>
            <br>
            <div class="border border-danger" style="margin-top: 10px; font-size: 10px; background-color: white; color: black; width: 60%; border-radius: 20px;">
                <br>
                <table align="center" id="tbl" width="90%" style="font-size: 10px; color: black;">
                    <thead>
                        <tr style="background-color: Gray;">
                            <p>Conferentes Conectados: <?php echo $total_connect ?></p>
                            <p style="margin-right: 500px;"> <a href="deleteconectados.php">Reiniciar
                                    Conectados</a></p>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; margin-top: -2px;">
                                <?php echo 'Grupo' ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Nome' ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Total' ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Media' ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo '%' ?></td>
                            <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Conectado as' ?></td>
                            <td>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($analise = $stmt_array_conec->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                    <b><?php echo $analise['micro'] ?>
                                </td>
                                <td style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                    <b><?php echo $analise['nome'] ?>
                                </td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <b><?php echo $analise['total'] ?>
                                </td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <b><?php echo $analise['media'] ?>
                                </td>
                                <td align="center" <?php echo $analise['porcen'] ?> style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <b><?php echo $analise['porcen'] ?>
                                </td>
                                <td align="center" style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                    <b><?php echo $analise['hora'] ?>
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
        document.getElementById("codigo").onblur = function() {
            myFunction()
        };

        document.getElementById("rota").onblur = function() {
            mFunction()
        };

        $("#codigo").blur(function() {
            $.ajax({
                url: 'search.php',
                type: 'post',
                dataType: 'json',
                data: {
                    searchAdress: 1,
                    codigo: $("#codigo").val()
                }
            }).done(function(data) {
                if (data) {
                    $("#operador").val(data.nome);
                } else {
                    alert("Codigo não cadastrado!");
                    $("#operador").val("");
                }
            }).fail(function(data) {
                console.log(data)
            })
        });


        $("#rota").blur(function() {
            $.ajax({
                url: 'search.php',
                type: 'post',
                dataType: 'json',
                data: {
                    searchAdres: 1,
                    rota: $("#rota").val()
                }
            }).done(function(data) {
                if (data) {
                    $("#codmotorista").val(data.codigo);
                } else {
                    alert("Codigo não cadastrado!");
                    $("#codmotorista").val("");
                }
            }).fail(function(data) {
                console.log(data)
            })
        });

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
    if ($porcen <= 0.8) {
        return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;color:red"';
    } else if ($porcen > 0.8 && $porcen <= 0.99) {
        return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color:DarkOrange"';
    } else {
        return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color:green"';
    }
}

$color = array(
    array('valor'),

);

function corh($valor)
{
    if ($valor > 0 && $valor <= 500) {
        return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;color:red"';
    } else if ($valor > 500 && $valor < 800) {
        return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color:DarkOrange"';
    } else if ($valor > 800) {
        return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color:green"';
    } else {
        return 'style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color:White"';
    }
}
?>