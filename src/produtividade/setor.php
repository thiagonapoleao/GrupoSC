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
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width" scale="1">
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
   
</head>

<body
    style="background-image:  url('../img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">

    <div class="container" id="cabecalho" style=" color: whitesmoke; width: 500px; margin-top: 1%; ">
        <div class="border border-primary" style="border-radius: 5mm;">
            <form action="acessosetor.php" method="post">
                <div class="container" align="center">
                    <div class="container"> 
                        <br>
                        <div class="col-md-8" style="text-align: center;">
                            <label>Informe o Numero do Setor</label>
                            <p>1 - Conferencia </p>
                            <p>2 - Pedido Grande </p>
                            <p>3 - Auditoria </p>
                            <input style="text-align: center;" class="form-control" type="text" name="setor" id="setor"
                                placeholder="Setor" autofocus autocomplete="off" readonly
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