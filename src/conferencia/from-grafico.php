<?php
require_once '../init.php';

$secondsWait = 60;
header("Refresh:$secondsWait");
echo date('Y-m-d H:i:s');

// abre a conexão
$PDO = db_connect();


// sql_count para contar o total de registros
$sql_count = "SELECT SUM(total) FROM erro_linha";
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// SQL para retirar o ponto dos numeros da string
$sql_arry_replace = "UPDATE pln0098r SET t_prod = REPLACE ( t_prod , '.' , '' ) WHERE t_prod LIKE '%.%'";
// seleciona os registros
$stmt_array_replace = $PDO->prepare($sql_arry_replace);
$stmt_array_replace->execute();

// SQL para selecionar os registros
$sql_arry = "SELECT id, codigo, nome, tipoErro, qtdErro, total, estacao, rota, hora FROM erro_linha order by id DESC, rota DESC";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();

// SQL para selecionar erro_total
$sql_arry_erros_total = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) FROM pln0098r WHERE data <> ''";
// seleciona os registros
$stmt_array_erro_total = $PDO->prepare($sql_arry_erros_total);
$stmt_array_erro_total->execute();
$erro_total = $stmt_array_erro_total->fetchColumn();


// SQL para selecionar erros_psico estacao 40
$sql_arry_erros_estacao_40 = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) as soma FROM pln0098r WHERE data <> ''and estacao = 40";
// seleciona os registros
$stmt_array_erro_estacao_40 = $PDO->prepare($sql_arry_erros_estacao_40);
$stmt_array_erro_estacao_40->execute();
$erro_estacao_40 = $stmt_array_erro_estacao_40->fetchColumn();

// SQL para selecionar erros_psico estacao 41
$sql_arry_erros_estacao_41 = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) as soma FROM pln0098r WHERE data <> ''and estacao = 41";
// seleciona os registros
$stmt_array_erro_estacao_41 = $PDO->prepare($sql_arry_erros_estacao_41);
$stmt_array_erro_estacao_41->execute();
$erro_estacao_41 = $stmt_array_erro_estacao_41->fetchColumn();

// SQL para selecionar erros_psico estacao 42
$sql_arry_erros_estacao_42 = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) as soma FROM pln0098r WHERE data <> ''and estacao = 42";
// seleciona os registros
$stmt_array_erro_estacao_42 = $PDO->prepare($sql_arry_erros_estacao_42);
$stmt_array_erro_estacao_42->execute();
$erro_estacao_42 = $stmt_array_erro_estacao_42->fetchColumn();

// SQL para selecionar erros_psico estacao 43
$sql_arry_erros_estacao_43 = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) as soma FROM pln0098r WHERE data <> ''and estacao = 43";
// seleciona os registros
$stmt_array_erro_estacao_43 = $PDO->prepare($sql_arry_erros_estacao_43);
$stmt_array_erro_estacao_43->execute();
$erro_estacao_43 = $stmt_array_erro_estacao_43->fetchColumn();

// SQL para selecionar erros_psico estacao 44
$sql_arry_erros_estacao_44 = "SELECT SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) as soma FROM pln0098r WHERE data <> '' and estacao = 44";
// seleciona os registros
$stmt_array_erro_estacao_44 = $PDO->prepare($sql_arry_erros_estacao_44);
$stmt_array_erro_estacao_44->execute();
$erro_estacao_44 = $stmt_array_erro_estacao_44->fetchColumn();


// SQL para selecionar venda estacao 40
$sql_arry_venda_estacao_40 = "SELECT SUM(t_prod) as soma FROM pln0098r WHERE data <> '' and estacao = 40";
// seleciona os registros
$stmt_array_venda_estacao_40 = $PDO->prepare($sql_arry_venda_estacao_40);
$stmt_array_venda_estacao_40->execute();
$venda_estacao_40 = $stmt_array_venda_estacao_40->fetchColumn();

