<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

// abre a conexão
$PDO = db_connect();
$PDOC = db_connect_conf();
$PDOE = db_connect_eerg();

$secondsWait = 60;
header("Refresh:$secondsWait");

$estacao = $_SESSION['estacao'];

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDO->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

$data = $datacontabil;
$isoDate = dateConvert($data);

// sql_count para contar o total de registros
$sql_count = "SELECT count(data) FROM cancelados where estacao = $estacao ";
// conta o toal de registros
$stmt_count = $PDOC->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// SQL para selecionar os registros
$sql_arry_4 = "SELECT data, estacao, endereco, motivo, estoque, descricao, cancelado, codigo FROM cancelados where estacao = $estacao and motivo NOT IN ('Produto Vencido','Cancelamento comercial, Ca') GROUP BY codigo order by endereco asc";
// seleciona os registros
$stmt_array_4 = $PDOC->prepare($sql_arry_4);
$stmt_array_4->execute();

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
    style="background: linear-gradient(to top,#004e92, #000428, #000000); background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- mais semantico, inverso footer -->
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light"
            style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">
            <a class="navbar-brand" href="">GrupoSC</a>
            <div id="collapse-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cancelamento
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">                            
                            <a class="dropdown-item" href="estacao.php">Lista de Cancelados</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <!-- Modal -->
        <div id="meuModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Conteúdo do modal-->
                    <div class="modal-content"
                        style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <!-- Corpo do modal -->
                        <div class="modal-body" style="font-size: 10px; color: whitesmoke;">
                            <div id="wrap">
                                <div class="container">
                                    <div class="row">
                                        <form class="form-horizontal" action="1027teste.php" method="post" 
                                            name="upload_excel" enctype="multipart/form-data">
                                            <fieldset>
                                                <!-- Form Name -->
                                                <legend>Import PLN1027R</legend>
                                                <!-- File Button -->
                                                <div class="form-group">
                                                    <label class="col-md-8 control-label" for="filebutton">Selecione o
                                                        Arquivo</label>
                                                    <div class="col-md-4">
                                                        <input type="file" name="file" id="file" class="input-large">
                                                    </div>

                                                </div>
                                                <!-- Button -->
                                                <div class="form-gr oup">
                                                    <label class="col-md-8 control-label" for="singlebutton">Itens Cancelados</label>
                                                    <div class="col-md-8">
                                                        <button type="submit" id="submit" name="Import"
                                                            class="btn btn-primary button-loading"
                                                            data-loading-text="Loading...">Import</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>
    <br>
    <div class="container" align="center" style="margin-top: 50px;">
    <div  class="border border-danger"
            style="background-color: white; color: black; width: 80%;  font-size: 14px; border-radius: 5px; min-height:500px">
            <h3>Lista de Cancelados</h3> 
            <?php if ($total > 0) : ?>
            <table style="background-color: white; color: black; width: 90%; font-size:12px; margin-top: 5px;">
                <thead>
                    <tr style=" border-top-style: groove;color: white;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; background: linear-gradient(to top,#004e92, #000428, #000000)">
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Cod</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Estação</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Endereço</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Descrição</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Qt Cancelada</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Estoque</th>
                         <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Motivo</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php while ($cancelados = $stmt_array_4->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                            <?php echo $cancelados['codigo'] ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cancelados['estacao'] ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cancelados['endereco'] ?></td>
                        <td
                            style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; font-size: 14px;">
                            <?php echo $cancelados['descricao'] ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php 
                            // sql_count para contar o total de registros
                            $sql_sum = "SELECT sum(cancelado) FROM pln1027 where produto = '$cancelados[codigo]' ";
                            // conta o toal de registros
                            $stmt_sum = $PDOC->prepare($sql_sum);
                            $stmt_sum->execute();
                            $soma = $stmt_sum->fetchColumn();                            
                            echo $soma ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cancelados['estoque'] ?></td>
                            <td
                            style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; font-size: groove;">
                            <?php echo $cancelados['motivo'] ?></td>
                       
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

    <br>
    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: whitesmoke">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By
            Thiago
            Cesar Napoleão</p>
    </footer>

</body>

</html>

