<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

$nome = isset($_POST['colaborador']) ? $_POST['colaborador'] : null;

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
$sql_arry = "SELECT id, data, colaborador, setor, motivo, obs, justificativa  FROM faltas where colaborador = '$nome' order by data asc";
// seleciona os registros
$stmt_array = $PDOP->prepare($sql_arry);
$stmt_array->execute();


// sql_count para contar o total de registros
$sql_count = "SELECT count(colaborador) FROM faltas where colaborador = '$nome'";
// conta o toal de registros
$stmt_count = $PDOP->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// sql_count para contar o total de registros
$sql_count_falta = "SELECT count(colaborador) FROM faltas where colaborador = '$nome' and motivo = 'FALTA'";
// conta o toal de registros
$stmt_count_falta = $PDOP->prepare($sql_count_falta);
$stmt_count_falta->execute();
$falta = $stmt_count_falta->fetchColumn();

// sql_count para contar o total de registros
$sql_count_atestado = "SELECT count(colaborador) FROM faltas where colaborador = '$nome' and motivo = 'ATESTADO'";
// conta o toal de registros
$stmt_count_atestado = $PDOP->prepare($sql_count_atestado);
$stmt_count_atestado->execute();
$atestado = $stmt_count_atestado->fetchColumn();

// sql_count para contar o total de registros
$sql_count_afastado = "SELECT count(colaborador) FROM faltas where colaborador = '$nome' and motivo = 'afastamento'";
// conta o toal de registros
$stmt_count_afastado = $PDOP->prepare($sql_count_afastado);
$stmt_count_afastado->execute();
$afastado = $stmt_count_afastado->fetchColumn();

// sql_count para contar o total de registros
$sql_count_covid = "SELECT count(colaborador) FROM faltas where colaborador = '$nome' and motivo = 'COVID-19'";
// conta o toal de registros
$stmt_count_covid = $PDOP->prepare($sql_count_covid);
$stmt_count_covid->execute();
$covid = $stmt_count_covid->fetchColumn();

// sql_count para contar o total de registros
$sql_count_cedo = "SELECT count(colaborador) FROM faltas where colaborador = '$nome' and motivo = 'EMBORA MAIS CEDO'";
// conta o toal de registros
$stmt_count_cedo = $PDOP->prepare($sql_count_cedo);
$stmt_count_cedo->execute();
$cedo = $stmt_count_cedo->fetchColumn();

// sql_count para contar o total de registros
$sql_count_suspensao = "SELECT count(colaborador) FROM faltas where colaborador = '$nome' and motivo = 'SUSPENSAO'";
// conta o toal de registros
$stmt_count_suspensao = $PDOP->prepare($sql_count_suspensao);
$stmt_count_suspensao->execute();
$suspensao = $stmt_count_suspensao->fetchColumn();

// sql_count para contar o total de registros
$sql_count_advertencia = "SELECT count(colaborador) FROM faltas where colaborador = '$nome' and motivo = 'ADVERTENCIA'";
// conta o toal de registros
$stmt_count_advertencia = $PDOP->prepare($sql_count_advertencia);
$stmt_count_advertencia->execute();
$advertencia = $stmt_count_advertencia->fetchColumn();

// sql_count para contar o total de registros
$sql_count_trabalho = "SELECT count(colaborador) FROM faltas where colaborador = '$nome' and motivo = 'TRABALHO EXTERNO'";
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
    <script>
    $(document).ready(function() {
        $("#search-box").keyup(function() {
            $.ajax({
                type: "POST",
                url: "../readCountry.php",
                data: 'keyword=' + $(this).val(),
                beforeSend: function() {
                    $("#search-box").css("background",
                        "#FFF url(img/LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data) {
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background", "#FFF");
                }
            });
        });
    });

    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
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
            <div class="modal fade" id="listanome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"
                    style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Selecione o Nome
                                para listar as ausências!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="listapresencanome.php" method="post" id="formSearch">
                                <div class="form-group">
                                    <label for="validationServer01" class="col-form-label" style="color: whitesmoke;">
                                        Nome do Colaborador:</label>
                                    <input type="text" id="search-box" class="form-control" name="colaborador"
                                        style="font-size: 12px; text-transform: uppercase;" autocomplete="off" autofocus
                                        placeholder="" />
                                    <div id="suggesstion-box"></div>
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
        <div class="container" align="center">
            <div width="90%">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button style="margin-top: 50px;" class="btn btn-outline-primary btn-sm"><a class="nav-link"
                            data-toggle="modal" data-target="#listanome" href="" style="color: whitesmoke;">Click aqui
                            para Nome do
                            Colaborador</a></button>
                </div>
            </div>
        </div>
        <br>
        <div style="margin-top: -25px; ">
            <div class="container" align="center">
                <div class="form-row"
                    style=" color: whitesmoke; font-size: 12px; align-items: center;display: flex;flex-direction: row;justify-content: center;">
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
        <div class="container" align="center" style="min-height: 500px; margin-top: 10px;">
            <div class="border border-danger"
                style="background-color: white; color: black; width: 90%; border-radius: 20px; font-size: 10px; min-height: 400px; margin-top: -30px;">
                <h4>Ausências por data do colaborador: <?php echo $nome ?></h4>
                <table width="90%" align="center" style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Data</th>
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

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($presenca = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['data'] ?></td>
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