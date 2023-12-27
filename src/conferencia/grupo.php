<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

$user_colaborador = $_SESSION['user'];
$nome_colaborador = $_SESSION['nome'];

// abre a conexão
$PDO = db_connect();

// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GI - Gestão Integrada</title>
    <link rel="stylesheet" type="text/css" href="../css/stilo.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width" scale="1">
    <!-- transforma a pagina em  responsivel-->
</head>

<body
style="background: linear-gradient(to top,#004e92, #000428, #000000); background-attachment: fixed; background-size: 100% 100%; ">

    <div class="container" id="cabecalho" style=" color: whitesmoke; width: 500px; margin-top: 10%; ">
        <div class="border border-primary" style="border-radius: 5mm;">
            <form action="consultagrupo.php" method="post">
                <div class="container" align="center" >
                    <div class="container">
                        <br>
                        <div class="col-md-5" style="text-align: center;">
                            <label>Informe o Grupo</label>
                            <input style="text-align: center;" class="form-control" type="text" name="grupo" id="grupo" placeholder="Grupo"
                                autofocus autocomplete="off" readonly
                                onfocus="this.removeAttribute('readonly');this.select();" required>
                        </div>                        
                        <br>
                        <div class="col-md-5 ">
                            <label for="validationServer02"></label>
                            <button type="submit" class="btn btn-primary">Continuar</button>
                        </div>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>

</body>

</html>