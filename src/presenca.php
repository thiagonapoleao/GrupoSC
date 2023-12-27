<?php
require_once 'acessopresenca.php'; 
require_once 'init.php';

// abre a conexão
$PDOP = db_connect_prsc();
$PDO = db_connect();

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDO->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();


$isoDate = dateConvert($datacontabil);

// SQL para selecionar os registros
$sql_arry = "SELECT id, colaborador, setor, motivo  FROM faltas where data = '$isoDate' order by motivo asc, setor asc, colaborador asc";
// seleciona os registros
$stmt_array = $PDOP->prepare($sql_arry);
$stmt_array->execute();

// SQL para selecionar os registros
$sql_arry_colaborador = "SELECT colaborador FROM ativo ";
// seleciona os registros
$stmt_array_colaborador = $PDOP->prepare($sql_arry_colaborador);
$stmt_array_colaborador->execute();

// SQL para selecionar os registros
$sql_arry_motivo = "SELECT id, motivo FROM motivo order by id asc";
// seleciona os registros
$stmt_array_motivo = $PDOP->prepare($sql_arry_motivo);
$stmt_array_motivo->execute();



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
    <script>
    $(document).ready(function() {
        $("#search-box").keyup(function() {
            $.ajax({
                type: "POST",
                url: "readCountry.php",
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
style="background: linear-gradient(to top,#004e92, #000428, #000000); background-attachment: fixed; background-size: 100% 100%;  color:blanchedalmond">
    <header>
        <!-- mais semantico, inverso footer -->
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light" style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">  
            <a class="navbar-brand" href="inicial.php">GrupoSC</a>
            <div id="collapse-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Presença
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="presenca/resumopresenca.php">Resumo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="presenca.php">Lançar Ausências</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="presenca/listapresenca.php">Consulta por
                                Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="presenca/listapresenca-mes.php">Consulta por
                                Mês</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="presenca/listapresencanome.php">Consulta por
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
                        style="background-image: url('img/logo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Insira a Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="presenca/listapresenca.php" method="post">
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
        <div class="container" style=" margin-top: 50px; width: 80%;color: whitesmoke; ">
            <form action="presenca/add.php" method="post" class="needs-validation" id="formSearch" novalidate>
                <div class="form-row">
                    <div class="col-md-2 mb-3" style="font-size: 12px; ">
                        <label for="validationServer01">Data</label>
                        <input style="font-size: 12px; " type="date" class="form-control" name="data"
                            id="validationServer01" value="<?php echo $isoDate ?>" required>
                        <div class="valid-feedback">
                            .
                        </div>
                    </div>
                    <div class="col-md-4 mb-2" style="font-size: 12px; ">
                        <div class="frmSearch" style="font-size: 12px; ">
                            <label for="validationServer01">Colaborador</label>
                            <input type="text" id="search-box" class="form-control" name="colaborador"
                                style="font-size: 12px; text-transform: uppercase;" autocomplete="off"
                                placeholder="Nome" />
                            <div id="suggesstion-box"></div>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3" style="font-size: 12px; ">
                        <label for="validationServer03">Motivo</label>
                        <select class="form-control" style="font-size: 12px; text-transform: uppercase;" name="motivo">
                            <?php
                            while ($motivo = $stmt_array_motivo->fetch(PDO::FETCH_ASSOC)) : { //Loop all the options retrieved from the query
                            ?>
                            //Added Id for Options Element
                            <option id="<?php echo $motivo["id"]; ?>" value="<?php echo $motivo["motivo"]; ?>">
                                <?php echo $motivo["motivo"]; ?>
                            </option>
                            <!--Echo out options-->
                            <?php
                            }
                            ?>
                            <?php endwhile; ?>
                        </select>
                        <div class="valid-feedback">
                            .
                        </div>
                    </div>
                    <div class="col-md-3 mb-3" style="font-size: 12px; ">
                        <label for="validationServer04">Obs</label>
                        <input style="font-size: 12px; " type="text" class="form-control" name="obs"
                            id="validationServer04" required>
                        <div class="valid-feedback">
                            .
                        </div>
                    </div>
                    <div class="col-auto">
                        <button style="font-size: 12px; margin-top: 26px;" type="submit" class="btn btn-primary"
                            id="btnimprimir">Salvar</button>
                    </div>
                </div>

            </form>

        </div>
        <div class="container" align="center">
            <div class="border border-danger"
                style="background-color: white; color: black; width: 70%; border-radius: 20px; font-size: 12px; min-height: 400px;">
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
                            <td>
                            </td>
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
                                <a href="presenca/delete.php?id=<?php echo $presenca['id'] ?>"
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