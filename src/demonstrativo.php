<?php
require_once 'restrito.php'; 
require_once 'init.php';

// abre a conexão
$PDO = db_connect();

$secondsWait = 60;
header("Refresh:$secondsWait");

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDO->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();


$data = $datacontabil;
$isoDate = dateConvert($data);


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

// SQL para selecionar os registros
$sql_arry = "SELECT id, rota, meta_liberacao_nota, liberacaocpd, impressora, danfenormal, danfeepec, fim_impressao, tempo_impr, meta_saida, comprovei, operador FROM demonstrativo WHERE data = '$datacontabil' order by sequencia desc";
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
$sql_arry_compr  = "SELECT id, rota, horario, operador FROM comprovei WHERE data = '$datacontabil' order by id DESC, rota DESC";
// seleciona os registros
$stmt_array_compr  = $PDO->prepare($sql_arry_compr );
$stmt_array_compr ->execute();

// SQL para selecionar os registros
$sql_meta_compr  = "SELECT horario FROM comprovei WHERE data = '$datacontabil'";
// seleciona os registros
$stmt_meta_compr  = $PDO->prepare($sql_meta_compr );
$stmt_meta_compr ->execute();
$meta_compr  = $stmt_meta_compr ->fetchColumn();

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GI - Gestão Integrada</title>
    <link rel="stylesheet" type="text/css" href="css/stilo.css">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width" scale="1">
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- transforma a pagina em  responsivel-->
    <!-- Adicionando JQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</head>

<body
    style="background: linear-gradient(to top,#004e92, #000428, #000000); background-attachment: fixed; background-size: 100% 100%; ">
    <header>
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
                    </li>
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
        <div class="container" align="center" style="margin-top: 40px;">
            <div class="border border-danger"
                style="background-color: white; color: black; width: 80%; border-radius: 20px; font-size: 12px; min-height: 500px;">

                <div class="container" align="center" style="margin-top: 10px;">
                <p>Consulta Desmosntrativo:<a class="dropdown-item" href="consdemonstrativo.php"> <img src="img/Lupa.png" style="margin-left: 35px;" /></a> </p>
                    <p>Total de Danfes Normal: <?php echo $total_nota ?> ---------- Total de Danfes EPEC:
                        <?php echo $total_nota_epec ?> </p>
                </div>
                <div class="container" id="div">
                    <?php if ($total > 0) : ?>
                    <table align="center" id="tbl" width="100%">
                        <thead>
                            <tr>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Rota</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Prev. Nota</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Lib. Nota</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Impr</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Danfes N</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Danfes E</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Fim Impr</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Meta Saida</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Comprovei</th>
                                <th
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Operador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($demonstrativo = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $demonstrativo['rota'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $demonstrativo['meta_liberacao_nota'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $demonstrativo['liberacaocpd'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $demonstrativo['impressora'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $demonstrativo['danfenormal'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $demonstrativo['danfeepec'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $demonstrativo['fim_impressao'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $demonstrativo['meta_saida'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $demonstrativo['comprovei'] ?>
                                </td>
                                <td
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $demonstrativo['operador'] ?>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                    <p>Nenhum registro</p>
                    <?php endif; ?>
                </div>
                <br>
            </div>
        </div>
        <br>
    </header>
    <br>
    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: whitesmoke">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By
            Thiago
            Cesar Napoleão</p>
    </footer>

</body>

</html>