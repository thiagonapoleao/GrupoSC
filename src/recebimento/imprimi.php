<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

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
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
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
</head>

<body>
    <header>
        <br>
        <div id="areaDeImpressao" class="col-auto"
            style="align-items: center;display: flex;flex-direction: row;justify-content: center; margin-top: 40px;">
            <div class="border border-danger"
                style="background-color: yellow; color: white; width: 50%; max-height: 20%; border-radius: 20px; font-size: 18px;">
                <button type="button" onclick="window.print()" value="Imprimir">Imprimir</button>
                <h4 style="color: red;" align="center"> Emissão de Etiquetas de Recebimento </h4>
                <div style="background-color: black;">
                    <p align="center">
                        <b>Código PFAT : <?php echo $pfat ?>
                    </p>
                    <p align="center">
                        <b>Endereço: <?php echo $endereco ?>
                    </p>
                    <p align="center">
                        <b>Descrição Produto: <?php echo $descricao ?>
                    </p>
                </div>


            </div>
    </header>

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
    </script>
</body>

</html>