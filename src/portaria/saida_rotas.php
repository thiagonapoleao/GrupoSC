<?php
require_once '../init.php';

// abre a conexão
$PDO = db_connect();
$PDOPORT = db_connect_port();

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDO->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

$data = $datacontabil;
$isoDate = dateConvert($data);

// sql_count para contar o total de registros
$sql_count = "SELECT count(data) FROM saida_rota where data =  '$data'";
// conta o toal de registros
$stmt_count = $PDOPORT->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// SQL para selecionar os registros
$sql_arry_4 = "SELECT id, data, rt, destino, moto, placa, meta, saida FROM saida_rota where data = '$datacontabil' order by saida desc ";
// seleciona os registros
$stmt_array_4 = $PDOPORT->prepare($sql_arry_4);
$stmt_array_4->execute();


// sql_count para contar o total de registros
$sql_count_motoristas = "SELECT count(codigo) FROM motoristas";
// conta o toal de registros
$stmt_count_motoristas = $PDOPORT->prepare($sql_count_motoristas);
$stmt_count_motoristas->execute();
$total_motoristas = $stmt_count_motoristas->fetchColumn();

// SQL para selecionar os registros
$sql_arry_motoristas = "SELECT codigo, moto, empresa FROM motoristas order BY moto asc ";
// seleciona os registros
$stmt_array_motoristas = $PDOPORT->prepare($sql_arry_motoristas);
$stmt_array_motoristas->execute();

// sql_count para contar o total de registros
$sql_count_veiculos = "SELECT count(codigo) FROM veiculos";
// conta o toal de registros
$stmt_count_veiculos = $PDOPORT->prepare($sql_count_veiculos);
$stmt_count_veiculos->execute();
$total_veiculos = $stmt_count_veiculos->fetchColumn();

// SQL para selecionar os registros
$sql_arry_veiculos = "SELECT codigo, placa, transportadora FROM veiculos order BY placa asc  ";
// seleciona os registros
$stmt_array_veiculos = $PDOPORT->prepare($sql_arry_veiculos);
$stmt_array_veiculos->execute();

// sql_count para contar o total de registros
$sql_count_rotas = "SELECT count(codigo) FROM rota";
// conta o toal de registros
$stmt_count_rotas = $PDOPORT->prepare($sql_count_rotas);
$stmt_count_rotas->execute();
$total_rotas = $stmt_count_rotas->fetchColumn();

