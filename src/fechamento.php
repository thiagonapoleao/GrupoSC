<?php
require_once 'restrito.php'; 
require_once 'init.php';

// abre a conexão
$PDO = db_connect();


// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDO->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();


$data = $datacontabil;
$isoDate = dateConvert($data);

$dia1 = substr($isoDate, 8, 1);
$dia2 = substr($isoDate, 9, 1);
$mes1 = substr($isoDate, 5, 1);
$mes2 = substr($isoDate, 6, 1);

// SQL para selecionar os registros
$sql_arry_dia1 = "SELECT senha FROM manifesto WHERE data = '$dia1'";
// seleciona os registros
$stmt_array_dia1 = $PDO->prepare($sql_arry_dia1);
$stmt_array_dia1->execute();
$senha1 =  $stmt_array_dia1->fetchColumn();

// SQL para selecionar os registros
$sql_arry_dia2 = "SELECT senha FROM manifesto WHERE data = '$dia2'";
// seleciona os registros
$stmt_array_dia2 = $PDO->prepare($sql_arry_dia2);
$stmt_array_dia2->execute();
$senha2 =  $stmt_array_dia2->fetchColumn();

// SQL para selecionar os registros
$sql_arry_mes1 = "SELECT senha FROM manifesto WHERE data = '$mes1'";
// seleciona os registros
$stmt_array_mes1 = $PDO->prepare($sql_arry_mes1);
$stmt_array_mes1->execute();
$senha3 =  $stmt_array_mes1->fetchColumn();

// SQL para selecionar os registros
$sql_arry_mes2 = "SELECT senha FROM manifesto WHERE data = '$mes2'";
// seleciona os registros
$stmt_array_mes2 = $PDO->prepare($sql_arry_mes2);
$stmt_array_mes2->execute();
$senha4 =  $stmt_array_mes2->fetchColumn();


$senhaManifesto = $senha1 . $senha2 . $senha3 . $senha4;

// sql_count para contar o total de registros
$sql_count = "SELECT SUM(rota) FROM demonstrativo";
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// sql_count para contar o total de registros
$sql_count_nota = "SELECT SUM(danfenormal) FROM demonstrativo where data = '$datacontabil'";
// conta o toal de registros
$stmt_count_nota = $PDO->prepare($sql_count_nota);
$stmt_count_nota->execute();
$total_nota = $stmt_count_nota->fetchColumn();

// sql_count para contar o total de registros
$sql_count_nota_epec = "SELECT SUM(danfeepec) FROM demonstrativo where data = '$datacontabil'";
// conta o toal de registros
$stmt_count_nota_epec = $PDO->prepare($sql_count_nota_epec);
$stmt_count_nota_epec->execute();
$total_nota_epec = $stmt_count_nota_epec->fetchColumn();

// sql_count para contar o total de registros
$sql_count_imp1 = "SELECT SUM(danfenormal) FROM demonstrativo where data = '$datacontabil' and impressora='1' ";
// conta o toal de registros
$stmt_count_imp1 = $PDO->prepare($sql_count_imp1);
$stmt_count_imp1->execute();
$total_imp1 = $stmt_count_imp1->fetchColumn();

// sql_count para contar o total de registros
$sql_count_imp2 = "SELECT SUM(danfenormal) FROM demonstrativo where data = '$datacontabil' and impressora='2' ";
// conta o toal de registros
$stmt_count_imp2 = $PDO->prepare($sql_count_imp2);
$stmt_count_imp2->execute();
$total_imp2 = $stmt_count_imp2->fetchColumn();

// sql_count para contar o total de registros
$sql_count_imp3 = "SELECT SUM(danfenormal) FROM demonstrativo where data = '$datacontabil' and impressora='3' ";
// conta o toal de registros
$stmt_count_imp3 = $PDO->prepare($sql_count_imp3);
$stmt_count_imp3->execute();
$total_imp3 = $stmt_count_imp3->fetchColumn();

// sql_count para contar o total de registros
$sql_count_imp4 = "SELECT SUM(danfenormal) FROM demonstrativo where data = '$datacontabil' and impressora='4' ";
// conta o toal de registros
$stmt_count_imp4 = $PDO->prepare($sql_count_imp4);
$stmt_count_imp4->execute();
$total_imp4 = $stmt_count_imp4->fetchColumn();

// SQL para selecionar os registros
$sql_arry = "SELECT id, rota, liberacaocpd, impressora, danfenormal, danfeepec, operador, codmotorista FROM demonstrativo WHERE data = '$datacontabil' order by id DESC, rota DESC";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();

// sql_count para contar o total de registros
$sql_count_compr = "SELECT SUM(rota) FROM comprovei";
// conta o toal de registros
$stmt_count_compr  = $PDO->prepare($sql_count_compr );
$stmt_count_compr ->execute();
$total_compr  = $stmt_count_compr ->fetchColumn();

