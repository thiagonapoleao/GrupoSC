<?php
require_once '../init.php';

$PDO = db_connect_acesso();
$data = date('Y-m-d');

// abre a conexão
$PDO = db_connect();


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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</head>

 <body
    style="background-image:  url('.././img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
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
                            Portaria
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../portaria/saida_rotas.php">Saída de Rotas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../portaria/entrada_transportadora.php">Entrada de Transportadoras</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../portaria/saida_transportadora.php">Saída de Transportadoras</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../portaria/entrada_recebimento.php">Recebimento</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cadastro_motorista.php">Cadastro de Motorista</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cadastro_veiculo.php">Cadastro de Veiculo</a>
                        </div>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <br>
    <div
        style="align-items: center;display: flex;flex-direction: row;justify-content: center; font-size: 50px;margin-top: 3%; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; color: whitesmoke;">
        <p>Gestão Integrada</p>
    </div>
    <footer>
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: whitesmoke; margin-top: 27%; text-align: center;">Copyright &copy; 2021 - (GI) Gestão
            Integrada -
            Developed By Thiago Cesar Napoleão</p>
    </footer>

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