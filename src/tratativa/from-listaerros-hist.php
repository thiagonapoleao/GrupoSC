<?php
require_once '../init.php';

// abre a conexão
$PDO = db_connect_tratativa();
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


// sql_count para contar o total de registros
$sql_count = "SELECT SUM(erro) total FROM pln0040r ";
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// SQL para selecionar os registros
$sql_arry = "SELECT cod, nome, SUM(erro) total, SUM(case when motivo='1- Falta' then erro end) falta, SUM(case when motivo='2- Sobra' then erro end) sobra,  SUM(case when motivo='3- Troca' then erro end) troca,  SUM(case when motivo='4- Erro Conf' then erro end) conf FROM PLN0040R GROUP BY cod,nome order by total DESC, nome asc ";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();

// SQL para selecionar os registros
$sql_arry_falta = "SELECT SUM(case when motivo='1- Falta' then erro end) falta FROM hist0040 WHERE data <> ''";
// seleciona os registros
$stmt_array_falta = $PDO->prepare($sql_arry_falta);
$stmt_array_falta->execute();
$errofalta =  $stmt_array_falta->fetchColumn();

// SQL para selecionar os registros
$sql_arry_sobra = "SELECT SUM(case when motivo='2- Sobra' then erro end) sobra FROM hist0040 WHERE data <> ''";
// seleciona os registros
$stmt_array_sobra = $PDO->prepare($sql_arry_sobra);
$stmt_array_sobra->execute();
$errosobra =  $stmt_array_sobra->fetchColumn();

// SQL para selecionar os registros
$sql_arry_troca = "SELECT SUM(case when motivo='3- Troca' then erro end) troca FROM hist0040 WHERE data <> ''";
// seleciona os registros
$stmt_array_troca = $PDO->prepare($sql_arry_troca);
$stmt_array_troca->execute();
$errotroca =  $stmt_array_troca->fetchColumn();

// SQL para selecionar os registros
$sql_arry_conf = "SELECT  SUM(case when motivo='4- Erro Conf' then erro end) conf    FROM hist0040 WHERE data <> ''";
// seleciona os registros
$stmt_array_conf = $PDO->prepare($sql_arry_conf);
$stmt_array_conf->execute();
$erroconf =  $stmt_array_conf->fetchColumn();

$errototalmes = ($errofalta + $errosobra + $errotroca + $erroconf);

// SQL para selecionar os registros
$sql_arry_mes = "SELECT cod, nome, SUM(erro) total, SUM(case when motivo='1- Falta' then erro end) falta, SUM(case when motivo='2- Sobra' then erro end) sobra,  SUM(case when motivo='3- Troca' then erro end) troca,  SUM(case when motivo='4- Erro Conf' then erro end) conf FROM hist0040 GROUP BY cod,nome order by total desc";
// seleciona os registros
$stmt_array_mes = $PDO->prepare($sql_arry_mes);
$stmt_array_mes->execute();

// SQL para selecionar os registros
$sql_arry_mes_data = "SELECT data, SUM(erro) total, SUM(case when motivo='1- Falta' then erro end) falta, SUM(case when motivo='2- Sobra' then erro end) sobra,  SUM(case when motivo='3- Troca' then erro end) troca,  SUM(case when motivo='4- Erro Conf' then erro end) conf FROM hist0040 GROUP BY data order by data desc";
// seleciona os registros
$stmt_array_mes_data = $PDO->prepare($sql_arry_mes_data);
$stmt_array_mes_data->execute();

// SQL para retirar o ponto dos numeros da string
$sql_arry_replace = "UPDATE pln0098r SET t_prod = REPLACE ( t_prod , '.' , '' ) WHERE t_prod LIKE '%.%'";
// seleciona os registros
$stmt_array_replace = $PDO->prepare($sql_arry_replace);
$stmt_array_replace->execute();


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
$venda_psico =  $venda_estacao_41 + $venda_estacao_42 + $venda_estacao_43 + $venda_estacao_44;
$erros_psico =  $erro_estacao_41 + $erro_estacao_42 + $erro_estacao_43 + $erro_estacao_44;
$upm_psico = round(($erros_psico / $venda_psico) * 1000000);

