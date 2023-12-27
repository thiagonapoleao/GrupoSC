<?php
require_once '../init.php';

// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}


// abre a conexão
$PDO = db_connect_tratativa();

// busca os dados do usuário a ser editado
$sql = "SELECT  codigo, nome FROM separadores WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user)) {
    echo "Nenhum usuário encontrado";
    exit;
}

// sql_count para contar o total de registros
$sql_count = "SELECT count(codigo) FROM separadores";
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// SQL para selecionar os registros
$sql_arry = "SELECT id, codigo, nome FROM separadores GROUP BY codigo asc ";
// seleciona os registros
$stmt_array = $PDO->prepare($sql_arry);
$stmt_array->execute();


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
</head>

<body
style="background: linear-gradient(to top,#004e92, #000428, #000000); background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- mais semantico, inverso footer -->
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light" style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">  
            <a class="navbar-brand" href="../inicial.php">GrupoSC</a>
            <div id="collapse-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            <a class="dropdown-item" href="../produtividade/analiseconferencia.php">Painel da
                                Produtividade</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../produtividade/analiseconferenciadata.php">Produtividade
                                por Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="../produtividade/analiseconferenciaindividual.php">Produtividade por
                                Conferente</a>
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
                            <a class="dropdown-item" href="../tratativa.php">Tratativa de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../tratativa/from-listaerros.php">Lista de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../upm/from-grafico.php">Grafico</a>
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
            <div class="modal fade" id="listaErrosModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Insira a senha para acesso a Lista de Erros
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../acesso_lista.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Matricula:</label>
                                    <input type="text" name="user" id="user" style="width: 200px;"
                                        class="form-control is-valid" placeholder="Matrícula" autofocus
                                        autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');this.select();">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Senha:</label>
                                    <input type="password" name="password" id="password" style="width: 280px;"
                                        class="form-control is-valid" placeholder="Senha" autofocus autocomplete="off"
                                        readonly onfocus="this.removeAttribute('readonly');this.select();">
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
    <div class="container" id="interface"
    style="background-image:  url('../img/TelanovaGrupoSC.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;  margin-top: 80px;">
        <div class="container">
            <form action="edit.php" method="post" class="needs-validation" novalidate>
                <div align="center">
                    <div class="form-row">
                        <div class="col-sm-2 mb-1">
                            <label for="validationServer01">Codigo</label>
                            <input type="number" name="codigo" id="codigo" value="<?php echo $user['codigo'] ?>"
                                class="form-control">
                        </div>
                        <div class="col-sm-8 mb-1">
                            <label for="validationServer02">Nome</label>
                            <input type="text" name="nome" id="nome" value="<?php echo $user['nome'] ?>"
                                class="form-control">
                        </div>
                        <div class="col-sm-2 mb-5">
                            <br>
                            <button type="submit" id="submit" name="Import" class="btn btn-primary"
                                style="height: 50px">Cadastrar</button>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <from>
            <p>Total de Separadores: <?php echo $total ?></p>

            <?php if ($total > 0) : ?>

            <table width="70%" align="center" style="color: white">
                <thead>
                    <tr
                        style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            ID</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Codigo</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Nome</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Edit</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Excluir</th>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($cadastro = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr
                        style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cadastro['id'] ?></td>
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cadastro['codigo'] ?></td>
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cadastro['nome'] ?></td>
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <a href="form-edit.php?id=<?php echo $cadastro['id'] ?>"><svg class="bi bi-pencil"
                                    width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z"
                                        clip-rule="evenodd" />
                                </svg></a>
                        </td>
                        <td
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <a href="delete.php?id=<?php echo $cadastro['id'] ?>"
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
            </form>
    </div>

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