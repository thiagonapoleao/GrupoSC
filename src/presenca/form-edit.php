<?php
require_once '../init.php';

// abre a conexão
$PDOP = db_connect_prsc();
$PDO = db_connect();

// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}

// busca os dados do usuário a ser editado
$sql = "SELECT id, data, colaborador, setor, motivo, obs, justificativa FROM faltas where id = :id";
$stmt = $PDOP->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user)) {
    echo "Nenhum usuário encontrado";
    exit;
}
// sql_count para contar o total de registros
$sql_id = "SELECT data FROM faltas where id = $id";
// conta o toal de registros
$stmt_id = $PDOP->prepare($sql_id);
$stmt_id->execute();
$idbanco = $stmt_id->fetchColumn();

$datalista = isset($_POST['datalista']) ? $_POST['datalista'] : null;
$isoDate = dateConvert($user['data']);
// SQL para selecionar os registros
$sql_arry = "SELECT id, colaborador, setor, motivo, obs, justificativa  FROM faltas where data = '$idbanco' order by motivo asc, setor asc, colaborador asc";
// seleciona os registros
$stmt_array = $PDOP->prepare($sql_arry);
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
                            Presença
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="resumopresenca.php">Resumo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../presenca.php">Lançar Ausências</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="listapresenca.php">Consulta por
                                Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="listapresencanome.php">Consulta por
                                Nome</a>
                        </div>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <div>
            <!-- Modal -->
            <div class="modal fade" id="listapresenca" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"
                        style="background-image: url('../img/logo.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; color: blanchedalmond;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke;">Insira a Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="listapresenca.php" method="post">
                                <div class="form-group">
                                    <label for="validationServer01" class="col-form-label"
                                        style="color: whitesmoke;">Data:</label>
                                    <input type="date" name="datalista" id="datalista" style="width: 200px;"
                                        class="form-control is-valid" autofocus autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');this.select();">
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
        <br>
        <div class="container" style=" margin-top: 50px; width: 80%; color: whitesmoke; ">
            <form action="edit.php" method="post" class="needs-validation" id="formSearch" novalidate>
                <div class="form-row">
                    <div class="col-md-2 mb-3" style="font-size: 12px; ">
                        <label for="validationServer01">Data</label>
                        <input style="font-size: 12px; " type="date" class="form-control" name="data"
                            id="validationServer01" value="<?php echo $user['data'] ?>" required>
                        <div class="valid-feedback">
                            .
                        </div>
                    </div>
                    <div class="col-md-2 mb-2" style="font-size: 12px; ">
                        <div class="frmSearch" style="font-size: 12px; ">
                            <label for="validationServer01">Colaborador</label>
                            <input type="text" id="search-box" class="form-control" name="colaborador"
                                style="font-size: 12px; text-transform: uppercase;"
                                value="<?php echo $user['colaborador'] ?>" autocomplete="off" placeholder="Nome" />
                            <div id="suggesstion-box"></div>
                            <div class="valid-feedback">
                                .
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3" style="font-size: 12px; ">
                        <label for="validationServer03">Motivo</label>
                        <input type="text" id="search-box" class="form-control" name="motivo"
                            style="font-size: 12px; text-transform: uppercase;" value="<?php echo $user['motivo'] ?>"
                            autocomplete="off" placeholder="Nome" />
                        <div class="valid-feedback">
                            .
                        </div>
                    </div>
                    <div class="col-md-2 mb-3" style="font-size: 12px; ">
                        <label for="validationServer04">Obs</label>
                        <input style="font-size: 12px; " type="text" class="form-control" name="obs"
                            id="validationServer04" value="<?php echo $user['obs'] ?>" autocomplete="off" required>
                        <div class="valid-feedback">
                            .
                        </div>
                    </div>
                    <div class="col-md-3 mb-3" style="font-size: 12px; ">
                        <label for="validationServer05">Justificativa</label>
                        <input style="font-size: 12px; " type="text" class="form-control" name="justificativa"
                            id="justificativa" autocomplete="off" required>
                        <div class="valid-feedback">
                            .
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" id="submit" name="Import" class="btn btn-primary"
                            style="font-size: 12px; margin-top: 26px;">Salvar</button>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div class="container" align="center" style="min-height: 500px;">
            <div class="border border-danger"
                style="background-color: white; color: black; width: 90%; border-radius: 20px; font-size: 10px; min-height: 400px; margin-top: -30px;">
                <h4>Ausências referente ao dia <?php echo $isoDate ?> </h4>
                <table width="90%" align="center" style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Colaborador</th>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Setor</th>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                motivo</th>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Observação</th>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Justificativa</th>
                            <th
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($presenca = $stmt_array->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['colaborador'] ?></td>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['setor'] ?></td>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['motivo'] ?></td>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['obs'] ?></td>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <?php echo $presenca['justificativa'] ?></td>
                            <td
                                style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                                <a href="form-edit.php?id=<?php echo $presenca['id'] ?>"><svg class="bi bi-pencil"
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
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
    </header>

    <br>

    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: blanchedalmond; ">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By Thiago
            Cesar Napoleão</p>
    </footer>

</body>

</html>