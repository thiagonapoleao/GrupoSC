<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

// abre a conexão
$PDO = db_connect();
$PDOC = db_connect_conf();
$PDOE = db_connect_eerg();

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDO->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

$data = $datacontabil;
$isoDate = dateConvert($data);

// SQL para selecionar os registros
$sql_arry_4 = "SELECT data, estacao, endereco, motivo, estoque, descricao, cancelado, codigo FROM cancelados GROUP BY codigo order by estacao asc";
// seleciona os registros
$stmt_array_4 = $PDOC->prepare($sql_arry_4);
$stmt_array_4->execute();

// sql_count para contar o total de registros
$sql_count_itens = "SELECT count(DISTINCT produto) FROM pln1027 ";
// conta o toal de registros
$stmt_count_itens = $PDOC->prepare($sql_count_itens);
$stmt_count_itens->execute();
$total_itens = $stmt_count_itens->fetchColumn();

// sql_count para contar o total de registros
$sql_sum_itens = "SELECT sum(cancelado) FROM pln1027";
// conta o toal de registros
$stmt_sum_itens = $PDOC->prepare($sql_sum_itens);
$stmt_sum_itens->execute();
$soma_itens = $stmt_sum_itens->fetchColumn();


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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
    function trocaCor(id) {
        var cor = document.getElementById(id).style.background
        if (cor == '#0000FF') cor = '#FF0000';
        else cor = '#0000FF';
        document.getElementById(id).style.background = cor;
    }
    </script>
</head>