// SQL para selecionar venda estacao 41
$sql_arry_venda_estacao_41 = "SELECT SUM(t_prod) as soma FROM pln0098r WHERE data <> '' and estacao = 41";
// seleciona os registros
$stmt_array_venda_estacao_41 = $PDO->prepare($sql_arry_venda_estacao_41);
$stmt_array_venda_estacao_41->execute();
$venda_estacao_41 = $stmt_array_venda_estacao_41->fetchColumn();

// SQL para selecionar venda estacao 42
$sql_arry_venda_estacao_42 = "SELECT SUM(t_prod) as soma FROM pln0098r WHERE data <> '' and estacao = 42";
// seleciona os registros
$stmt_array_venda_estacao_42 = $PDO->prepare($sql_arry_venda_estacao_42);
$stmt_array_venda_estacao_42->execute();
$venda_estacao_42 = $stmt_array_venda_estacao_42->fetchColumn();

// SQL para selecionar venda estacao 43
$sql_arry_venda_estacao_43 = "SELECT SUM(t_prod) as soma FROM pln0098r WHERE data <> '' and estacao = 43";
// seleciona os registros
$stmt_array_venda_estacao_43 = $PDO->prepare($sql_arry_venda_estacao_43);
$stmt_array_venda_estacao_43->execute();
$venda_estacao_43 = $stmt_array_venda_estacao_43->fetchColumn();

// SQL para selecionar venda estacao 44
$sql_arry_venda_estacao_44 = "SELECT SUM(t_prod) as soma FROM pln0098r WHERE data <> '' and estacao = 44";
// seleciona os registros
$stmt_array_venda_estacao_44 = $PDO->prepare($sql_arry_venda_estacao_44);
$stmt_array_venda_estacao_44->execute();
$venda_estacao_44 = $stmt_array_venda_estacao_44->fetchColumn();


// SQL para selecionar unidades vendidas
$sql_arry_venda = "SELECT SUM(t_prod) FROM pln0098r WHERE data <> ''";
// seleciona os registros
$stmt_array_venda = $PDO->prepare($sql_arry_venda);
$stmt_array_venda->execute();
$venda_total = $stmt_array_venda->fetchColumn();

// calculo UPM psico
$venda_psico = $venda_estacao_40 + $venda_estacao_41 + $venda_estacao_42 + $venda_estacao_43 + $venda_estacao_44;
$erros_psico = $erro_estacao_40 + $erro_estacao_41 + $erro_estacao_42 + $erro_estacao_43 + $erro_estacao_44;
$upm_psico = round(($erros_psico / $venda_psico) * 1000000);

// calculo UPM Total
$upm_total = round(($erro_total / $venda_total) * 1000000);

//calculo UPM Linha
$erros_linha = $erro_total - $erros_psico;
$venda_linha = $venda_total - $venda_psico;
$upm_linha = round(($erros_linha / $venda_linha) * 1000000);


// SQL para selecionar os registros
$sql_arry_upm = "SELECT tipo, meta, erros, upm, conferencia FROM upm";
// seleciona os registros
$stmt_array_upm = $PDO->prepare($sql_arry_upm);
$stmt_array_upm->execute();

$PDO = db_connect();
$sqlEstacao = "TRUNCATE TABLE erro_estacao";
$stmtEstacao = $PDO->prepare($sqlEstacao);
$stmtEstacao->execute();

// SQL para selecionar erros_psico estacao 40
$sql_arry = "SELECT estacao, SUM(falta_upm + sobra_upm + troca_upm + erro_conf_upm) as soma FROM pln0098r WHERE data <> '' GROUP BY estacao order by estacao ASC";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();
while ($est = $stmt_array->fetch(PDO::FETCH_ASSOC)) :
    $estacao = $est['estacao'];
    $err = $est['soma'];

    $PDO = db_connect();
    $sql = "INSERT INTO erro_estacao(estacao, erros) VALUES(:estacao, :erros)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':estacao', $estacao);
    $stmt->bindParam(':erros', $err);
    $stmt->execute();