// SQL para selecionar os registros
$sql_arry_compr  = "SELECT id, rota, comprovei, operador_comprovei FROM demonstrativo WHERE data = '$datacontabil' and comprovei IS NOT NULL  order by id DESC, rota DESC";
// seleciona os registros
$stmt_array_compr  = $PDO->prepare($sql_arry_compr );
$stmt_array_compr ->execute();



?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GI - Gestão Integrada</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width" scale="1">
    <!-- transforma a pagina em  responsivel-->
    <!-- Adicionando JQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- script relogio -->

    <script>
    var clockid = new Array()
    var clockidoutside = new Array()
    var i_clock = -1
    var thistime = new Date()
    var hours = thistime.getHours()
    var minutes = thistime.getMinutes()
    var seconds = thistime.getSeconds()
    if (eval(hours) < 10) {
        hours = "0" + hours
    }
    if (eval(minutes) < 10) {
        minutes = "0" + minutes
    }
    if (seconds < 10) {
        seconds = "0" + seconds
    }
    var thistime = hours + ":" + minutes + ":" + seconds

    function writeclock() {
        i_clock++
        if (document.all || document.getElementById || document.layers) {
            clockid[i_clock] = "clock" + i_clock
            document.write("<span id='" + clockid[i_clock] + "' style='position:relative'>" + thistime + "</span>")
        }
    }

    function clockon() {
        thistime = new Date()
        hours = thistime.getHours()
        minutes = thistime.getMinutes()
        seconds = thistime.getSeconds()
        if (eval(hours) < 10) {
            hours = "0" + hours
        }
        if (eval(minutes) < 10) {
            minutes = "0" + minutes
        }
        if (seconds < 10) {
            seconds = "0" + seconds
        }
        thistime = hours + ":" + minutes + ":" + seconds

        if (document.all) {
            for (i = 0; i <= clockid.length - 1; i++) {
                var thisclock = eval(clockid[i])
                thisclock.innerHTML = thistime
            }
        }

        if (document.getElementById) {
            for (i = 0; i <= clockid.length - 1; i++) {
                document.getElementById(clockid[i]).innerHTML = thistime
            }
        }
        var timer = setTimeout("clockon()", 1000)
    }
    window.onload = clockon
    </SCRIPT>

    <!-- script relogio -->
</head>

