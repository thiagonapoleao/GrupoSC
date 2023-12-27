<?php
require_once '../init.php';

// abre a conexão
$PDOP = db_connect_prsc();
$PDO = db_connect();


$secondsWait = 60;
header("Refresh:$secondsWait");

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDO->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

$datames = $datacontabil;
$array = explode("/", $datames);
$dia = $array[0];
$mes = $array[1];
$ano = $array[2];
$concatena_data = "Mês-".$mes;

// sql_count para contar o total de registros
$sql_data = "SELECT data FROM faltas order by data desc";
// conta o toal de registros
$stmt_data = $PDOP->prepare($sql_data);
$stmt_data->execute();
$ultimadata = $stmt_data->fetchColumn();


$isoDate = dateConvert($datalista);
// SQL para selecionar os registros
$sql_arry = "SELECT count(colaborador) AS quantidade, colaborador FROM faltas WHERE data LIKE '%-$mes-%' GROUP BY colaborador order by quantidade desc, colaborador asc";
// seleciona os registros
$stmt_array = $PDOP->prepare($sql_arry);
$stmt_array->execute();


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
        <br>
        <div>
            <!-- Modal -->
            <div class="modal fade" id="listapresenca" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"
                        style="background-image: url('../img/logo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Insira a Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="listapresenca.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"
                                        style="color: whitesmoke;">Data:</label>
                                    <input type="date" name="datalista" id="datalista" style="width: 200px;"
                                        class="form-control is-valid" autofocus autocomplete="off" readonly
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
        <div class="container" align="center" style=" width: 60%; color: whitesmoke;">
            <h4>Ausências referente ao Mês - <?php echo $mes ?> </h4>
        </div>
        <div class="container" id="interface"
            style="background-image:  url('img/pagina.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; margin-top: 10px ; width: 60%; border-radius: 10px;">
            <canvas id="myChart" style=" width : 120%; height : 400px"></canvas>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
            <script src="js/app.js"></script>
        </div>
        <div class="container" id="interface"
            style="background-image:  url('img/pagina.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; margin-top: 10px; width: 60%;  border-radius: 10px;">
            <canvas id="m" style=" width : 120%; height : 400px"></canvas>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
            <script src="js/app3.js"></script>
        </div>
        <div class="container" id="interface"
            style="background-image:  url('img/pagina.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; margin-top: 10px ; width: 60%;  border-radius: 10px;">
            <canvas id="myCh" style=" width : 120%; height : 400px"></canvas>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
            <script src="js/app1.js"></script>
        </div>
        <div class="container" id="interface"
            style="background-image:  url('img/pagina.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; margin-top: 10px; width: 60%;  border-radius: 10px;">
            <canvas id="my" style=" width : 120%; height : 400px"></canvas>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
            <script src="js/app2.js"></script>
        </div>
        <br>
        <div class="container" align="center" style="min-height: 500px;">
            <div class="border border-danger"
                style="background-color: white; color: black; width: 50%; border-radius: 20px; font-size: 12px; min-height: 400px; margin-top: -20px;">
                <table width="90%" align="center" style="margin-top: 10px; font-size: 12px; color: black;">
                    <thead>
                        <tr>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Colaborador</th>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Faltas no Mês</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($presenca = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['colaborador'] ?></td>
                            <td align="center"
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['quantidade'] ?></td>
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