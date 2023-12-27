<?php
require_once 'init.php';

// abre a conexão
$PDO = db_connect();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GrupoSC</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width" scale="1">
    <!-- transforma a pagina em  responsivel-->

</head>

<body style="background: linear-gradient(to top,#004e92, #000428, #000000); background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- mais semantico, inverso footer -->
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light" style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">  
            <img class="img-responsive">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-navbar" aria-expanded="false">
                        <!--  arial-expanded="false" siginifica não expandir -->
                        <span class="sr-only">Toggle navigation</span>
                        <!-- tracinhos -->
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="inicial.php" class="navbar-brand">GrupoSC</a>
                </div>
                <div id="collapse-navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CPD
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Comprovei</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Demonstrativo</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="fechamento.php">Fechamento de Rotas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Placas de Veiculos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Termino de Impresão</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Conferencia
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Analiose da Auditoria</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Atualiza Produção</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Metas por Grupo</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Painel da Produtividade</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Produção da Auditoria</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Produção da Conferencia</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Tratativa de Erros</a>
                            </div>
                        </li>
                        <li><a href="pedidogrande.html">Pedido Grande</a></li>
                        <li><a href="indicadores.html">Indicadores</a></li>
                        <li><a href="cadastro.html">Cadastro de Usuarios</a></li>
                        <li><a href="datacontabil.php">Fechamento</a></li>

                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <div class="container">
        <!-- Button trigger modal -->
        <button style="margin-top: 150px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>

    <footer id="rodape">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: black;">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By Thiago Cesar Napoleão</p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>

</html>