<body
    style="background-image:  url('./img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- mais semantico, inverso footer -->
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light"
            style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">
            <a class="nav-link" data-toggle="modal" data-target="#viradatacontabil" href=""
                style="color: black; font-size: 20px;">GrupoSC</a>
            <div id="collapse-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CPD
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="comprovei.php">Comprovei</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="demonstrativo.php">Demonstrativo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="fechamento.php">Fechamento de Rotas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="transportadoras.php">Placas de Veiculos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="impressaolaser.php">Termino de Impresão</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cancelamento
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="cancelamento/cancelar.php">Cancelar Itens</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cancelamento/estacao.php">Lista de Cancelados</a>
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
                            <a class="dropdown-item" href="produtividade/analiseconferencia.php">Painel da
                                Produtividade</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="produtividade/analiseconferenciadata.php">Produtividade por
                                Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="produtividade/analiseconferenciaindividual.php">Produtividade
                                por Conferente</a>
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
                            <a class="dropdown-item" href="produtividade/analisepedidao.php">Painel da
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
                            <a class="dropdown-item" href="tratativa.php">Tratativa de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="tratativa/from-listaerros.php">Lista de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="upm/from-grafico.php">Grafico</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cadastro/cadastro.php">Cadastro</a>
                        </div>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Grandes Redes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="grandesredes.php">Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="grandesredes/import.php">Importar Arquivo</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Presença
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="presenca.php">Presença</a>
                        </div>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <br>
        <div class="container" style="margin-top: 20px; color:blanchedalmond;  align-items: center">
            <div class="container">
                <h4 style="color: red;" align="center">
                    <script>
                    writeclock()
                    </SCRIPT>
                </h4>
            </div>
            <div class="container">
                <form action="cpd/fechamento/add.php" method="post" class="needs-validation" id="formSearch" novalidate>
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                                <label for="validationServer01">Data</label>
                                <input type="date" class="form-control" name="data" id="validationServer01"
                                    value="<?php echo $isoDate ?>" required>
                                <div class="valid-feedback">
                                    .
                                </div>
                            </div>
                            <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                                <label for="validationServer01">Rota</label>
                                <input type="number" class="form-control" name="rota" id="rota" autofocus
                                    onblur="mFunction()" required>
                                <div class="valid-feedback">
                                    .
                                </div>
                            </div>
                            <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                                <label for="validationServer02">Horário</label>
                                <input type="time" class="form-control" name="horario" id="validationServer02" required>
                                <div class="valid-feedback">
                                    .
                                </div>
                            </div>
                            <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                                <label for="validationServer04">Impressora</label>
                                <input type="number" class="form-control" name="impressora" id="validationServer03"
                                    required>
                                <div class="valid-feedback">
                                    .
                                </div>
                            </div>
                            <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                                <label for="validationServer05">Cod. Operador</label>
                                <input type="number" class="form-control" name="codigo" id="codigo"
                                    onblur="myFunction()" required>
                                <div class="valid-feedback">
                                    .
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-sm-3 mb-3" style="margin-right: -20px;">
                                <label for="validationServer06">Operador</label>
                                <input type="text" class="form-control" name="noperador" id="noperador" disabled=""
                                    required>
                                <div class="valid-feedback">
                                    .
                                </div>
                            </div>
                            <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                                <label for="validationServer07">Danfes E</label>
                                <input type="number" class="form-control" name="danfeepc" id="validationServer02"
                                    required>
                                <div class="valid-feedback">
                                    .
                                </div>
                            </div>
                            <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                                <label for="validationServer08">Danfes N</label>
                                <input type="number" class="form-control" name="danfenormal" id="validationServer02"
                                    required>
                                <div class="valid-feedback">
                                    .
                                </div>
                            </div>
                            <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                                <label for="validationServer08">Cod. Motorista</label>
                                <input style="color: red;" type="text" class="form-control" name="codmotorista"
                                    id="codmotorista" required>
                                <div class="valid-feedback">
                                    .
                                </div>
                            </div>
                            <div class="col-sm-1 mb-2">
                                <br>
                                <button style="margin-top: 8px;" class="btn btn-primary" type="submit">Salvar</button>
                            </div>
                        </div>
                        <h3 align="center" style="color: red;">Senha do Manifesto:
                            <?php echo strtoupper($senhaManifesto) ?>
                        </h3>
                        <br>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="container" align="center" style="margin-top: -45px;">
            <div class="border border-danger"
                style="background-color: white; color: black; width: 80%; border-radius: 20px; font-size: 14px; min-height: 500px;">
                <div class="container">
                    <p align="center"> Total de Danfes Normal: <?php echo $total_nota ?> ---------- Total de Danfes
                        EPEC:
                        <?php echo $total_nota_epec ?> </p>
                    <p align="center"> <img src="img/icons8-enviar-para-a-impressora-20.png" /> Impressora-1:
                        <span style="color: red;"><?php echo $total_imp1 ?> </span>
                        <img src="img/icons8-enviar-para-a-impressora-20.png" style="margin-left: 35px;" />
                        Impressora-2:
                        <span style="color: red;"><?php echo $total_imp2 ?> </span> <img
                            src="img/icons8-enviar-para-a-impressora-20.png" style="margin-left: 35px;" /> Impressora-3:
                        <span style="color: red;"><?php echo $total_imp3 ?> </span> <img
                            src="img/icons8-enviar-para-a-impressora-20.png" style="margin-left: 35px;" /> Impressora-4:
                        <span style="color: red;"><?php echo $total_imp4 ?> </span>
                    </p>
                </div>

                <div class="container">
                    <?php if ($total > 0) : ?>

                    <table width="100%" align="center" id="tbl">
                        <thead>
                            <tr>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Rota</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Liberada</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Impressora</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Danfes N</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Danfes E</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Cod Motorista</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Operador</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($tratativa = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $tratativa['rota'] ?></td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $tratativa['liberacaocpd'] ?></td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $tratativa['impressora'] ?></td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $tratativa['danfenormal'] ?></td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $tratativa['danfeepec'] ?></td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $tratativa['codmotorista'] ?></td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; font-size: 10px;">
                                    <?php echo $tratativa['operador'] ?></td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <a href="cpd/fechamento/delete.php?id=<?php echo $tratativa['id'] ?>"
                                        onclick="return confirm('Tem certeza de que deseja remover?');">
                                        <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                    <p>Nenhum registro</p>
                    <?php endif; ?>
                </div>

            </div>
        </div>


    </header>

    <br>

    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: blanchedalmond;">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By Thiago
            Cesar Napoleão</p>
    </footer>

    <script src="jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


    <script>
    document.getElementById("codigo").onblur = function() {
        myFunction()
    };

    document.getElementById("rota").onblur = function() {
        mFunction()
    };

    $("#codigo").blur(function() {
        $.ajax({
            url: 'searc.php',
            type: 'post',
            dataType: 'json',
            data: {
                searchAdress: 1,
                codigo: $("#codigo").val()
            }
        }).done(function(data) {
            if (data) {
                $("#noperador").val(data.nome);
            } else {
                alert("Codigo não cadastrado!");
                $("#noperador").val("");
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
                searchAdress: 1,
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