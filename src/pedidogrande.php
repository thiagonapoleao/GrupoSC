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

<body>
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
                    <a href="#" class="navbar-brand">GrupoSC</a>
                </div>
                <div id="collapse-navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="cpd.html">CPD</a></li>
                        <li><a href="conferencia.html">Conferencia</a></li>
                        <li><a href="pedidogrande.html">Pedido Grande</a></li>
                        <li><a href="indicadores.html">Indicadores</a></li>
                        <li><a href="cadastro.html">Cadastro de Usuarios</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <br>

    <footer id="rodape">
        <!-- tag <footer> roda pé da pagina>-->
        <p>Copyright &copy; 2020 - (SIG) Sistema Integrado de Gestão - Thiago Cesar Napoleão</p>
    </footer>

    <script src="jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>