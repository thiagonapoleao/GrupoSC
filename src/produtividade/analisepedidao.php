<?php
require_once '../init.php';
echo "analisepedidao";

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
$sql_arry_atzpdg = "SELECT  id, data, hora1, hora2, hora3, hora4, hora5, hora6, hora7, hora8, hora9, hora10, hora11  FROM atzpedidao  ";
// seleciona os registros
$stmt_array_atzpdg = $PDO->prepare($sql_arry_atzpdg);
$stmt_array_atzpdg->execute();


// SQL para selecionar os registros
$sql_arry_0096_unid = "SELECT id, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total FROM pln0096r where nome = 'NOME' ";
// seleciona os registros
$stmt_array_0096_unid = $PDO->prepare($sql_arry_0096_unid);
$stmt_array_0096_unid->execute();

// SQL para selecionar os registros
$sql_arry = "SELECT id, tipo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total, meta,  media, porcen FROM monitorapedidao  order by total desc";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();

// SQL para selecionar os registros
$sql_arry_hora = "SELECT  h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11 FROM monitorapedidao";
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
$sql_sum = "SELECT count(conferente) FROM pln0048r1 where conferente > 0";
$stmt_sum = $PDO->prepare($sql_sum);
$stmt_sum->execute();
$somah01 = $stmt_sum->fetchColumn();
if(empty($somah01)){
    $somah1 = 0;
}
Else {
    $somah1 = $somah01;
}
// soma hora 2
$sql_sum2 = "SELECT count(conferente) FROM pln0048r2 where conferente > 0";
$stmt_sum2 = $PDO->prepare($sql_sum2);
$stmt_sum2->execute();
$somah02 = $stmt_sum2->fetchColumn();
if(empty($somah02)){
    $somah2 = 0;
}
Else {
    $somah2 = $somah02 - $somah1 ;
}
// soma hora 3
$sql_sum3 = "SELECT count(conferente) FROM pln0048r3 where conferente > 0";
$stmt_sum3 = $PDO->prepare($sql_sum3);
$stmt_sum3->execute();
$somah03 = $stmt_sum3->fetchColumn();
if(empty($somah03)){
    $somah3 = 0;
}
Else {
    $somah3 = $somah03 - $somah2;
}
// soma hora 4
$sql_sum4 = "SELECT count(conferente) FROM pln0048r4 where conferente > 0";
$stmt_sum4 = $PDO->prepare($sql_sum4);
$stmt_sum4->execute();
$somah04 = $stmt_sum4->fetchColumn();
if(empty($somah04)){
    $somah4 = 0;
}
Else {
    $somah4 = $somah04 -  $somah3;
}
// soma hora 5
$sql_sum5 = "SELECT count(conferente) FROM pln0048r5 where conferente > 0";
$stmt_sum5 = $PDO->prepare($sql_sum5);
$stmt_sum5->execute();
$somah05 = $stmt_sum5->fetchColumn();
if(empty($somah05)){
    $somah5 = 0;
}
Else {
    $somah5 = $somah05 - $somah4;
}
// soma hora 6
$sql_sum6 = "SELECT count(conferente) FROM pln0048r6 where conferente > 0";
$stmt_sum6 = $PDO->prepare($sql_sum6);
$stmt_sum6->execute();
$somah06 = $stmt_sum6->fetchColumn();
if(empty($somah06)){
    $somah6 = 0;
}
Else {
    $somah6 = $somah06 -  $somah5;
}
// soma hora 7
$sql_sum7 = "SELECT count(conferente) FROM pln0048r7 where conferente > 0";
$stmt_sum7 = $PDO->prepare($sql_sum7);
$stmt_sum7->execute();
$somah07 = $stmt_sum7->fetchColumn();
if(empty($somah07)){
    $somah7 = 0;
}
Else {
    $somah7 = $somah07 -  $somah6;
}
// soma hora 8
$sql_sum8 = "SELECT count(conferente) FROM pln0048r8 where conferente > 0";
$stmt_sum8 = $PDO->prepare($sql_sum8);
$stmt_sum8->execute();
$somah08 = $stmt_sum8->fetchColumn();
if(empty($somah08)){
    $somah8 = 0;
}
Else {
    $somah8 = $somah08 - $somah7;
}
// soma hora 9
$sql_sum9 = "SELECT count(conferente) FROM pln0048r9 where conferente > 0";
$stmt_sum9 = $PDO->prepare($sql_sum9);
$stmt_sum9->execute();
$somah09 = $stmt_sum9->fetchColumn();
if(empty($somah09)){
    $somah9 = 0;
}
Else {
    $somah9 = $somah09 -  $somah8;
}
// soma hora 10
$sql_sum10 = "SELECT count(conferente) FROM pln0048r10 where conferente > 0";
$stmt_sum10 = $PDO->prepare($sql_sum10);
$stmt_sum10->execute();
$somah010 = $stmt_sum10->fetchColumn();
if(empty($somah010)){
    $somah10 = 0;
}
Else {
    $somah10 = $somah010 -  $somah9;
}
// soma hora 11 
$sql_sum11 = "SELECT count(conferente) FROM pln0048r11 where conferente > 0";
$stmt_sum11 = $PDO->prepare($sql_sum11);
$stmt_sum11->execute();
$somah011 = $stmt_sum11->fetchColumn();
if(empty($somah011)){
    $somah11 = 0;
}
Else {
    $somah11 = $somah011 -  $somah10;
}

