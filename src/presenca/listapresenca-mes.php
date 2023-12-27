<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

// abre a conexão
$PDOP = db_connect_prsc();
$PDO = db_connect();

// SQL para selecionar os registros
$sql_arry_dataconsulta = "SELECT mes_ano FROM dataconsulta";
// seleciona os registros
$stmt_array_dataconsulta = $PDOP->prepare($sql_arry_dataconsulta);
$stmt_array_dataconsulta->execute();
$dataconsulta =  $stmt_array_dataconsulta->fetchColumn();

$array = explode("-", $dataconsulta);
$mes = $array[1];
$ano = $array[0];
$concatena_data = $mes."/".$ano;

// SQL para selecionar os registros
$sql_arry = "SELECT colaborador, setor, count(colaborador) as Faltas  FROM faltas where data LIKE '%$dataconsulta%'  GROUP BY colaborador order by faltas desc";
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
        <div>
            <!-- Modal -->
            <div class="modal fade" id="listapresenca" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"
                        style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Selecione o Mês
                                para listar as ausências!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="addconsulta.php" method="post">
                                <div class="form-group">
                                    <label for="validationServer01" class="col-form-label"
                                        style="color: whitesmoke;">Mês:</label>
                                    <input type="month" name="datalista" id="datalista" style="width: 200px;"
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
                <h4 style="color: whitesmoke;">Ausências referente a <?php echo $concatena_data ?> </h4>
                <div class="form-row"
                    style=" color: whitesmoke; font-size: 12px; align-items: center;display: flex;flex-direction: row;justify-content: center;">
                    <div class="col-sm-8 mb-1">
                        <a class="nav-link" data-toggle="modal" data-target="#listapresenca" href=""
                            style="color: whitesmoke; font-size: 14px;">Selecione o Mês!...<img
                                src="../img/Calendar.png" /></a>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="container" align="center" style="min-height: 500px;">
            <div class="container" id="interface"
                style="background-image:  url('img/pagina.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; width: 70%;  border-radius: 10px;">
                <canvas id="my21" style=" width : 120%; height : 400px"></canvas>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
                <script src="js/app21.js"></script>
            </div>
            <div class="container" id="interface"
                style="background-image:  url('img/pagina.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; margin-top: 10px; width: 70%;  border-radius: 10px;">
                <canvas id="my22" style=" width : 120%; height : 400px"></canvas>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
                <script src="js/app22.js"></script>
            </div>
            <br>
            <div class="border border-danger"
                style="background-color: white; color: black; width: 70%; border-radius: 20px; font-size: 14px; min-height: 400px; ">

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
                                Ausencias</th>
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
                                <?php echo $presenca['Faltas'] ?></td>

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