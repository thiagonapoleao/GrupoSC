<?php
require_once '../init.php';

// abre a conexão
$PDOPORT = db_connect_port();

// sql_count para contar o total de registros
$sql_count = "SELECT count(codigo) FROM veiculos";
// conta o toal de registros
$stmt_count = $PDOPORT->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// SQL para selecionar os registros
$sql_arry = "SELECT id,codigo, placa, transportadora FROM veiculos order BY transportadora asc ";
// seleciona os registros
$stmt_array = $PDOPORT->prepare($sql_arry);
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
    style="background-image:  url('../img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- mais semantico, inverso footer -->
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light"
            style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">
                 <a class="navbar-brand" href="inicial.php">GrupoSC</a>
                 <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Portaria
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="saida_rotas.php">Saída de Rotas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="entrada_transportadora.php">Entrada de Transportadoras</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="saida_transportadora.php">Saída de Transportadoras</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="entrada_recebimento.php">Recebimento</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cadastro_motorista.php">Cadastro de Motorista</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cadastro_veiculo.php">Cadastro de Veiculo</a>
                        </div>
                    </li>
                </ul>      
        </nav>
    </header>
    <div class="container" 
          style="background-image:  url('.././img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
        <div class="container" style="margin-top: 80px; color:blanchedalmond;  " >
            <form action="addVeiculo.php" method="post" class="needs-validation" novalidate>
                <div class="container" align="center">
                    <div class="row justify-content-md-center">
                        <div class="col-sm-2 mb-1">
                            <label for="validationServer01">Placa "ex. STC2D89" </label>
                            <input type="text" name="placa" id="placa" class="form-control">
                        </div>
                        <div class="col-sm-3 mb-1">
                            <label for="validationServer02">Transportadora</label>
                            <input type="text" name="transportadora" id="transportadora" class="form-control">
                        </div>                        
                        <div class="col-sm-2 mb-5">
                            <br>
                            <button type="submit" id="submit" name="Import" class="btn btn-primary"
                                style="height: 50px">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container" align="center" style="margin-top: -40px;">
        <div class="border border-danger"
            style="background-color: white; color: black; width: 80%;  font-size: 14px; border-radius: 5px; min-height:260px">
            <h3>Cadastro de Veiculo SC SPI</h3>
            <?php if ($total > 0) : ?>
            <table style="background-color: white; color: black; width: 90%; font-size:12px; margin-top: 5px; ">
                <thead>
                <tr
                        style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Codigo</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Placa</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Transportadora</th>                       
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($cadastro = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr
                        style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cadastro['codigo'] ?></td>
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cadastro['placa'] ?></td>
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cadastro['transportadora'] ?></td>
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <a href="deleteVeiculo.php?id=<?php echo $cadastro['id'] ?>"
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
            <?php else : ?>
            <p>Nenhum usuário registrado</p>
            <?php endif; ?>
            <br>
        </div>
    </div>
    </div>
</body>

</html>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>