// soma hora total
    $soma_total =  $somah1 +  $somah2 +  $somah3 +  $somah4 +  $somah5 + $somah6 + $somah7 + $somah8 + $somah9 + $somah10 + $somah11;

// media
$sql_media = "SELECT AVG(media) FROM monitorapedidao where media > 0";
$stmt_media = $PDO->prepare($sql_media);
$stmt_media->execute();
$mediat = $stmt_media->fetchColumn();
if(empty($mediat)){
    $media = 0;
}
Else {
    $media = $mediat;
}



// cont hora 1
$sql_cont = "SELECT count(DISTINCT conferente) FROM pln0048r1 where conferente > 0";
$stmt_cont = $PDO->prepare($sql_cont);
$stmt_cont->execute();
$cont1 = $stmt_cont->fetchColumn();
// cont hora 2
$sql_cont2 = "SELECT count(DISTINCT conferente) FROM pln0048r2 where conferente > 0";
$stmt_cont2 = $PDO->prepare($sql_cont2);
$stmt_cont2->execute();
$cont2 = $stmt_cont2->fetchColumn();
// cont hora 3
$sql_cont3 = "SELECT count(DISTINCT conferente) FROM pln0048r3 where conferente > 0";
$stmt_cont3 = $PDO->prepare($sql_cont3);
$stmt_cont3->execute();
$cont3 = $stmt_cont3->fetchColumn();
// cont hora 4
$sql_cont4 = "SELECT count(DISTINCT conferente) FROM pln0048r4 where conferente > 0";
$stmt_cont4 = $PDO->prepare($sql_cont4);
$stmt_cont4->execute();
$cont4 = $stmt_cont4->fetchColumn();
// cont hora 5
$sql_cont5 = "SELECT count(DISTINCT conferente) FROM pln0048r5 where conferente > 0";
$stmt_cont5 = $PDO->prepare($sql_cont5);
$stmt_cont5->execute();
$cont5 = $stmt_cont5->fetchColumn();
// cont hora 6
$sql_cont6 = "SELECT count(DISTINCT conferente) FROM pln0048r6 where conferente > 0";
$stmt_cont6 = $PDO->prepare($sql_cont6);
$stmt_cont6->execute();
$cont6 = $stmt_cont6->fetchColumn();
// cont hora 7
$sql_cont7 = "SELECT count(DISTINCT conferente) FROM pln0048r7 where conferente > 0";
$stmt_cont7 = $PDO->prepare($sql_cont7);
$stmt_cont7->execute();
$cont7 = $stmt_cont7->fetchColumn();
// cont hora 8
$sql_cont8 = "SELECT count(DISTINCT conferente) FROM pln0048r8 where conferente > 0";
$stmt_cont8 = $PDO->prepare($sql_cont8);
$stmt_cont8->execute();
$cont8 = $stmt_cont8->fetchColumn();
// cont hora 9
$sql_cont9 = "SELECT count(DISTINCT conferente) FROM pln0048r9 where conferente > 0";
$stmt_cont9 = $PDO->prepare($sql_cont9);
$stmt_cont9->execute();
$cont9 = $stmt_cont9->fetchColumn();
// cont hora 10
$sql_cont10 = "SELECT count(DISTINCT conferente) FROM pln0048r10 where conferente > 0";
$stmt_cont10 = $PDO->prepare($sql_cont10);
$stmt_cont10->execute();
$cont10 = $stmt_cont10->fetchColumn();
// cont hora 11 
$sql_cont11 = "SELECT count(DISTINCT conferente) FROM pln0048r11 where conferente > 0";
$stmt_cont11 = $PDO->prepare($sql_cont11);
$stmt_cont11->execute();
$cont11 = $stmt_cont11->fetchColumn();

