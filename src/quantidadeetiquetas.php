<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once 'init.php';

// abre a conexão
$PDO = db_connect_eerg();

$pfat = isset($_POST['pfat']) ? $_POST['pfat'] : null;
$sap = isset($_POST['sap']) ? $_POST['sap'] : null;
$barra = isset($_POST['barra']) ? $_POST['barra'] : null;
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$excesso = isset($_POST['excesso']) ? $_POST['excesso'] : null;
$validade = isset($_POST['validade']) ? $_POST['validade'] : null;
$escrvalidade = isset($_POST['escrvalidade']) ? $_POST['escrvalidade'] : null;
$_SESSION['escrvalidade'] = $escrvalidade ;
$data = date("Y-m-d");

// sql_count para contar o total de registros
$sql_count = "SELECT SUM(codigo) FROM log_emissao_etq";
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();


// SQL para selecionar os registros
$sql_arry = "SELECT data, hora, codigo, descricao, validade FROM log_emissao_etq WHERE data = '$data' order by hora desc";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GI - Gestão Integrada</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width" scale="1">
    <!-- transforma a pagina em  responsivel-->
    <!-- Adicionando JQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
    <script>
    function cria_bat() {
        //Cria objeto para manipulacao de arquivos no cliente.
        var fso = new ActiveXObject("Scripting.FileSystemObject");
        if (!(fso.FileExists("c:\\imprime.bat"))) {
            //Cria o arquivo imprime.bat, escreve o comando responsavel pela impressao e fecha o arquivo.
            var b = fso.CreateTextFile("c:\\imprime.bat", true);
            b.WriteLine("type G:\\\\httpraiz\\\\nf\\\\<?=$arquivo;?> > LPT1");
            b.Close();
        }
    }

    function imprime() {
        //Cria um objeto para execucao de um programa no computador do cliente.
        var WshShell = new ActiveXObject("WScript.Shell");
        //Executa o arquivo responsavel pela impressao do arquivo imprime.prn.
        var oExec = WshShell.Exec("c:\\imprime.bat");
    }
    </script>
</head>

<body
style="background: linear-gradient(to top,#004e92, #000428, #000000); background-attachment: fixed; background-size: 100% 100%; ">

    <header>
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light" style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">  
            <a class="navbar-brand" href="inicial.php">GrupoSC</a>
            <div id="collapse-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CPD
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                            Conferencia
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Analise da Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Atualiza Produção</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Metas por Grupo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="analiseconferencia.php">Painel da Produtividade</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Produção da Auditoria</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Produção da Conferencia</a>
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

                </ul>
            </div>
            </div>
        </nav>
        <br>
        <div class="container" style="margin-top: 40px; ">
            <div class="container">
                <h4 style="color: red;" align="center"> Emissão de Etiquetas de Recebimento </h4>
            </div>
            <br>
            <form action="recebimento/imprimi.php" method="post" class="needs-validation" id="formSearch" novalidate>
                <div class="col-auto"
                    style="align-items: center;display: flex;flex-direction: row;justify-content: center;">
                    <div class="col-md-6 mb-3" style="margin-top: -20px;">
                        <label align="center"
                            style="align-items: center;display: flex;flex-direction: row;justify-content: center;">Escreva
                            a Quantidade de Etiquetas</label>
                        <input style="text-align: center;" type="number" class="form-control" name="escrquantidade"
                            id="escrquantidade" autofocus required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary" id="btnimprimir">Consulta</button>
                    </div>
                </div>
                <div class="container"
                    style="align-items: center;display: flex;flex-direction: row;justify-content: center;">
                    <div class="col-md-2 mb-3">
                        <label>Código PFAT</label>
                        <input type="text" class="form-control" name="pfat" id="pfat" value="<?php echo $pfat ?>">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Código SAP</label>
                        <input type="number" class="form-control" name="sap" id="sap" value="<?php echo $sap ?>">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Código de Barras</label>
                        <input type="text" class="form-control" name="barra" id="barra" value="<?php echo $barra ?>">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Endereço</label>
                        <input type="text" class="form-control" name="endereco" id="endereco"
                            value="<?php echo $endereco ?>">
                    </div>
                </div>
                <div class="container"
                    style="align-items: center;display: flex;flex-direction: row;justify-content: center;">
                    <div class="col-md-4 mb-3">
                        <label>Descrição Produto</label>
                        <input type="text" class="form-control" name="descricao" id="descricao"
                            value="<?php echo $descricao ?>">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Quant. de Excessos</label>
                        <input type="text" class="form-control" name="excesso" id="excesso"
                            value="<?php echo $excesso ?>">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Validade da vez</label>
                        <input type="text" class="form-control" name="validade" id="validade"
                            value="<?php echo $validade ?>">

                    </div>
                </div>
            </form>

        </div>
        <script>
        cria_bat();
        imprime();
        </script>
        <br>
        <div class="container" align="center" style="margin-top: -25px;">
            <div class="border border-danger"
                style="background-color: white; color: black; width: 80%; border-radius: 20px; font-size: 12px; min-height: 500px;">
                <div class="container" id="div">
                    <?php if ($total > 0) : ?>
                    <br>
                    <table align="center" id="tbl" width="100%">
                        <thead>
                            <tr>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Código</th>
                                <th
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Descrição</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Validade</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Data Emissão</th>
                                <th align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($recebimento = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $recebimento['codigo'] ?>
                                </td>
                                <td
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $recebimento['descricao'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $recebimento['validade'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $recebimento['data'] ?>
                                </td>
                                <td align="center"
                                    style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                    <?php echo $recebimento['hora'] ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                    <p>Nenhum registro na <?php echo $data ?></p>
                    <?php endif; ?>
                </div>
                <br>
            </div>
        </div>
        <br>

    </header>
    <br>
    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: whitesmoke">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By
            Thiago
            Cesar Napoleão</p>
    </footer>
    <script type="text/javascript" src="Bytescoutbarcode128_1.00.07.js"></script>
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

    $(document).ready(function() {
        $('#btnimprimir').click(function() {
            $.ajax({
                url: 'recebimento/imprimir.php',
                type: 'POST',
                success: function(response) {
                    if (response == 1) {
                        alert('Imprimindo!....');
                    } else {
                        alert('Error');
                    }
                }
            });
        });
    });

    function updateBarcode(barCodeValue) {
        barCodeValue = typeof barCodeValue !== 'undefined' ? barCodeValue : '1234567890';
        var barcode = new bytescoutbarcode128();
        barcode.valueSet(barCodeValue);
        barcode.setMargins(5, 5, 5, 5);
        barcode.setBarWidth(2);
        var width = barcode.getMinWidth();
        barcode.setSize(width, 100);
        var barcodeImage = $('#barcodeImage');
        barcodeImage.attr('src', barcode.exportToBase64(width, 100, 0));
    }
    </script>
</body>

</html>