<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

// abre a conexão
$PDOP = db_connect_prsc();
$PDO = db_connect();
$datalista = isset($_POST['datalista']) ? $_POST['datalista'] : null;

// sql_count para contar o total de registros
$sql_data = "SELECT data FROM faltas order by data desc";
// conta o toal de registros
$stmt_data = $PDOP->prepare($sql_data);
$stmt_data->execute();
$ultimadata = $stmt_data->fetchColumn();

if(empty($datalista)){
    $datalista = $ultimadata;
} else {
    $datalista = isset($_POST['datalista']) ? $_POST['datalista'] : null;
}


$isoDate = dateConvert($datalista);
// SQL para selecionar os registros
$sql_arry = "SELECT id, colaborador, setor, motivo, obs, justificativa  FROM faltas where data = '$datalista' order by motivo asc, setor asc, colaborador asc";
// seleciona os registros
$stmt_array = $PDOP->prepare($sql_arry);
$stmt_array->execute();

// sql_count para contar o total de registros
$sql_count = "SELECT count(colaborador) FROM faltas where data = '$datalista'";
// conta o toal de registros
$stmt_count = $PDOP->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// sql_count para contar o total de registros
$sql_count_falta = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'FALTA'";
// conta o toal de registros
$stmt_count_falta = $PDOP->prepare($sql_count_falta);
$stmt_count_falta->execute();
$falta = $stmt_count_falta->fetchColumn();

// sql_count para contar o total de registros
$sql_count_atestado = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'ATESTADO'";
// conta o toal de registros
$stmt_count_atestado = $PDOP->prepare($sql_count_atestado);
$stmt_count_atestado->execute();
$atestado = $stmt_count_atestado->fetchColumn();

// sql_count para contar o total de registros
$sql_count_afastado = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'afastamento'";
// conta o toal de registros
$stmt_count_afastado = $PDOP->prepare($sql_count_afastado);
$stmt_count_afastado->execute();
$afastado = $stmt_count_afastado->fetchColumn();

// sql_count para contar o total de registros
$sql_count_covid = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'COVID-19'";
// conta o toal de registros
$stmt_count_covid = $PDOP->prepare($sql_count_covid);
$stmt_count_covid->execute();
$covid = $stmt_count_covid->fetchColumn();

// sql_count para contar o total de registros
$sql_count_cedo = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'EMBORA MAIS CEDO'";
// conta o toal de registros
$stmt_count_cedo = $PDOP->prepare($sql_count_cedo);
$stmt_count_cedo->execute();
$cedo = $stmt_count_cedo->fetchColumn();

// sql_count para contar o total de registros
$sql_count_suspensao = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'SUSPENSAO'";
// conta o toal de registros
$stmt_count_suspensao = $PDOP->prepare($sql_count_suspensao);
$stmt_count_suspensao->execute();
$suspensao = $stmt_count_suspensao->fetchColumn();

// sql_count para contar o total de registros
$sql_count_advertencia = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'ADVERTENCIA'";
// conta o toal de registros
$stmt_count_advertencia = $PDOP->prepare($sql_count_advertencia);
$stmt_count_advertencia->execute();
$advertencia = $stmt_count_advertencia->fetchColumn();

// sql_count para contar o total de registros
$sql_count_trabalho = "SELECT count(colaborador) FROM faltas where data = '$datalista' and motivo = 'TRABALHO EXTERNO'";
// conta o toal de registros
$stmt_count_trabalho = $PDOP->prepare($sql_count_trabalho);
$stmt_count_trabalho->execute();
$trabalho = $stmt_count_trabalho->fetchColumn();


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
        <!-- mais semantico, inverso footer -->
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light" style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">  
            <a class="navbar-brand" href="../inicial.php">GrupoSC</a>
            <div id="collapse-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Presença
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="resumopresenca.php">Resumo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../presenca.php">Lançar Ausências</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="listapresenca.php">Consulta por
                                Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="listapresenca-mes.php">Consulta por
                                Mês</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="listapresencanome.php">Consulta por
                                Nome</a>
                        </div>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <div>
            <!-- Modal -->
            <div class="modal fade" id="listapresenca" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"
                    style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Selecione a Data
                                para listar as ausências!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="listapresenca.php" method="post">
                                <div class="form-group">
                                    <label for="validationServer01" class="col-form-label"
                                        style="color: whitesmoke;">Data:</label>
                                    <input type="date" name="datalista" id="datalista" style="width: 200px;"
                                        class="form-control is-valid" autofocus autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                                    <button type="submit" class="btn btn-primary">Consulta</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div style="margin-top: 50px; ">
            <div class="container" align="center">
                <div class="form-row"
                    style=" color: whitesmoke; font-size: 12px; align-items: center;display: flex;flex-direction: row;justify-content: center;">
                    <div class="col-sm-2 mb-1">
                        <a class="nav-link" data-toggle="modal" data-target="#listapresenca" href=""
                            style="color: whitesmoke; font-size: 14px;">Selecione a Data!!<img
                                src="../img/Calendar.png" /></a>
                    </div>
                    <div class="col-sm-1 mb-1">
                        <label for="validationServer05">Total</label>
                        <input type="number" name="total" id="total" value="<?php echo $total ?>" class="form-control"
                            disabled="">
                    </div>
                    <div class="col-sm-1 mb-1">
                        <label for="validationServer01">Falta</label>
                        <input type="number" name="falta" id="falta" value="<?php echo $falta ?>" class="form-control"
                            disabled="">
                    </div>
                    <div class="col-sm-1 mb-1">
                        <label for="validationServer02">Atestado</label>
                        <input type="number" name="atestado" id="atestado" value="<?php echo $atestado ?>"
                            class="form-control" disabled="">
                    </div>
                    <div class="col-sm-1 mb-1">
                        <label for="validationServer03">Afastamento</label>
                        <input type="number" name="afastamento" id="afastamento" value="<?php echo $afastado ?>"
                            class="form-control" disabled="">
                    </div>
                    <div class="col-sm-1 mb-1">
                        <label for="validationServer04">COVID-19</label>
                        <input type="number" name="covid-19" id="covid-19" value="<?php echo $covid ?>"
                            class="form-control" disabled="">
                    </div>
                    <div class="col-sm-1 mb-1">
                        <label for="validationServer05">Embora+Cedo</label>
                        <input type="number" name="+cedo" id="+cedo" value="<?php echo $cedo ?>" class="form-control"
                            disabled="">
                    </div>
                </div>
                <br>
            </div>
        </div>
        <br>
        <div class="container" align="center" style="min-height: 500px;">
            <div class="border border-danger"
                style="background-color: white; color: black; width: 90%; border-radius: 20px; font-size: 10px; min-height: 400px; margin-top: -30px;">
                <h4>Ausências referente ao dia <?php echo $isoDate ?> </h4>
                <table width="90%" align="center" style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Colaborador</th>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Setor</th>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                motivo</th>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Observação</th>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Justificativa</th>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($presenca = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['colaborador'] ?></td>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['setor'] ?></td>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['motivo'] ?></td>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['obs'] ?></td>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['justificativa'] ?></td>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <a href="form-edit.php?id=<?php echo $presenca['id'] ?>"><svg class="bi bi-pencil"
                                        width="2em" height="12px" viewBox="0 0 16 16" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z"
                                            clip-rule="evenodd" />
                                    </svg></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
    </header>

    <br>

    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: blanchedalmond; ">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By Thiago
            Cesar Napoleão</p>
    </footer>

</body>

</html>