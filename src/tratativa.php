<?php
require_once 'init.php';

// abre a conexão
$PDO = db_connect_tratativa();
$PDOD = db_connect();
// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

$isoDate = dateConvert($datacontabil);

// sql_count para contar o total de registros
$sql_count_separador = "SELECT count(codigo) FROM separadores";
// conta o toal de registros
$stmt_count_separador = $PDO->prepare($sql_count_separador);
$stmt_count_separador->execute();
$total_separador = $stmt_count_separador->fetchColumn();

// SQL para selecionar os registros
$sql_arry_separador = "SELECT id, codigo, nome FROM separadores GROUP BY nome asc ";
// seleciona os registros
$stmt_array_separador = $PDO->prepare($sql_arry_separador);
$stmt_array_separador->execute();


// sql_count para contar o total de registros
$sql_count = "SELECT SUM(total) FROM erro_linha where data = '$isoDate'";
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
$sql_arry = "SELECT id, codigo, nome, tipoErro, qtdErro, total, estacao, rota, hora FROM erro_linha where data = '$isoDate' order by id DESC, rota DESC";
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


// SQL para selecionar
$sql_arry_data = "SELECT data FROM erro_linha order by id asc";
// seleciona os registros
$stmt_array_data = $PDO->prepare($sql_arry_data);
$stmt_array_data->execute();
$dataBanco = $stmt_array_data->fetchColumn();

if (empty($dataBanco)) {
    $data = date('Y-m-d');
} else {
    $data = $dataBanco;
}

// calculo para saber quantos erros pode ter no dia para uma UPM de 
$PDOO = db_connect_indicadores();
// SQL para selecionar 
$sql_arry_venda_upm = "SELECT SUM(linha + geladeira + psico) FROM fechamento WHERE data = '$data'";
// seleciona os registros
$stmt_array_venda_upm = $PDOO->prepare($sql_arry_venda_upm);
$stmt_array_venda_upm->execute();
$venda_upm = $stmt_array_venda_upm->fetchColumn();

$porcentagem = 7.9;
$errosDia = $venda_upm * ($porcentagem / 10000);