<body
    style="background: linear-gradient(to top,#004e92, #000428, #000000); background-attachment: fixed; background-size: 100% 100%; ">
    <header>
        <!-- mais semantico, inverso footer -->
        <!-- MENU -->
        <nav class="navbar fixed-top navbar-expand navbar-light"
            style="background: linear-gradient(to bottom,  #00c6ff, #0072ff)">
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
                            Cancelamento
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="cancelar.php">Cancelar Itens</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="estacao.php">Lista de Cancelados</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Conferencia
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Analiose da Auditoria</a>
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
                            Pedido Grande
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../produtividade/analisepedidao.php">Painel da
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
                            <a class="dropdown-item" href="../tratativa.php">Tratativa de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../tratativa/from-listaerros.php">Lista de Erros</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../upm/from-grafico.php">Grafico</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cadastro.php">Cadastro</a>
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
                            <a class="dropdown-item" href="grandesredes/import.php">Importar Arquivo</a>
                        </div>
                    </li>

                </ul>
            </div>
            </div>
        </nav>
    </header>    
    <br>
    <div class="container" align="center" style="margin-top: 60px;">
    <div  class="border border-danger"
            style="background-color: white; color: black; width: 80%;  font-size: 14px; border-radius: 5px; min-height:500px">
            <h3>Lista de Cancelados</h3>
            <form class="btn btn-primary btn-sm" style="font-size: 10px;" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="post">
                <input  type="file" name="arquivo" id="arquivo">
                <input  type="submit" name="enviar" value="Enviar">
            </form> 
             <br>  
            <p style="text-align:left;  width: 90%">Total de Itens Cancelados: <?php echo $total_itens ?>  
            <p style="text-align:left;  width: 90%">Soma dos Itens Cancelados: <?php echo $soma_itens ?>       
            <table style="background-color: white; color: black; width: 90%; font-size:12px; margin-top: 5px;">
                <thead>
                     <tr style=" border-top-style: groove;color: white;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; background: linear-gradient(to top,#004e92, #000428, #000000)">
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Cod</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Estação</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Endereço</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Descrição</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Qt Cancelada</th>
                        <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Estoque</th>
                         <th
                            style="border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            Motivo</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php while ($cancelados = $stmt_array_4->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; ">
                            <?php echo $cancelados['codigo'] ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cancelados['estacao'] ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cancelados['endereco'] ?></td>
                        <td
                            style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; font-size: 14px;">
                            <?php echo $cancelados['descricao'] ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php 
                            // sql_count para contar o total de registros
                            $sql_sum = "SELECT sum(cancelado) FROM pln1027 where produto = '$cancelados[codigo]'";
                            // conta o toal de registros
                            $stmt_sum = $PDOC->prepare($sql_sum);
                            $stmt_sum->execute();
                            $soma = $stmt_sum->fetchColumn();                            
                            echo $soma ?></td>
                        <td
                            style="text-align: center; border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove;">
                            <?php echo $cancelados['estoque'] ?></td>
                            <td
                            style=" border-top-style: groove;border-left-style: groove;border-right-style: groove;border-bottom-style: groove; font-size: groove;">
                            <?php echo $cancelados['motivo'] ?></td>
                       
                    </tr>
                    <?php endwhile; ?>
                </tbody>          
            </table>           
            <br>
        </div>      
    </div>
    <br>

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
    document.getElementById("pfat").onblur = function() {
        myFunction()
    };

    $("#pfat").blur(function() {
        $.ajax({
            url: '../searca.php',
            type: 'post',
            dataType: 'json',
            data: {
                searchAdress: 1,
                pfat: $("#pfat").val()
            }
        }).done(function(data) {
            if (data) {
                $("#estacao").val(data.endereco);
                $("#estoque").val(data.est);
                $("#descricao").val(data.descricao);
            } else {
                // alert("Codigo não cadastrado!");
                $("#estacao").val("S/Cadastro");
                $("#estoque").val("S/Cadastro");
                $("#descricao").val("S/Cadastro");
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


    <br>
    <footer style=" text-align-last: center; margin-top: -20px;">
        <!-- tag <footer> roda pé da pagina>-->
        <p style="color: whitesmoke">Copyright &copy; 2021 - (GI) Gestão Integrada - Developed By
            Thiago
            Cesar Napoleão</p>
    </footer>

</body>

</html>

<?php  

    function Inserir($itens, Pdo $pdo){
        $sts = $pdo->prepare("INSERT INTO pln1027(data, produto, descricao, cancelado, cliente, motivo) VALUES(?,?,?,?,?,?);");
        $sts->bindValue(1, $itens[0], PDO::PARAM_STR);
        $sts->bindValue(2, $itens[1], PDO::PARAM_STR);
        $sts->bindValue(3, $itens[2], PDO::PARAM_STR);
        $sts->bindValue(4, $itens[3], PDO::PARAM_STR);
        $sts->bindValue(5, $itens[4], PDO::PARAM_STR);
        $sts->bindValue(6, $itens[5], PDO::PARAM_STR);
        $sts->execute();
        $sts->closeCursor();
        $sts = NULL;
    }
    if (!empty($_FILES['arquivo']))
    {                
        // SQL para selecionar os registros
        $sql_1027r_del = "TRUNCATE TABLE pln1027 ";
        // seleciona os registros
        $stmt_1027r_del = $PDOC->prepare($sql_1027r_del);
        $stmt_1027r_del->execute();

        $file = fopen($_FILES['arquivo']['tmp_name'], 'r');
        while (!feof($file)){
            $linha = fgets($file);      
            $itens = array(trim(substr($linha, 0, 8)), trim(substr($linha, 33, 39)),trim(substr($linha, 40, 32)), trim(substr($linha, 85, 88)), trim(substr($linha, 96, 7)),  trim(substr($linha, 162, 27)));
            Inserir($itens, $PDOC);
        }
        // SQL para selecionar os registros
        $sql_delete = "delete from pln1027 where produto = 0 ";
        // seleciona os registros
        $stmt_delete = $PDOC->prepare($sql_delete);
        $stmt_delete->execute();          

        // SQL para selecionar os registros
        $sql_delete = "delete from pln1027 where cliente = '' ";
        // seleciona os registros
        $stmt_delete = $PDOC->prepare($sql_delete);
        $stmt_delete->execute();  
        
        // SQL para selecionar os registros
        $sql_delete_vencido = "delete from pln1027 WHERE motivo  LIKE '%Produto Vencido%' ";
        // seleciona os registros
        $stmt_delete_vencido = $PDOC->prepare($sql_delete_vencido);
        $stmt_delete_vencido->execute();  

        // SQL para selecionar os registros
        $sql_delete_cpd = "delete from pln1027 WHERE motivo  LIKE '%Cancelamento comercial, Ca' ";
        // seleciona os registros
        $stmt_delete_cpd = $PDOC->prepare($sql_delete_cpd);
        $stmt_delete_cpd->execute();  
          
        // 766
        $sql_delete_w15542 = "delete from pln1027 where cliente = 'W15542' ";
        // seleciona os registros
        $stmt_delete_w15542 = $PDOC->prepare($sql_delete_w15542);
        $stmt_delete_w15542->execute();        

        // 743
        $sql_delete_v09047 = "delete from pln1027 where cliente = 'V09047' ";
        // seleciona os registros
        $stmt_delete_v09047 = $PDOC->prepare($sql_delete_v09047);
        $stmt_delete_v09047->execute();   
        
         // 790
         $sql_delete_V08833 = "delete from pln1027 where cliente = 'V08833' ";
         // seleciona os registros
         $stmt_delete_V08833 = $PDOC->prepare($sql_delete_V08833);
         $stmt_delete_V08833->execute();  

          // 762
          $sql_delete_W56868 = "delete from pln1027 where cliente = 'W56868' ";
          // seleciona os registros
          $stmt_delete_W56868 = $PDOC->prepare($sql_delete_W56868);
          $stmt_delete_W56868->execute();  

          // 755
          $sql_delete_I00707 = "delete from pln1027 where cliente = 'I00707' ";
          // seleciona os registros
          $stmt_delete_I00707 = $PDOC->prepare($sql_delete_I00707);
          $stmt_delete_I00707->execute(); 
            
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addcancelados.php\"
        </script>";
       

    }   
?>