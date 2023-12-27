<?php
require_once '../init.php';

// abre a conexão
$PDO = db_connect();
$PDOPORT = db_connect_port();

// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$data = isset($_GET['data']) ? (int) $_GET['data'] : null;

$isoDate = dateConvert($data);
$today = date("Y-m-d");  

// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDO->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

$dataC = $datacontabil;
$isoDateC = dateConvert($dataC);

// busca os dados do usuário a ser editado
$sql = "SELECT id, data, placa, nome, cpf, entrada, datasaida, saida, empresa, obs, vigilante, cpf1, nome1 FROM entrada_veiculo WHERE id = :id";
$stmt = $PDOPORT->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$data = $datacontabil;
$isoDate = dateConvert($data);
$isoToday = dateConvert($today);
$datalist = date('d-m-Y', strtotime('-30 days', strtotime($today)));
$antToday = dateConvert($datalist);

// sql_count para contar o total de registros
$sql_count = "SELECT count(data) FROM entrada_veiculo ";
// conta o toal de registros
$stmt_count = $PDOPORT->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();


// SQL para selecionar os registros
$sql_arry_4 = "SELECT id, data, placa, nome, cpf, entrada, datasaida, saida, empresa, obs, vigilante, cpf1, nome1 FROM entrada_veiculo where data > '$antToday' order by data desc, entrada desc";
// seleciona os registros
$stmt_array_4 = $PDOPORT->prepare($sql_arry_4);
$stmt_array_4->execute();
$dataRecb = $stmt_count->fetchColumn();


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
        <div  class="container">
            <form action="edit.php" method="post" class="needs-validation" id="formSearch" novalidate>
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer01">Data</label>
                            <input type="date" class="form-control" name="data" id="data"
                            value="<?php echo $isoDate ?>" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                                <label for="validationServer02">Entrada</label>
                                <input type="time" class="form-control" name="horario" id="horario" value="<?php echo $user['entrada'] ?>" required>
                                <div class="valid-feedback">
                                    .
                                </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer04">Placa-Veiculo</label>
                            <input type="text" class="form-control" name="placa" id="placa" value="<?php echo $user['placa'] ?>" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer02">CPF Motorista</label>
                            <input type="number" class="form-control" name="cpf" id="cpf" value="<?php echo $user['cpf'] ?>" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                       
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer04">Nome Motorista</label>
                            <input type="text" class="form-control" name="motorista" id="motorista" value="<?php echo $user['nome'] ?>" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer02">CPF Ajudante</label>
                            <input type="number" class="form-control" name="cpf2" id="cpf2" value="<?php echo $user['cpf1'] ?>" >
                            <div class="valid-feedback">
                                .
                            </div>
                        </div> 
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer05">Nome Ajudante </label>
                            <input type="text" class="form-control" name="ajudante" id="ajudante" value="<?php echo $user['nome1'] ?>" >
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer05">Empresa </label>
                            <input type="text" class="form-control" name="empresa" id="empresa" value="<?php echo $user['empresa'] ?>" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer05">Observação </label>
                            <input type="text" class="form-control" name="obs" id="obs" value="<?php echo $user['obs'] ?>" >
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer05">Vigilante </label>
                            <input type="text" class="form-control" name="vigilante" id="vigilante" value="<?php echo $user['vigilante'] ?>" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>       
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer01">Data Saí<datalist></datalist></label>
                            <input type="date" class="form-control" name="dtsaida" id="dtsaida"
                            value="<?php echo $today ?>" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>     
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                                <label for="validationServer02">Saída</label>
                                <input type="time" class="form-control" name="saida" id="saida" autofocus required>
                                <div class="valid-feedback">
                                    .
                                </div>
                        </div>
                       
                        <div class="col-sm-1 mb-2">
                            <br>
                            <button style="margin-top: 8px;" class="btn btn-primary" type="submit">Salvar</button>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
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
            style="background-color: white; color: black; width: 100%;  font-size: 14px; border-radius: 5px; min-height:260px">
            <h3>Transportadora - Recebimento SC SPI </h3>
            <?php if ($total > 0) : ?>
            <table style="background-color: white; color: black; width: 90%; font-size:12px; margin-top: 5px; ">
                <thead>
                    <tr style=" border-top-style: groove;color: white;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; background: linear-gradient(to top,#004e92, #000428, #000000)">
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Dt Entrada</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Entrada</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Motorista</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Ajutande</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Placa</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Dt Saída</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Saída</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Empresa</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Obs</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Vigilante</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Lançar Saída</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($entrada_recebimento = $stmt_array_4->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td width="8%"
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                            <?php echo dateConvert($entrada_recebimento['data']) ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $entrada_recebimento['entrada'] ?></td>
                        <td width="15%"
                            style="text-align: left; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $entrada_recebimento['nome'] ?></td>
                        <td
                            style="text-align: left; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $entrada_recebimento['nome1'] ?></td>
                        <td width="8%"
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $entrada_recebimento['placa'] ?></td>
                        <td width="8%"
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo dateConvert($entrada_recebimento['datasaida']) ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $entrada_recebimento['saida'] ?></td>
                        <td
                            style="text-align: left; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $entrada_recebimento['empresa'] ?></td>  
                        <td
                            style="text-align: left; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $entrada_recebimento['obs'] ?></td>          
                        <td
                            style="text-align: left; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $entrada_recebimento['vigilante'] ?></td>  
                        <td width="10"
                            style="text-align: center;border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <a href="edit_entrada_recebimento.php?id=<?php echo $entrada_recebimento['id'] ?>"><svg class="bi bi-pencil"
                                    width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z"
                                        clip-rule="evenodd" />
                                </svg></a>
                        </td>                            
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <a href="deleteEntradaRecebimento.php?id=<?php echo $entrada_recebimento['id'] ?>"
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