<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

$PDOGR = db_connect_grandesredes();

$nome_colaborador = $_SESSION['nome'];
$rota_auditada = $_SESSION['rota'];
$data_auditada = $_SESSION['data'];

$isoDate = dateConvert($data_auditada);

$sql_count = "SELECT SUM(picklist) FROM auditoria where rota = '$rota_auditada' and data = '$isoDate '";
$stmt_count = $PDOGR->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$sql_arry = "SELECT DISTINCT picklist, volume, descricao, lote, validade, qtd, hora FROM auditoria where rota = '$rota_auditada' and data = '$isoDate ' order by picklist and volume desc";
$stmt_array = $PDOGR->prepare($sql_arry);
$stmt_array->execute();

$sql_arry_falta = "SELECT DISTINCT p as picklist, a+1 AS volumeinicial, b-1 AS volumefinal, (b - a) -1 AS faltadvolume FROM  (SELECT  a1.picklist as p, a1.volume AS a , MIN(a2.volume) AS b FROM auditoria  AS a1 LEFT JOIN auditoria AS a2 ON a2.volume > a1.volume WHERE a1.volume <= 10000 and rota = '$rota_auditada' GROUP BY a1.volume) AS tab WHERE b > a + 1 order by picklist asc";
$stmt_array_falta = $PDOGR->prepare($sql_arry_falta);
$stmt_array_falta->execute();

$sql_arry_auditoria = "SELECT picklist, count(DISTINCT volume), rota, roteiro FROM auditoria where rota = '$rota_auditada' and data = '$isoDate ' GROUP BY picklist order by picklist DESC";
$stmt_array_auditoria  = $PDOGR->prepare($sql_arry_auditoria );
$stmt_array_auditoria ->execute();


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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
</head>

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
                            <a class="dropdown-item" href="../produtividade/analiseconferencia.php">Painel da
                                Produtividade</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../produtividade/analiseconferenciadata.php">Produtividade
                                por Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="../produtividade/analiseconferenciaindividual.php">Produtividade por
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
                            <a class="dropdown-item" href="from-listaerros.php">Lista de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="tratativa/from-listaerros-impr.php">Imprimir Lista de
                                Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-link" data-toggle="modal" data-target="#listaIndivModal" href="">Lista
                                individual</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../upm/from-grafico.php">Grafico</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../cadastro/cadastro.php">Cadastro</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Grandes Redes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../grandesredes.php">Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="import.php">Importar Arquivo</a>
                        </div>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <div>
            <!-- Modal -->
            <div class="modal fade" id="auditoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"
                        style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Digite o Picklist
                                para Analise</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="analiseauditoria.php" method="post" class="needs-validation" id="formSearch"
                                novalidate>
                                <div class="form-group" style="color: whitesmoke;">
                                    <label for="message-text" class="col-form-label">Picklist:</label>
                                    <input type="text" name="picklist" id="picklist" style="width: 280px;"
                                        class="form-control" placeholder="Picklist" autocomplete="off" readonly
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
        <div class="container" style="margin-top: 40px; color: whitesmoke; ">
            <div class="container">
                <h4 style="color: red;" align="center"> Auditoria das Grandes Redes e Agendados </h4>
            </div>
            <br>
            <form action="add.php" method="post" class="needs-validation" id="formSearch" novalidate>
                <div class="col-auto"
                    style="align-items: center;display: flex;flex-direction: row;justify-content: center;">
                    <div class="col-md-6 mb-3" style="margin-top: -20px;">
                        <label align="center"
                            style="align-items: center;display: flex;flex-direction: row;justify-content: center;">Auditor:
                            <?php echo $_SESSION['nome'] ?>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Rota:
                            <?php echo $_SESSION['rota'] ?></label>
                        <input style="text-align: center;" type="number" class="form-control" name="picklist"
                            placeholder="Aguardando leitura do Picklist" id="picklist" autofocus required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Consulta</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container" align="center" style="margin-top: 3px; color: whitesmoke; ">        
            <button type="button" class="btn btn-primary"><a data-toggle="modal" data-target="#auditoria">Auditoria de
                    Picklist </a> </button>
        </div>
        <div class="container" align="center" style="margin-top: 10px;">
            <div class="border border-danger"
                style="background-color: white; color: black; width: 80%; border-radius: 20px; font-size: 12px; min-height: 100px;">
                <div class="container" align="start">
                    <h6 style="color: red;"></h6>
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
                                    Roteiro</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Piklcist</th>
                                 <th
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Tota de Volume</th>
                                <th
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Volume lidos</th>
                                <th
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Volume restantes</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($auditoria = $stmt_array_auditoria->fetch(PDO::FETCH_ASSOC)) : ?>                            
                            <?php 
                            $sql_arry_count_volumes = "SELECT count(volume) FROM pln0048r where  picklist = '".$auditoria['picklist']."'";
                            $stmt_array_count_volumes  = $PDOGR->prepare($sql_arry_count_volumes );
                            $stmt_array_count_volumes ->execute();
                            $volume_count = $stmt_array_count_volumes->fetchColumn(); ?>
                            <tr>
                                <td
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $auditoria['rota'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $auditoria['roteiro'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $auditoria['picklist'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $volume_count ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $auditoria['count(DISTINCT volume)'] ?>
                                </td>                             
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $volume_count - $auditoria['count(DISTINCT volume)'] ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>                           
                        </tbody>
                    </table>
                    <?php else : ?>
                    <p>Nenhum registro na data <?php echo $isoDate  ?></p>
                    <?php endif; ?>
                </div>
                <br>
            </div>
            <br>
            <div class="border border-danger"
                style="background-color: white; color: black; width: 80%; border-radius: 20px; font-size: 12px; min-height: 500px;">
                <div class="container" id="div" style="margin-top: 10px;">
                    <?php if ($total > 0) : ?>
                    <table align="center" id="tbl" width="100%">
                        <thead>
                            <tr>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Piklcist</th>
                                <th
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Volume</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Descrição</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Lote</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Validade</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Quantidade</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($rota790 = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $rota790['picklist'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $rota790['volume'] ?>
                                </td>
                                <td
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $rota790['descricao'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $rota790['lote'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $rota790['validade'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $rota790['qtd'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $rota790['hora'] ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                    <p>Nenhum registro na data <?php echo $isoDate  ?></p>
                    <?php endif; ?>
                </div>
                <br>
            </div>
            <br>
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