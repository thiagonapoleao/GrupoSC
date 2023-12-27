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
$sql_rota = "SELECT rota FROM demonstrativo WHERE data = '$datacontabil'";
// conta o toal de registros
$stmt_rota = $PDO->prepare($sql_rota);
$stmt_rota->execute();
$rota = $stmt_rota->fetchColumn();

// SQL para selecionar os registros
$sql_arry = "SELECT id, rota, liberacaocpd, fim_impressao, operador_laser, impressora FROM demonstrativo WHERE data = '$datacontabil' and liberacaocpd IS NOT NULL order by id DESC, rota DESC";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
    var clockid = new Array()
    var clockidoutside = new Array()
    var i_clock = -1
    var thistime = new Date()
    var hours = thistime.getHours()
    var minutes = thistime.getMinutes()
    var seconds = thistime.getSeconds()
    if (eval(hours) < 10) {
        hours = "0" + hours
    }
    if (eval(minutes) < 10) {
        minutes = "0" + minutes
    }
    if (seconds < 10) {
        seconds = "0" + seconds
    }
    var thistime = hours + ":" + minutes + ":" + seconds

    function writeclock() {
        i_clock++
        if (document.all || document.getElementById || document.layers) {
            clockid[i_clock] = "clock" + i_clock
            document.write("<span id='" + clockid[i_clock] + "' style='position:relative'>" + thistime + "</span>")
        }
    }

    function clockon() {
        thistime = new Date()
        hours = thistime.getHours()
        minutes = thistime.getMinutes()
        seconds = thistime.getSeconds()
        if (eval(hours) < 10) {
            hours = "0" + hours
        }
        if (eval(minutes) < 10) {
            minutes = "0" + minutes
        }
        if (seconds < 10) {
            seconds = "0" + seconds
        }
        thistime = hours + ":" + minutes + ":" + seconds

        if (document.all) {
            for (i = 0; i <= clockid.length - 1; i++) {
                var thisclock = eval(clockid[i])
                thisclock.innerHTML = thistime
            }
        }

        if (document.getElementById) {
            for (i = 0; i <= clockid.length - 1; i++) {
                document.getElementById(clockid[i]).innerHTML = thistime
            }
        }
        var timer = setTimeout("clockon()", 1000)
    }
    window.onload = clockon
    </SCRIPT>

    <!-- script relogio -->
</head>

<body
    style="background-image:  url('./img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- mais semantico, inverso footer -->
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
        <div class="container" style="margin-top: 20px; color:white ">
            <div class="container" style="align-content: center;">
                <h4 style="color: red;" align="center">
                    <script>
                    writeclock()
                    </SCRIPT>
                </h4>
            </div>
            <form action="cpd/laser/add.php" method="post" class="needs-validation" id="formSearch" novalidate>
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer01">Data</label>
                            <input type="date" class="form-control" name="data" id="validationServer01"
                                value="<?php echo $isoDate ?>" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-md-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer03">Rota</label>
                            <input type="number" class="form-control" name="rota" id="validationServer02" autofocus
                                required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-md-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer02">Horário</label>
                            <input type="time" class="form-control" name="horario" id="validationServer02" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-md-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer05">Cod. Operador</label>
                            <input type="number" class="form-control" name="codigo" id="codigo" onblur="myFunction()"
                                required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-md-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer06">Operador</label>
                            <input type="text" class="form-control" name="operador" id="operador" disabled="" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-md-2 mb-3" style="margin-right: -80px;">
                            <br>
                            <button style="margin-top: 8px;" class="btn btn-primary" type="submit">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="container" align="center" style="margin-top: 5px;">
            <div class="border border-danger"
                style="background-color: white; color: black; width: 80%; border-radius: 20px; font-size: 14px; min-height: 500px;">
                <?php if ($rota > 0) : ?>
                <table width="90%" align="center" id="tbl" style="margin-top: 5px;">
                    <thead>
                        <tr>
                            <th align="center"
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Impressora.....</th>
                            <th align="center"
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Rota.....</th>
                            <th align="center"
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Liberada.....</th>
                            <th align="center"
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Finalizada.....</th>
                            <th align="center"
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Operador.....</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($tratativa = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td align="center"
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $tratativa['impressora'] ?></td>
                            <td align="center"
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $tratativa['rota'] ?></td>
                            <td align="center"
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $tratativa['liberacaocpd'] ?></td>
                            <td align="center"
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $tratativa['fim_impressao'] ?></td>
                            <td align="center"
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $tratativa['operador_laser'] ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <?php else : ?>
                <p>Nenhum registro</p>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <br>

    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: blanchedalmond; ">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By Thiago
            Cesar Napoleão</p>
    </footer>


    <script>
    document.getElementById("codigo").onblur = function() {
        myFunction()
    };

    $("#codigo").blur(function() {
        $.ajax({
            url: 'searc.php',
            type: 'post',
            dataType: 'json',
            data: {
                searchAdress: 1,
                codigo: $("#codigo").val()
            }
        }).done(function(data) {
            if (data) {
                $("#operador").val(data.nome);
            } else {
                alert("Codigo não cadastrado!");
                $("#operador").val("");
            }
        }).fail(function(data) {
            console.log(data)
        })
    });

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