while ($analisehora = $stmt_array_hora->fetch(PDO::FETCH_ASSOC)) :

if((int) $analisehora['h1'] > 50){
    $contmediah1 = 1;
} else {
    $contmediah1 = 0;
}
if((int) $analisehora['h2'] > 50){
    $contmediah2 = 1;
} else {
    $contmediah2 = 0;
}
if((int) $analisehora['h3'] > 50){
    $contmediah3 = 1;
} else {
    $contmediah3 = 0;
}
if((int) $analisehora['h4'] > 50){
    $contmediah4 = 1;
} else {
    $contmediah4 = 0;
}
if((int) $analisehora['h5'] > 50){
    $contmediah5 = 1;
} else {
    $contmediah5 = 0;
}
if((int) $analisehora['h6'] > 50){
    $contmediah6 = 1;
} else {
    $contmediah6 = 0;
}
if((int) $analisehora['h7'] > 50){
    $contmediah7 = 1;
} else {
    $contmediah7 = 0;
}
if((int) $analisehora['h8'] > 50){
    $contmediah8 = 1;
} else {
    $contmediah8 = 0;
}
if((int) $analisehora['h9'] > 50){
    $contmediah9 = 1;
} else {
    $contmediah9 = 0;
}
if((int) $analisehora['h10'] > 50){
    $contmediah10 = 1;
} else {
    $contmediah10 = 0;
}
if((int) $analisehora['h11'] > 50){
    $contmediah11 = 1;
} else {
    $contmediah11 = 0;
}