$projecaoUPM = ($errosDia / $venda_upm) * 1000000;


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GI - Gestão Integrada</title>
    <link rel="stylesheet" type="text/css" href="stilo.css">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width" scale="1">
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- transforma a pagina em  responsivel-->
    <!-- Adicionando JQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>

    <script>
        $(function() {
            var linha = $("#projecao").text();
            var resultL = (projecao);
            $("#projecao-div").css("background", "#00FFFF");
            $("#projecao-div1").css("background", "#00FFFF");
            $("#projecao-div").css("border-style", "inset");
            $("#projecao-div").css("border-style", "outset");
            $("#projecao-div1").css("border-style", "inset");
            $("#projecao-div1").css("border-style", "outset");
        })
    </script>
    <script>
        $(function() {
            var linha = $("#linha").text();
            var resultL = (linha);

            if (resultL <= 2200) {
                $("#linha-div").css("background", "#00FF7F");
                $("#linha-div1").css("background", "#00FF7F");
                $("#linha-div").css("border-style", "inset");
                $("#linha-div").css("border-style", "outset");
                $("#linha-div1").css("border-style", "inset");
                $("#linha-div1").css("border-style", "outset");
            } else if (resultL > 2200) {
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

            if (resultT <= 2200) {
                $("#total-div").css("background", "#00FF7F");
                $("#total-div").css("border-style", "inset");
                $("#total-div").css("border-style", "outset");
                $("#total-div1").css("background", "#00FF7F");
                $("#total-div1").css("border-style", "inset");
                $("#total-div1").css("border-style", "outset");
            } else if (resultT > 2200) {
                $("#total-div").css("background", "#f20000");
                $("#total-div").css("border-style", "inset");
                $("#total-div").css("border-style", "outset");
                $("#total-div1").css("background", "#f20000");
                $("#total-div1").css("border-style", "inset");
                $("#total-div1").css("border-style", "outset");
            }
        })
    </script>

    <!-- transforma a pagina em  responsivel-->
</head>

<body style="background-image:  url('./img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- mais semantico, inverso footer -->
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light" style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">
            <a class="nav-link" data-toggle="modal" data-target="#viradatacontabil" href="" style="color: black; font-size: 20px;">GrupoSC</a>
            <div id="collapse-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Grandes Redes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="grandesredes.php">Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="grandesredes/import.php">Importar Arquivo</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Presença
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="presenca.php">Presença</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
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
                        <form action="tratativa/from-lista-individual.php" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label" style="color: whitesmoke;">Cogído
                                    Separdor:</label>
                                <input type="text" name="codigos" id="codigos" style="width: 200px;" class="form-control is-valid" placeholder="Codigos" autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
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
                        <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Esse processo vai
                            zerar os dados! Você tem
                            certeza?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="acesso_zerando.php" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label" style="color: whitesmoke;">Matricula:</label>
                                <input type="text" name="user" id="user" style="width: 200px;" class="form-control is-valid" placeholder="Matrícula" autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label" style="color: whitesmoke;">Senha:</label>
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
        <div id="listaModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-ml">
                <!-- Conteúdo do modal-->
                <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                    <!-- Corpo do modal -->
                    <div class="modal-body" style="font-size: 12px">
                        <div id="wrap">
                            <div class="container">
                                <from>
                                    <p style="color: whitesmoke;">Total de Separadores: <?php echo $total_separador ?>
                                    </p>
                                    <?php if ($total_separador > 0) : ?>
                                        <table width="70%" align="center">
                                            <thead style="color: whitesmoke;">
                                                <tr style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: whitesmoke;">
                                                    <th style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: whitesmoke;">
                                                        Codigo</th>
                                                    <th style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: whitesmoke;">
                                                        Nome</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($cadastro = $stmt_array_separador->fetch(PDO::FETCH_ASSOC)) : ?>
                                                    <tr style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;color: whitesmoke;">
                                                        <td style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: whitesmoke;">
                                                            <?php echo $cadastro['codigo'] ?></td>
                                                        <td style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; color: whitesmoke;">
                                                            <?php echo $cadastro['nome'] ?></td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    <?php else : ?>
                                        <p>Nenhum usuário registrado</p>
                                    <?php endif; ?>
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
        <div id="meuModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
                <!-- Conteúdo do modal-->
                <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                    <!-- Corpo do modal -->
                    <div class="modal-body" style="font-size: 12px; color: whitesmoke;">
                        <div id="wrap">
                            <div class="container">
                                <div class="row">
                                    <form class="form-horizontal" action="function.php" method="post" name="upload_excel" enctype="multipart/form-data">
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
    <div>
        <!-- Modal -->
        <div id="list0040r" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
                <!-- Conteúdo do modal-->
                <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                    <!-- Corpo do modal -->
                    <div class="modal-body" style="font-size: 12px; color: whitesmoke;">
                        <div id="wrap">
                            <div class="container">
                                <div class="row">
                                    <form class="form-horizontal" action="function0040.php" method="post" name="upload_excel" enctype="multipart/form-data">
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
    </div>
    <div class="container" style="background-image:  url('./img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; color: whitesmoke">
        <h4 align="center" class="modal-title" style="margin-top: 10px">Tratativa de Erros </h4>
        <div class="col-sm-3 mb-1" style="margin-top: 20px">
            <a data-toggle="modal" data-target="#listaModal"><img src="img/icons-usuario.png" />Lista de separadores</a>
        </div>
        <section id="corpo">
            <!-- tag <section> barra principal da pagina-->
            <article id="noticia-principal">
                <div class="container" style="margin-left: 10px; color: whitesmoke ">
                    <form action="tratativa/add.php" method="post" class="needs-validation" id="formSearch" novalidate>
                        <div align="center">
                            <label><?php echo $datacontabil ?></label>
                            <div class="form-row">
                                <div class="col-sm-2 mb-1">
                                    <label for="validationServer01">Codigo</label>
                                    <input type="number" name="codigo" id="codigo" class="form-control" autofocus onblur="myFunction()">
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <label for="validationServer02">T.Erro</label>
                                    <input type="number" name="terro" id="terro" class="form-control">
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <label for="validationServer03">Quantidade</label>
                                    <input type="number" name="quantidade" id="quantidade" class="form-control">
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <label for="validationServer04">Estação</label>
                                    <input type="number" name="estacao" id="estacao" class="form-control">
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <label for="validationServer05">Rota</label>
                                    <input type="number" name="rota" id="rota" class="form-control">
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <label for="validationServer05">Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control" disabled="">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </article>
        </section>
        <br>
        <aside id="lateral" style="background-image:  url('./img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
            <!-- tag <aside> barra lateral da pagina-->
            <div align="center" style="color: black;">
                <a style="color: whitesmoke;" data-toggle="modal" data-target="#meuModal"><svg class="bi bi-upload" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8zM5 4.854a.5.5 0 0 0 .707 0L8 2.56l2.293 2.293A.5.5 0 1 0 11 4.146L8.354 1.5a.5.5 0 0 0-.708 0L5 4.146a.5.5 0 0 0 0 .708z" />
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 2z" />
                    </svg></a>
                <br>
                <h6 style="color: blanchedalmond;">UPM-Linha</h6>
                <div class="form-row" style="font-size: 14px;" id="linha-div">
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer02"><b>Meta</b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03"><b>UPM</b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03"><b>Erros</b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03"><b>Un.Conf</b></label>
                    </div>
                </div>
                <div class="form-row" style="font-size: 14px; margin-top: -3px" id="linha-div1">
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer02" style="font-size: 16px;"><b>2200</b></b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label id="linha" for="validationServer03" style="font-size: 16px;"><b><?php echo $upm_linha ?></b></b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label id="linha-erros" for="validationServer03" style="font-size: 16px;"><b><?php echo $erros_linha; ?></b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label id="linha-venda" for="validationServer03" style="font-size: 16px;"><b><?php echo number_format($venda_linha, 0, ',', '.'); ?></b></label>
                    </div>
                </div>

                <h6 style="color: blanchedalmond;">UPM-Psico</h6>
                <div class="form-row" style="font-size: 14px" id="psico-div">
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer02"><b>Meta</b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03"><b>UPM</b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03"><b>Erros</b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03"><b>Un.Conf</b></label>
                    </div>
                </div>
                <div class="form-row" style="font-size: 14px; margin-top: -3px" id="psico-div1">
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer02" style="font-size: 16px;"><b>0</b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label id="psico" for="validationServer03" style="font-size: 16px;"><b><?php echo number_format($upm_psico, 0, ',', '.'); ?></b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03" style="font-size: 16px;"><b><?php echo $erros_psico; ?></b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03" style="font-size: 16px;"><b><?php echo number_format($venda_psico, 0, ',', '.'); ?></b></label>
                    </div>
                </div>

                <h6 style="color: blanchedalmond;">UPM-Total</h6>
                <div class="form-row" style="font-size: 14px" id="total-div">
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer02"><b>Meta</b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03"><b>UPM</b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03"><b>Erros</b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03"><b>Un.Conf</b></label>
                    </div>
                </div>
                <div class="form-row" style="font-size: 14px; margin-top: -3px" id="total-div1">
                    <div id="metaTotal" class="col-sm-3 mb-1">
                        <label for="validationServer02" style="font-size: 16px;"><b>2200</b></label>
                    </div>
                    <div id="" class="col-sm-3 mb-1">
                        <label id="total" for="validationServer03" style="font-size: 16px;"><b><?php echo $upm_total ?></b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03" style="font-size: 16px;"><b><?php echo $erro_total; ?></b></label>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="validationServer03" style="font-size: 16px;"><b><?php echo number_format($venda_total, 0, ',', '.'); ?></b></label>
                    </div>
                </div>
            </div>
        </aside>
        <div class="container" style="min-height: 250px;">
            <?php if ($total > 0) : ?>
                <table width="70%" align="center" id="tbl" style="color: blanchedalmond;">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Separdor</th>
                            <th>T.Erro</th>
                            <th>Quantidade</th>
                            <th>Total</th>
                            <th>Estação</th>
                            <th>Rota</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($tratativa = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td><b><?php echo $tratativa['codigo'] ?></td>
                                <td><b><?php echo $tratativa['nome'] ?></td>
                                <td align="center"><b><?php echo $tratativa['tipoErro'] ?></td>
                                <td align="center"><b><?php echo $tratativa['qtdErro'] ?></td>
                                <td align="center"><b><?php echo $tratativa['total'] ?></td>
                                <td align="center"><b><?php echo $tratativa['estacao'] ?></td>
                                <td align="center"><b><?php echo $tratativa['rota'] ?></td>
                                <td align="center"><b><?php echo $tratativa['hora'] ?></td>
                                <td>
                                    <a href="tratativa/delete.php?id=<?php echo $tratativa['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">
                                        <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd" />
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Nenhum erro registrado</p>
            <?php endif; ?>
        </div>
    </div>
    <br>
    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: blanchedalmond;">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By Thiago
            Cesar Napoleão</p>
    </footer>

    <script>
        document.getElementById("codigo").onblur = function() {
            myFunction()
        };

        $("#codigo").blur(function() {
            $.ajax({
                url: 'searchs.php',
                type: 'post',
                dataType: 'json',
                data: {
                    searchAdress: 1,
                    codigo: $("#codigo").val()
                }
            }).done(function(data) {
                if (data) {
                    $("#nome").val(data.nome);
                } else {
                    $("#nome").val("S/ Cadastro");
                }
            }).fail(function(data) {
                console.log(data)
            })
        });
    </script>

</body>

</html>