endwhile

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
    <script>
    $(function() {
        var linha = $("#linha").text();
        var resultL = (linha);

        if (resultL <= 1000) {
            $("#linha-div").css("background", "#00FF7F");
            $("#linha-div1").css("background", "#00FF7F");
            $("#linha-div").css("border-style", "inset");
            $("#linha-div").css("border-style", "outset");
            $("#linha-div1").css("border-style", "inset");
            $("#linha-div1").css("border-style", "outset");
        } else if (resultL > 1000) {
            $("#linha-div").css("background", "#f20000");
            $("#linha-div1").css("background", "#f20000");
            $("#linha-div").css("border-style", "inset");
            $("#linha-div").css("border-style", "outset");
            $("#linha-div1").css("border-style", "inset");
            $("#linha-div1").css("border-style", "outset");
        }
    })
    </script>
    <script>
    $(function() {
        var psico = $("#psico").text();
        var resultP = (psico);

        if (resultP <= 0) {
            $("#psico-div").css("background", "#00FF7F");
            $("#psico-div").css("border-style", "inset");
            $("#psico-div").css("border-style", "outset");
            $("#psico-div1").css("background", "#00FF7F");
            $("#psico-div1").css("border-style", "inset");
            $("#psico-div1").css("border-style", "outset");
        } else if (resultP > 0) {
            $("#psico-div").css("background", "#f20000");
            $("#psico-div").css("border-style", "inset");
            $("#psico-div").css("border-style", "outset");
            $("#psico-div1").css("background", "#f20000");
            $("#psico-div1").css("border-style", "inset");
            $("#psico-div1").css("border-style", "outset");
        }
    })
    </script>
    <script>
    $(function() {
        var total = $("#total").text();
        var resultT = (total);

        if (resultT <= 906) {
            $("#total-div").css("background", "#00FF7F");
            $("#total-div").css("border-style", "inset");
            $("#total-div").css("border-style", "outset");
            $("#total-div1").css("background", "#00FF7F");
            $("#total-div1").css("border-style", "inset");
            $("#total-div1").css("border-style", "outset");
        } else if (resultT > 906) {
            $("#total-div").css("background", "#f20000");
            $("#total-div").css("border-style", "inset");
            $("#total-div").css("border-style", "outset");
            $("#total-div1").css("background", "#f20000");
            $("#total-div1").css("border-style", "inset");
            $("#total-div1").css("border-style", "outset");
        }
    })
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
            ['Estação', 'Erros'],
            <?php
                include 'conexao.php';
                $sql = "SELECT * FROM erro_estacao order by estacao ASC";
                $buscar = mysqli_query($conexao, $sql);

                while ($dados = mysqli_fetch_array($buscar)) {
                    $estacao = $dados['estacao'];
                    $sobra_upm = $dados['erros'];
                ?>['<?php echo $estacao ?> ', <?php echo $sobra_upm ?>],
            <?php } ?>
        ]);

        var options = {
            title: 'Erros por Estação',
            vAxis: {
                title: 'Erros',
                textStyle: {
                    fontName: 'Times-Roman',
                    fontSize: 10,
                    bold: true,
                    italic: true,
                    // The color of the text.
                    color: '#871b47',
                    // The color of the text outline.
                    auraColor: '#d799ae',
                    // The transparency of the text.
                    opacity: 0.8
                },
            },
            hAxis: {
                title: 'Estação',
                textStyle: {
                    fontName: 'Times-Roman',
                    fontSize: 10,
                    bold: true,
                    italic: true,
                    // The color of the text.
                    color: '#871b47',
                    // The color of the text outline.
                    auraColor: '#d799ae',
                    // The transparency of the text.
                    opacity: 0.8
                }
            },
            seriesType: 'bars',
        };
        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>

</head>