endwhile;




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
<body
    style="background-image:  url('../img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light"
            style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">
            <a class="navbar-brand" href="../inicial.php">GrupoSC</a>
            <div id="collapse-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Conferencia
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Analise da Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Atualiza Produção</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Metas por Grupo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="analiseconferencia.php">Painel da Produtividade</a>
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            </div>
        </nav>
        <div>
            <!-- Modal -->
            <div id="meuModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Conteúdo do modal-->
                    <div class="modal-content"
                        style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond">
                        <!-- Corpo do modal -->
                        <div class="modal-body" style="font-size: 10px; color: whitesmoke;">
                            <div id="wrap">
                                <div class="container">
                                    <div class="row">
                                        <form class="form-horizontal" action="0048.php" method="post"
                                            name="upload_excel" enctype="multipart/form-data">
                                            <fieldset>
                                                <!-- Form Name -->
                                                <legend>Import PLN0048R</legend>
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
                                                    <label class="col-md-8 control-label"
                                                        for="singlebutton">Import</label>
                                                    <div class="col-md-8">
                                                        <button type="submit" id="submit" name="Import"
                                                            class="btn btn-primary button-loading"
                                                            data-loading-text="Loading...">Import</button>
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
            <div class="modal fade" id="addanalise" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"
                    style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond">
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
                                    <input type="date" name="data" id="data" style="width: 200px;"
                                        value="<?php echo $convDate ?>" class="form-control" placeholder="Matrícula"
                                        autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group" style="color: whitesmoke;">
                                    <label for="recipient-name" class="col-form-label">Matricula:</label>
                                    <input type="text" name="user" id="user" style="width: 200px;" class="form-control"
                                        placeholder="Matrícula" autofocus autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group" style="color: whitesmoke;">
                                    <label for="message-text" class="col-form-label">Senha:</label>
                                    <input type="password" name="password" id="password" style="width: 280px;"
                                        class="form-control" placeholder="Senha" autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');this.select();">
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
        <div>
            <!-- Modal -->
            <div class="modal fade" id="zerando" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"
                    style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Escolha a Hora
                                para ser Zerada!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="zerarhora.php" method="post" class="needs-validation" id="formSearch"
                                novalidate>
                                <div class="form-group" style="color: whitesmoke;">
                                    <label for="recipient-name" class="col-form-label">Hora a ser zerada:</label>
                                    <input type="text" name="hora" id="hora" style="width: 200px;" class="form-control"
                                        placeholder="Digite de 1 a 11!" autofocus autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');this.select();">
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
            <div class="border border-danger"
                style="margin-top: 40px; font-size: 10px; background-color: white; color: black; width: 85%; border-radius: 20px; min-height: 300px;">
                <br>
                <img align="center"  style=" height: 10%; width: 35%" src="..\img\Volumes.jpg">
                <br>                
                <table align="center" id="tbl" width="95%" style="font-size: 10px; color: black;">
                    <thead>
                        <tr>
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
                            <td align="center"> <a class="nav-link" href="delete0048.php">Zerar Data </a> </td>

                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <td></td>
                            <td
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Media / Hora' ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if(($cont1) > 0) : echo number_format(($somah1/$cont1), 0, ',', '.'); else : echo 0; endif ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if(($cont2) > 0) : echo number_format(($somah2/$cont2), 0, ',', '.'); else : echo 0; endif ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if(($cont3) > 0) : echo number_format(($somah3/$cont3), 0, ',', '.'); else : echo 0; endif ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if(($cont4) > 0) : echo number_format(($somah4/$cont4), 0, ',', '.'); else : echo 0; endif ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if(($cont5) > 0) : echo number_format(($somah5/$cont5), 0, ',', '.'); else : echo 0; endif ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if(($cont6) > 0) : echo number_format(($somah6/$cont6), 0, ',', '.'); else : echo 0; endif ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if(($cont7) > 0) : echo number_format(($somah7/$cont7), 0, ',', '.'); else : echo 0; endif ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if(($cont8) > 0) : echo number_format(($somah8/$cont8), 0, ',', '.'); else : echo 0; endif ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if(($cont9) > 0) : echo number_format(($somah9/$cont9), 0, ',', '.'); else : echo 0; endif ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if(($cont10) > 0) : echo number_format(($somah10/$cont10), 0, ',', '.'); else : echo 0; endif ?>
                            </td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php if(($cont11) > 0) : echo number_format(($somah11/$cont11), 0, ',', '.'); else : echo 0; endif ?>
                            </td>
                            <td align="center"><a style="color: blue;" data-toggle="modal" data-target="#zerando">Zera
                                    Hora/Hora</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <td style="font-size: 10px;"><?php echo $datacontabil ?> </td>
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
                            <td align="center"><a style="color: blue;" data-toggle="modal"
                                    data-target="#meuModal">PLN0048R <svg class="bi bi-upload" width="1em" height="1em"
                                        viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8zM5 4.854a.5.5 0 0 0 .707 0L8 2.56l2.293 2.293A.5.5 0 1 0 11 4.146L8.354 1.5a.5.5 0 0 0-.708 0L5 4.146a.5.5 0 0 0 0 .708z" />
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 2z" />
                                    </svg></a></td>
                            <td>
                            </td>
                            <td></td>
                        </tr>
                    </thead>


                    <thead>
                        <?php while ($atzpdg = $stmt_array_atzpdg->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr style="background-color: Gray; ">
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Meta' ?></td>
                            <td
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 200px; min-height: 20px;">
                                <?php echo 'Nome' ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                <?php  echo $atzpdg['hora1'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                <?php echo $atzpdg['hora2'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                <?php echo $atzpdg['hora3'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                <?php echo $atzpdg['hora4'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;  min-width: 40px; min-height: 20px;">
                                <?php echo $atzpdg['hora5'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;  min-width: 40px; min-height: 20px;">
                                <?php echo $atzpdg['hora6'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;  min-width: 40px; min-height: 20px;">
                                <?php echo $atzpdg['hora7'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;  min-width: 40px; min-height: 20px;">
                                <?php echo $atzpdg['hora8'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;  min-width: 40px; min-height: 20px;">
                                <?php echo $atzpdg['hora9'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                <?php echo $atzpdg['hora10'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; min-width: 40px; min-height: 20px;">
                                <?php echo $atzpdg['hora11'] ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Total' ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo 'Media' ?></td>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo '%' ?></td>
                            <td></td>
                        </tr>
                        <?php endwhile; ?>
                    </thead>
                    <tbody>
                        <?php while ($analise = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td align="center"
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <b><?php echo $analise['meta'] ?>
                            </td>
                            <td
                                style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                <b><?php echo mb_convert_case($analise['nome'], MB_CASE_TITLE, 'UTF-8') ?>
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
                            <td></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <br>
            </div>
            <br>
            <!--    
            <div class="container" id="interface"
                style="background-image:  url('../img/pagina.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; margin-top: -10px ; width: 85%; border-radius: 10px;">
                <canvas id="myHoraP" style=" width : 120%; height : 400px"></canvas>
                <script type="text/javascript" src="../chart/jquery.min.js"></script>
                <script type="text/javascript" src="../chart/Chart.js"></script>
                <script src="js/app11.js"></script>
            </div>
            -->
            <br>


            <footer style=" text-align-last: center; margin-top: 50px;">
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