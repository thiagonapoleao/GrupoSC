<?php
require_once 'init.php';

// abre a conexão
$PDO = db_connect();
$PDOC = db_connect_conf();


// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDO->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

$data = $datacontabil;
$isoDate = dateConvert($data);

// sql_count para contar o total de registros
$sql_count = "SELECT count(data) FROM cancelados where data =  '05/01/2022'";
// conta o toal de registros
$stmt_count = $PDOC->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// SQL para selecionar os registros
$sql_arry = "SELECT id, estacao, endereco, motivo, estoque FROM cancelados where data =  '05/01/2022' ";
// seleciona os registros
$stmt_array = $PDOC->prepare($sql_arry);
$stmt_array->execute();

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
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
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
        </nav>
    </header>
    <div class="container" style="margin-top: 80px; color:blanchedalmond;  align-items: center">
        <div class="container">
            <form action="cpd/fechamento/add.php" method="post" class="needs-validation" id="formSearch" novalidate>
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer01">Data</label>
                            <input type="date" class="form-control" name="data" id="validationServer01"
                                value="<?php echo $isoDate ?>" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer02">Cod. Pfat</label>
                            <input type="number" class="form-control" name="codigo" id="codigo" autofocus
                                onblur="myFunction()" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer02">Motivo</label>
                            <input type="number" class="form-control" name="motivo" id="validationServer02" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer04">Est/End</label>
                            <input type="text" class="form-control" name="estacao" id="estacao" required>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                        <div class="col-sm-2 mb-3" style="margin-right: -20px;">
                            <label for="validationServer05">Estoque </label>
                            <input type="number" class="form-control" name="estoque" id="estoque" required>
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
    <div class="container" align="center" style="margin-top: -45px;">
        <div class="border border-danger"
            style="background-color: white; color: black; width: 80%; border-radius: 20px; font-size: 14px; min-height: 500px;">
            <?php if ($total > 0) : ?>
            <table width="70%" align="center" style="margin-top: 20px;">
                <thead>
                    <tr
                        style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            ID</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Estação</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Endereço</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Excluir</th>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($cancelados = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr
                        style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cancelados['id'] ?></td>
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cancelados['estacao'] ?></td>
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cancelados['endereco'] ?></td>
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <a href="delete.php?id=<?php echo $cancelados['id'] ?>"
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
        </div>
    </div>


    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: blanchedalmond;">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By Thiago
            Cesar Napoleão</p>
    </footer>

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
    document.getElementById("codigo").onblur = function() {
        myFunction()
    };

    $("#codigo").blur(function() {
        $.ajax({
            url: 'searca.php',
            type: 'post',
            dataType: 'json',
            data: {
                searchAdress: 1,
                codigo: $("#codigo").val()
            }
        }).done(function(data) {
            if (data) {
                $("#estacao").val(data.codigo);
            } else {
                alert("Codigo não cadastrado!");
                $("#estacao").val("");
            }
        }).fail(function(data) {
            console.log(data)
        })
    });


    $("#rota").blur(function() {
        $.ajax({
            url: 'search.php',
            type: 'post',
            dataType: 'json',
            data: {
                searchAdress: 1,
                rota: $("#rota").val()
            }
        }).done(function(data) {
            if (data) {
                $("#codmotorista").val(data.codigo);
            } else {
                alert("Codigo não cadastrado!");
                $("#codmotorista").val("");
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