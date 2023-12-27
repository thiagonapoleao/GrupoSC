<?php
require_once '../init.php';

// abre a conexão
$PDO = db_connect_tratativa();
$PDOD = db_connect();


$codigo = isset($_POST['codigos']) ? $_POST['codigos'] : null;
$data = isset($_POST['data']) ? $_POST['data'] : null;

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

$isoDate = dateConvert($datacontabil);
$convDate = dateConvert($datacontabil);




// sql_count para contar o total de registros
$sql_count = "SELECT SUM(erro) FROM hist0040 where cod = $codigo";
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// SQL para selecionar os registros
$sql_arry = "SELECT data, cod, nome, SUM(erro) total, SUM(case when motivo='1- Falta' then erro end) falta, SUM(case when motivo='2- Sobra' then erro end) sobra,  SUM(case when motivo='3- Troca' then erro end) troca,  SUM(case when motivo='4- Erro Conf' then erro end) conf FROM hist0040 where cod = $codigo and data = '$data' order by total DESC";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();

// SQL para selecionar os registros
$sql_arry_data = "SELECT nome, descricao, erro, motivo, rota, estacao FROM hist0040 where cod = $codigo and data = '$data' order by erro DESC";
// seleciona os registros
$stmt_array_data  = $PDO->prepare($sql_arry_data);
$stmt_array_data->execute();

// SQL para selecionar os registros
$sql_arry_nome = "SELECT nome FROM hist0040 where cod = $codigo ";
// seleciona os registros
$stmt_array_nome  = $PDO->prepare($sql_arry_nome);
$stmt_array_nome->execute();
$nome = $stmt_array_nome->fetchColumn();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GI - Gestão Integrada</title>
    <link rel="stylesheet" type="text/css" href="..stilo.css">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width" scale="1">
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <!-- Adicionando JQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
</head>

<body style="background-image:  url('../img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- mais semantico, inverso footer -->
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light" style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">
            <a class="navbar-brand" href="../inicial.php">GrupoSC</a>
            <div id="collapse-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CPD
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../demonstrativo.php">Demonstrativo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../fechamento.php">Fechamento de Rotas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../transportadoras.php">Placas de Veiculos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../impressaolaser.php">Termino de Impresão</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cancelamento
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../cancelamento/cancelar.php">Cancelar Itens</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../cancelamento/estacao.php">Lista de Cancelados</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Conferencia
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Analise da Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Atualiza Produção</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Metas por Grupo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../produtividade/analiseconferencia.php">Painel da
                                Produtividade</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="../produtividade/analiseconferenciadata.php">Produtividade
                                por Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../produtividade/analiseconferenciaindividual.php">Produtividade por
                                Conferente</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Produção da Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Produção da Conferencia</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pedido Grande
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../produtividade/analisepedidao.php">Painel da
                                Produtividade </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="">Produtividade
                                por Conferente</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tratativa
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../tratativa.php">Tratativa de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="from-listaerros.php">Lista de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#listaIndivdata" href="">Lista Data-Separador</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#listaIndivModal" href="">Lista
                                individual</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../upm/from-grafico.php">Grafico</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../cadastro/cadastro.php">Cadastro</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Grandes Redes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../grandesredes.php">Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../grandesredes/import.php">Importar Arquivo</a>
                        </div>
                    </li>

                </ul>
            </div>
            </div>
        </nav>
        <div>
            <!-- Modal -->
            <div class="modal fade" id="listaIndivModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Insira o Codígo da
                                Sepradora</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="from-lista-individual.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: whitesmoke;">Cogído:</label>
                                    <input type="text" name="codigos" id="codigos" style="width: 200px;" class="form-control is-valid" placeholder="Codigo Separdor" autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
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
        <div>
            <!-- Modal -->
            <div class="modal fade" id="listaIndivdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background:  #004e92; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Insira a Dta e o Codígo da
                                Sepradora</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="from-lista-data.php" method="post">
                                <div class="form-group" style="color: whitesmoke;">
                                    <label for="recipient-name" class="col-form-label">Data:</label>
                                    <input type="date" name="data" id="data" style="width: 200px;" value="<?php echo $convDate ?>" class="form-control" placeholder="Matrícula" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: whitesmoke;">Cogído:</label>
                                    <input type="text" name="codigos" id="codigos" style="width: 200px;" class="form-control is-valid" placeholder="Codigo Separador" autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
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
        <div>
            <!-- Modal -->
            <div class="modal fade" id="zerarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Esse processo vai zerar os dados! Você
                                tem certeza?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../acesso_zerando.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Matricula:</label>
                                    <input type="text" name="user" id="user" style="width: 200px;" class="form-control is-valid" placeholder="Matrícula" autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Senha:</label>
                                    <input type="password" name="password" id="password" style="width: 280px;" class="form-control is-valid" placeholder="Senha" autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.select();">
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
    </header>
    <div class="container" align="center" style="min-height: 500px;">
        <div class="border border-danger" style="background-color: white; color: black; width: 70%; border-radius: 20px; margin-top: 80px; font-size: 12px;">
            <from>             
                <h4> Separador: <?php echo $nome ?></h4>
                <h5>Total de erros no mês: <?php echo $total ?></h5>
                <?php if ($total > 0) : ?>
                    <table width="90%" align="center">
                        <thead>
                            <tr style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <th align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Data</th>
                                <th align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Codigo</th>
                                <th style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Separador</th>
                                <th align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Falta</th>
                                <th align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Sobra</th>
                                <th align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Troca</th>
                                <th align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Err-Conf</th>
                                <th align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($erros = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros['data'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros['cod'] ?></td>
                                    <td style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros['nome'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros['falta'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros['sobra'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros['troca'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros['conf'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $erros['total'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>Nenhum usuário registrado</p>
                <?php endif; ?>
                </form>
                <br>
        </div>
        <div class="container" align="center" style="min-height: 500px;">
            <div class="border border-danger" style="background-color: white; color: black; width: 70%; border-radius: 20px; margin-top: 20px; font-size: 12px;">
                <from>
                <h4 align="center">Erros Detalhados</h4>
                    <table width="90%" align="center">
                        <thead>
                            <tr style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <th style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Descição</th>
                                <th align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Qt de Erros</th>
                                <th align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Tipo de erro</th>
                                <th align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Rota</th>
                                <th align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Estação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($errosdata = $stmt_array_data->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $errosdata['descricao'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $errosdata['erro'] ?></td>
                                    <td style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $errosdata['motivo'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $errosdata['rota'] ?></td>
                                    <td align="center" style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                        <?php echo $errosdata['estacao'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </form>
                    <br>
            </div>
        </div>
    </div>
    <br>
    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: blanchedalmond;">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By Thiago
            Cesar Napoleão</p>
    </footer>
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