// calculo UPM Total
$upm_total = round(($erro_total / $venda_total) * 1000000);
$upm_Real = round(($total / $venda_total) * 1000000);

//calculo UPM Linha
$erros_linha = $erro_total - $erros_psico;
$venda_linha = $venda_total - $venda_psico;
$upm_linha = round(($erros_linha / $venda_linha) * 1000000);

$color1 = "green";
$color2 = "red";


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GI - Gestão Integrada</title>
    <link rel="stylesheet" type="text/css" href="..stilo.css">
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
    <script>
        $(function() {
            var total = $("#total").text();
            var resultT = (total);

            if (resultT <= 5000) {
                $("#total-div").css("background", "#00FF7F");
                $("#total-div").css("border-style", "inset");
                $("#total-div").css("border-style", "outset");
                $("#total-div1").css("background", "#00FF7F");
                $("#total-div1").css("border-style", "inset");
                $("#total-div1").css("border-style", "outset");
            } else if (resultT > 5000) {
                $("#total-div").css("background", "#f20000");
                $("#total-div").css("border-style", "inset");
                $("#total-div").css("border-style", "outset");
                $("#total-div1").css("background", "#f20000");
                $("#total-div1").css("border-style", "inset");
                $("#total-div1").css("border-style", "outset");
            }
        })
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
                            <a class="dropdown-item" href="../produtividade/analiseconferencia.php">Painel da
                                Produtividade</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../produtividade/analiseconferenciadata.php">Produtividade
                                por Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../produtividade/analiseconferenciaindividual.php">Produtividade por
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
                            <a class="dropdown-item" href="from-listaerros.php">Lista de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#listaIndivdata" href="">Lista Data-Separador</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#listaIndivModal" href="">Lista
                                individual</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../upm/from-grafico.php">Grafico</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../cadastro/cadastro.php">Cadastro</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Grandes Redes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../grandesredes.php">Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../grandesredes/import.php">Importar Arquivo</a>
                        </div>
                    </li>

                </ul>
            </div>
            </div>
        </nav>

        <div>
            <!-- Modal -->
            <div class="modal fade" id="listaIndivModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Insira o Codígo da
                                Sepradora</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="from-lista-individual.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: whitesmoke;">Cogído:</label>
                                    <input type="text" name="codigos" id="codigos" style="width: 200px;" class="form-control is-valid" placeholder="Codigo Separador" autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
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
            <div class="modal fade" id="listaIndivdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Insira a Dta e o Codígo da
                                Sepradora</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="from-lista-data.php" method="post">
                                <div class="form-group" style="color: whitesmoke;">
                                    <label for="recipient-name" class="col-form-label">Data:</label>
                                    <input type="date" name="data" id="data" style="width: 200px;" value="<?php echo $convDate ?>" class="form-control" placeholder="Matrícula" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: whitesmoke;">Cogído:</label>
                                    <input type="text" name="codigos" id="codigos" style="width: 200px;" class="form-control is-valid" placeholder="Codigo Separador" autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
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
            <div class="modal fade" id="zerarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
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
                                    <input type="text" name="user" id="user" style="width: 200px;" class="form-control is-valid" placeholder="Matrícula" autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Senha:</label>
                                    <input type="password" name="password" id="password" style="width: 280px;" class="form-control is-valid" placeholder="Senha" autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
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
            <div id="meuModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Conteúdo do modal-->
                    <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <!-- Corpo do modal -->
                        <div class="modal-body" style="font-size: 12px; color: whitesmoke;">
                            <div id="wrap">
                                <div class="container">
                                    <div class="row">
                                        <form class="form-horizontal" action="0040.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                            <fieldset>
                                                <!-- Form Name -->
                                                <legend>Import PLN0040R</legend>
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
                                                    <label class="col-md-8 control-label" for="singlebutton">Import</label>
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
            <div>
                <!-- Modal -->
                <div id="meuModal98" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Conteúdo do modal-->
                        <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                            <!-- Corpo do modal -->
                            <div class="modal-body" style="font-size: 12px; color: whitesmoke;">
                                <div id="wrap">
                                    <div class="container">
                                        <div class="row">
                                            <form class="form-horizontal" action="0098.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                                <fieldset>
                                                    <!-- Form Name -->
                                                    <legend>Import PLN0098R</legend>
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
                                                        <label class="col-md-8 control-label" for="singlebutton">Import</label>
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
            <div class="modal fade" id="addhist0040" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Salvar lista de erros!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="addhist0040.php" method="post" class="needs-validation" id="formSearch" novalidate>
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
    </header>
    <div class="container" align="center" style="min-height: 500px;">
        <div class="border border-danger" style="background-color: white; color: black; width: 70%; border-radius: 20px; margin-top: 80px; font-size: 12px;">
            <from> 
                <br>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#meuModal" type="button">Import Lista</button>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#meuModal98" type="button">Import UPM</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="window.print()" value="Imprimir">Imprimir</button>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addhist0040" type="button">Salvar Historico</button>
                <br>
                <br>
                <?php if ($total > 0) : ?>
                    <table width="90%" align="center">
                        <thead>
                            <tr style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <th style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Total de erros!</th>
                                <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $errofalta ?></th>
                                <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $errosobra ?></th>
                                <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $errotroca ?></th>
                                <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $erroconf ?></th>
                                <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $errototalmes ?></th>
                            </tr>
                            <tr style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Data</th>                               
                                <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Falta</th>
                                <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Sobra</th>
                                <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Troca</th>
                                <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Err-Conf</th>
                                <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($erros_data = $stmt_array_mes_data->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros_data['data'] ?></td>                                 
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros_data['falta'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros_data['sobra'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros_data['troca'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros_data['conf'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $errototalmes ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>Nenhum usuário registrado</p>
                <?php endif; ?>
                </form>
                <br>
        </div>
    </div>

    <div class="container" align="center" style="min-height: 500px;">
        <div class="border border-danger" style="background-color: white; color: black; width: 70%; border-radius: 20px; margin-top: 30px; font-size: 12px;">
            <from>
                <br>
                <table width="90%" align="center">
                    <h6>Historico de erros!</h6>
                    <thead>
                        <tr style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Codigo</th>
                            <th style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Separador</th>
                            <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Falta</th>
                            <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Sobra</th>
                            <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Troca</th>
                            <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Err-Conf</th>
                            <th style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($erros_mes = $stmt_array_mes->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $erros_mes['cod'] ?></td>
                                <td style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php
                                    // SQL para selecionar os registros
                                    $sql_arry_separador = "SELECT  nome FROM separadores where codigo = $erros_mes[cod]";
                                    // seleciona os registros
                                    $stmt_array_separador = $PDO->prepare($sql_arry_separador);
                                    $stmt_array_separador->execute();
                                    $separador = $stmt_array_separador->fetchColumn();
                                    if (!isset($separador)) {
                                        echo ucwords($erros_mes['nome']);
                                    } else {
                                        echo ucwords($separador);
                                    }
                                    ?></td>
                                <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $erros_mes['falta'] ?></td>
                                <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $erros_mes['sobra'] ?></td>
                                <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $erros_mes['troca'] ?></td>
                                <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $erros_mes['conf'] ?></td>
                                <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $erros_mes['total'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                </form>
                <br>
        </div>
    </div>
    <br>
    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: blanchedalmond;">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By Thiago
            Cesar Napoleão</p>
    </footer>
</body>

</html>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>