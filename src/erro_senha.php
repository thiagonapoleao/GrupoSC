<?php
require_once 'init.php';

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
    <title>Tratativa de Erros</title>
    <link rel="stylesheet" type="text/css" href="css/stilo.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width" scale="1">
    <!-- transforma a pagina em  responsivel-->
</head>

<body style="background-image:  url('./img/logo-zerar.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
    <div class="container" id="cabecalho" style="margin-top: 35px">
        <div class="container">
            <form action="inicial.php">
                <p style="font-size: 70px; font-style: oblique; color: red;">Usuário ou Senha Incorreto!</p>
                <div class="form-row">
                    <button type="submit" class="btn btn-primary">Voltar</button>
                </div>
            </form>
            <br>
            <br>
        </div>
    </div>
</body>

</html>