// SQL para selecionar os registros
$sql_arry_rotas = "SELECT codigo, rt, destino, meta FROM rota order BY codigo asc";
// seleciona os registros
$stmt_array_rotas = $PDOPORT->prepare($sql_arry_rotas);
$stmt_array_rotas->execute();

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
    <script>
    function trocaCor(id) {
        var cor = document.getElementById(id).style.background
        if (cor == '#0000FF') cor = '#FF0000';
        else cor = '#0000FF';
        document.getElementById(id).style.background = cor;
    }
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
    <div class="container" style="margin-top: 80px; color:blanchedalmond;  align-items: center; " >
         <!-- Modal -->
         <div id="listaModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-ml">
                <!-- Conteúdo do modal-->
                <div class="modal-content"
                style="background-image:  url('../img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
                    <!-- Corpo do modal -->
                    <div class="modal-body" style="font-size: 12px">
                        <div id="wrap">
                            <div class="container">
                                <from>
                                    <p style="color: whitesmoke;">Total de Motoristas: <?php echo $total_motoristas ?>
                                    </p>
                                    <?php if ($total_motoristas > 0) : ?>
                                    <table  width="100%" align="center" style="background-color: white; color: black; width: 90%; font-size:12px; margin-top: 5px; ">
                                        <thead >
                                            <tr
                                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                <th
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    Codigo</th>
                                                <th
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    Motorista</th>
                                                 <th
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    Transportadora</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($cadastro = $stmt_array_motoristas->fetch(PDO::FETCH_ASSOC)) : ?>
                                            <tr
                                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                                <td
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    <?php echo $cadastro['codigo'] ?></td>
                                                <td
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    <?php echo $cadastro['moto'] ?></td>
                                                <td
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    <?php echo $cadastro['empresa'] ?></td>    
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                    <?php else : ?>
                                    <p>Nenhum usuário registrado</p>
                                    <?php endif; ?>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <!-- Modal -->
     <div id="listaVeiculos" class="modal fade" role="dialog">
            <div class="modal-dialog modal-ml">
                <!-- Conteúdo do modal-->
                <div class="modal-content"
                style="background-image:  url('../img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
                    <!-- Corpo do modal -->
                    <div class="modal-body" style="font-size: 12px">
                        <div id="wrap">
                            <div class="container">
                                <from>
                                    <p style="color: whitesmoke;">Total de Veiculos: <?php echo $total_veiculos ?>
                                    </p>
                                    <?php if ($total_veiculos > 0) : ?>
                                    <table  width="100%" align="center" style="background-color: white; color: black; width: 90%; font-size:12px; margin-top: 5px; ">
                                        <thead >
                                            <tr
                                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                <th
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    Codigo</th>
                                                <th
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    Placa</th>
                                                 <th
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    Transportadora</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($cadastro = $stmt_array_veiculos->fetch(PDO::FETCH_ASSOC)) : ?>
                                            <tr
                                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                                <td
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    <?php echo $cadastro['codigo'] ?></td>
                                                <td
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    <?php echo $cadastro['placa'] ?></td>
                                                <td
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                    <?php echo $cadastro['transportadora'] ?></td>    
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                    <?php else : ?>
                                    <p>Nenhum usuário registrado</p>
                                    <?php endif; ?>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- Modal -->
     <div id="listaRotas" class="modal fade" role="dialog">
            <div class="modal-dialog modal-ml">
                <!-- Conteúdo do modal-->
                <div class="modal-content"
                style="background-image:  url('../img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
                    <!-- Corpo do modal -->
                    <div class="modal-body" style="font-size: 12px">
                        <div id="wrap">
                            <div class="container">
                                <from>
                                    <p style="color: whitesmoke;">Total de Rotas: <?php echo $total_rotas ?>
                                    </p>
                                    <?php if ($total_rotas > 0) : ?>
                                    <table width="100%" align="center" style="background-color: white; color: black; width: 90%; font-size:12px; margin-top: 5px; ">
                                        <thead >
                                            <tr
                                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                                                <th
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                                    Codigo</th>
                                                <th
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                                    Rota</th>
                                                 <th
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                                    Destino</th>
                                                <th
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                                    Meta de Saída</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($rotas = $stmt_array_rotas->fetch(PDO::FETCH_ASSOC)) : ?>
                                            <tr
                                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                                <td
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                                    <?php echo $rotas['codigo'] ?></td>
                                                <td
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                                    <?php echo $rotas['rt'] ?></td>
                                                <td
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                                    <?php echo $rotas['destino'] ?></td> 
                                                <td
                                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                                    <?php echo $rotas['meta'] ?></td>    
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                    <?php else : ?>
                                    <p>Nenhum usuário registrado</p>
                                    <?php endif; ?>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div  style="margin-top: -15px">
            <a data-toggle="modal" data-target="#listaModal"><img src="../img/icons8-motorista-50.png" />Lista de Motorista</a>
            <a data-toggle="modal" data-target="#listaVeiculos"><img src="../img/icons8-caminhão-50.png" />Lista de Veiculos</a>
            <a data-toggle="modal" data-target="#listaRotas"><img src="../img/icons8-rota-48.png" />Lista de Rotas</a>
        </div>
        <div  class="container">
            <form action="addSaidaRota.php" method="post" class="needs-validation" id="formSearch" novalidate>
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer01">Data (fechamento)</label>
                            <input type="date" class="form-control" name="data" id="data"
                                value="<?php echo $isoDate ?>" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer02">Cod. Rota</label>
                            <input type="number" class="form-control" name="cdrota" id="cdrota" autofocus
                                onblur="myFunction()" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer04">Rota</label>
                            <input type="text" class="form-control" name="rota" id="rota" disabled="" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer04">Destino</label>
                            <input type="text" class="form-control" name="destino" id="destino" disabled="" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer04">Meta-Saída</label>
                            <input type="text" class="form-control" name="meta" id="meta" disabled="" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer02">Cod. Veiculo</label>
                            <input type="number" class="form-control" name="cdveiculo" id="cdveiculo" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer04">Veiculo</label>
                            <input type="text" class="form-control" name="veiculo" id="veiculo" disabled="" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer04">Transportadora</label>
                            <input type="text" class="form-control" name="transportadora" id="transportadora" disabled="" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer02">Cod. Motorista</label>
                            <input type="number" class="form-control" name="cdmotorista" id="cdmotorista" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div> 
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer05">Motorista </label>
                            <input type="text" class="form-control" name="motorista" id="motorista" disabled="" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                                <label for="validationServer02">Horário</label>
                                <input type="time" class="form-control" name="horario" id="horario" required>
                                <div class="valid-feedback">
                                    .
                                </div>
                            </div>
                        <div class="col-sm-1 mb-2">
                            <br>
                            <button style="margin-top: 8px;" class="btn btn-primary" type="submit">Salvar</button>
                        </div>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="container" align="center" style="margin-top: -40px;">
        <div class="border border-danger"
            style="background-color: white; color: black; width: 80%;  font-size: 14px; border-radius: 5px; min-height:260px">
            <h3>Saída de Rotas SC SPI</h3>
            <?php if ($total > 0) : ?>
            <table style="background-color: white; color: black; width: 90%; font-size:12px; margin-top: 5px; ">
                <thead>
                    <tr style=" border-top-style: groove;color: white;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; background: linear-gradient(to top,#004e92, #000428, #000000)">
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Data</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Rota</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Destino</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Motorista</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Placa</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Meta de Saída</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Saída do CD</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($saida_rota = $stmt_array_4->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                            <?php echo $saida_rota['data'] ?></td>
                        <td
                            style="text-align: left; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $saida_rota['rt'] ?></td>
                        <td
                            style="text-align: left; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $saida_rota['destino'] ?></td>
                        <td
                            style="text-align: left; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; font-size: 10px;">
                            <?php echo $saida_rota['moto'] ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $saida_rota['placa'] ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $saida_rota['meta'] ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $saida_rota['saida'] ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <a href="deleteSaidaRota.php?id=<?php echo $saida_rota['id'] ?>"
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
            <p>Nenhum item registrado</p>
            <?php endif; ?>
            <br>
        </div>
    </div>

    <br>

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
   document.getElementById("cdrota").onblur = function() {
        mFunction()
    };
   
    $("#cdrota").blur(function() {
        $.ajax({
            url: '../searcsaida.php',
            type: 'post',
            dataType: 'json',
            data: {
                searchAdress: 1,
                cdrota: $("#cdrota").val()
            }
        }).done(function(data) {
            if (data) {
                $("#rota").val(data.rt);
                $("#destino").val(data.destino);
                $("#meta").val(data.meta);
            } else {
                $("#rota").val("");
                $("#destino").val("");
                $("#meta").val("");
            }
        }).fail(function(data) {
            console.log(data)
        })
    });

    document.getElementById("cdveiculo").onblur = function() {
        mFunction()
    };
   
    $("#cdveiculo").blur(function() {
        $.ajax({
            url: '../searcveiculo.php',
            type: 'post',
            dataType: 'json',
            data: {
                searchAdress: 1,
                cdveiculo: $("#cdveiculo").val()
            }
        }).done(function(data) {
            if (data) {
                $("#veiculo").val(data.placa);
                $("#transportadora").val(data.transportadora);
            } else {
               $("#veiculo").val("");
            }
        }).fail(function(data) {
            console.log(data)
        })
    });

    document.getElementById("cdmotorista").onblur = function() {
        mFunction()
    };
   
    $("#cdmotorista").blur(function() {
        $.ajax({
            url: '../searcmotorista.php',
            type: 'post',
            dataType: 'json',
            data: {
                searchAdress: 1,
                cdmotorista: $("#cdmotorista").val()
            }
        }).done(function(data) {
            if (data) {
                $("#motorista").val(data.moto);
            } else {
                $("#motorista").val("");
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


    <br>
    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: whitesmoke">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By
            Thiago
            Cesar Napoleão</p>
    </footer>

</body>

</html>