<body
style="background: linear-gradient(to top,#004e92, #000428, #000000); background-attachment: fixed; background-size: 100% 100%; ">
    <header>
    <nav class="navbar fixed-top navbar-expand navbar-light" style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">  
            <a class="navbar-brand" href="#">GrupoSC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="../inicial.php">Tratativa </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#listaErrosModal" href="">Lista de
                            Erros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="from-grafico.php">Graficos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#cadastroModal" href="">Cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#zerarModal" href="">Zerar Dados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="from-lista-grafico.php">Dados Grafico</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div>
            <!-- Modal -->
            <div class="modal fade" id="listaErrosModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Insira a senha para acesso a Lista de Erros
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../acesso_lista.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Matricula:</label>
                                    <input type="text" name="user" id="user" style="width: 200px;"
                                        class="form-control is-valid" placeholder="Matrícula" autofocus
                                        autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Senha:</label>
                                    <input type="password" name="password" id="password" style="width: 280px;"
                                        class="form-control is-valid" placeholder="Senha" autofocus autocomplete="off"
                                        readonly onfocus="this.removeAttribute('readonly');this.select();">
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
        <div>
            <!-- Modal -->
            <div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Insira a senha para acesso ao Cadastro de
                                Separadores</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../acesso_cadastro.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Matricula:</label>
                                    <input type="text" name="user" id="user" style="width: 200px;"
                                        class="form-control is-valid" placeholder="Matrícula" autofocus
                                        autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Senha:</label>
                                    <input type="password" name="password" id="password" style="width: 280px;"
                                        class="form-control is-valid" placeholder="Senha" autofocus autocomplete="off"
                                        readonly onfocus="this.removeAttribute('readonly');this.select();">
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
        <div>
            <!-- Modal -->
            <div class="modal fade" id="zerarModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Esse processo vai zerar os dados! Você tem
                                certeza?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../acesso_zerando.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Matricula:</label>
                                    <input type="text" name="user" id="user" style="width: 200px;"
                                        class="form-control is-valid" placeholder="Matrícula" autofocus
                                        autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Senha:</label>
                                    <input type="password" name="password" id="password" style="width: 280px;"
                                        class="form-control is-valid" placeholder="Senha" autofocus autocomplete="off"
                                        readonly onfocus="this.removeAttribute('readonly');this.select();">
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
            <!-- Modal -->
            <div id="meuModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Conteúdo do modal-->
                    <div class="modal-content">
                        <!-- Corpo do modal -->
                        <div class="modal-body" style="font-size: 12px">
                            <div id="wrap">
                                <div class="container">
                                    <div class="row">
                                        <form class="form-horizontal" action="../function96.php" method="post"
                                            name="upload_excel" enctype="multipart/form-data">
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
        <div class="contener">
            <p align="center" style="margin-top: 30px; font-size: 18px; color: MediumBlue;"><b>Pagina Atualizada</b>
                <?php echo date('d-M H:i') ?></p>
        </div>
        <div class="contener" align="center">
            <a data-toggle="modal" data-target="#meuModal"><svg class="bi bi-upload" width="1em" height="1em"
                    viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8zM5 4.854a.5.5 0 0 0 .707 0L8 2.56l2.293 2.293A.5.5 0 1 0 11 4.146L8.354 1.5a.5.5 0 0 0-.708 0L5 4.146a.5.5 0 0 0 0 .708z" />
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 2z" />
                </svg></a>
        </div>
        <div id="interface"
            style="background-image:  url('../img/logo-pagina-inicial3.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; margin-top:1px">
            <canvas id="myChart" style=" width : 100%; height : 500px"></canvas>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
            <script src="js/app.js"></script>
        </div>
        <br>
        <div id="interface"
            style="background-image:  url('../img/logo-pagina-inicial3.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <div id="chart_div" style=" width : 100% ; height : 500px  ; "></div>
        </div>
        <br>

    </header>
</body>

</html>