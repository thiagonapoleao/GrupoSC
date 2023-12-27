<?php
require_once '../init.php';

$PDO = db_connect_conf();
$PDOD = db_connect();

// SQL para selecionar os registros
$sql_arry_0096_hora = "SELECT id, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total FROM pln0096r1 where nome = 'NOME' ";
// seleciona os registros
$stmt_array_0096_hora = $PDO->prepare($sql_arry_0096_hora);
$stmt_array_0096_hora->execute();

// SQL para selecionar os registros
$sql_arry_0096_linha = "SELECT id, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total FROM pln0096r1 where nome = 'LEITURA NO INICIO DA LINHA' ";
// seleciona os registros
$stmt_array_0096_linha = $PDO->prepare($sql_arry_0096_linha);
$stmt_array_0096_linha->execute();

// SQL para selecionar os registros
$sql_arry_0096_conf = "SELECT id, codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total FROM pln0096r1 where nome = 'CONFERENCIA / PICK-CONFIRME' ";
// seleciona os registros
$stmt_array_0096_conf = $PDO->prepare($sql_arry_0096_conf);
$stmt_array_0096_conf->execute();

echo 'add 0096';
while ($analise0096h = $stmt_array_0096_hora->fetch(PDO::FETCH_ASSOC)) :
    while ($analise0096l = $stmt_array_0096_linha->fetch(PDO::FETCH_ASSOC)) :
        while ($analise0096c = $stmt_array_0096_conf->fetch(PDO::FETCH_ASSOC)) :
            $sqldel = "DELETE FROM pln0096rproducao";
            $stmtdel = $PDO->prepare($sqldel);
            $stmtdel->execute();
            $sqlh1 = "INSERT INTO pln0096rproducao (hora, linha, conferencia) VALUES(:hora, :linha, :conferencia)";
            $stmth1 = $PDO->prepare($sqlh1);
            $stmth1->bindParam(':hora',  str_replace('.', '', $analise0096h['h1']));
            $stmth1->bindParam(':linha', str_replace('.', '', $analise0096l['h1']));
            $stmth1->bindParam(':conferencia', str_replace('.', '', $analise0096c['h1']));
            $stmth1->execute();
            $sqlh2 = "INSERT INTO pln0096rproducao (hora, linha, conferencia) VALUES(:hora, :linha, :conferencia)";
            $stmth2 = $PDO->prepare($sqlh2);
            $stmth2->bindParam(':hora', str_replace('.', '', $analise0096h['h2']));
            $stmth2->bindParam(':linha', str_replace('.', '', $analise0096l['h2']));
            $stmth2->bindParam(':conferencia', str_replace('.', '', $analise0096c['h2']));
            $stmth2->execute();
            $sqlh3 = "INSERT INTO pln0096rproducao (hora, linha, conferencia) VALUES(:hora, :linha, :conferencia)";
            $stmth3 = $PDO->prepare($sqlh3);
            $stmth3->bindParam(':hora', str_replace('.', '', $analise0096h['h3']));
            $stmth3->bindParam(':linha', str_replace('.', '', $analise0096l['h3']));
            $stmth3->bindParam(':conferencia', str_replace('.', '', $analise0096c['h3']));
            $stmth3->execute();
            $sqlh4 = "INSERT INTO pln0096rproducao (hora, linha, conferencia) VALUES(:hora, :linha, :conferencia)";
            $stmth4 = $PDO->prepare($sqlh4);
            $stmth4->bindParam(':hora', str_replace('.', '', $analise0096h['h4']));
            $stmth4->bindParam(':linha', str_replace('.', '', $analise0096l['h4']));
            $stmth4->bindParam(':conferencia', str_replace('.', '', $analise0096c['h4']));
            $stmth4->execute();
            $sqlh5 = "INSERT INTO pln0096rproducao (hora, linha, conferencia) VALUES(:hora, :linha, :conferencia)";
            $stmth5 = $PDO->prepare($sqlh5);
            $stmth5->bindParam(':hora', str_replace('.', '', $analise0096h['h5']));
            $stmth5->bindParam(':linha', str_replace('.', '', $analise0096l['h5']));
            $stmth5->bindParam(':conferencia', str_replace('.', '', $analise0096c['h5']));
            $stmth5->execute();
            $sqlh6 = "INSERT INTO pln0096rproducao (hora, linha, conferencia) VALUES(:hora, :linha, :conferencia)";
            $stmth6 = $PDO->prepare($sqlh6);
            $stmth6->bindParam(':hora', str_replace('.', '', $analise0096h['h6']));
            $stmth6->bindParam(':linha', str_replace('.', '', $analise0096l['h6']));
            $stmth6->bindParam(':conferencia', str_replace('.', '', $analise0096c['h6']));
            $stmth6->execute();
            $sqlh7 = "INSERT INTO pln0096rproducao (hora, linha, conferencia) VALUES(:hora, :linha, :conferencia)";
            $stmth7 = $PDO->prepare($sqlh7);
            $stmth7->bindParam(':hora', str_replace('.', '', $analise0096h['h7']));
            $stmth7->bindParam(':linha', str_replace('.', '', $analise0096l['h7']));
            $stmth7->bindParam(':conferencia', str_replace('.', '', $analise0096c['h7']));
            $stmth7->execute();
            $sqlh8 = "INSERT INTO pln0096rproducao (hora, linha, conferencia) VALUES(:hora, :linha, :conferencia)";
            $stmth8 = $PDO->prepare($sqlh8);
            $stmth8->bindParam(':hora', str_replace('.', '', $analise0096h['h8']));
            $stmth8->bindParam(':linha', str_replace('.', '', $analise0096l['h8']));
            $stmth8->bindParam(':conferencia', str_replace('.', '', $analise0096c['h8']));
            $stmth8->execute();
            $sqlh9 = "INSERT INTO pln0096rproducao (hora, linha, conferencia) VALUES(:hora, :linha, :conferencia)";
            $stmth9 = $PDO->prepare($sqlh9);
            $stmth9->bindParam(':hora', str_replace('.', '', $analise0096h['h9']));
            $stmth9->bindParam(':linha', str_replace('.', '', $analise0096l['h9']));
            $stmth9->bindParam(':conferencia', str_replace('.', '', $analise0096c['h9']));
            $stmth9->execute();
            $sqlh10 = "INSERT INTO pln0096rproducao (hora, linha, conferencia) VALUES(:hora, :linha, :conferencia)";
            $stmth10 = $PDO->prepare($sqlh10);
            $stmth10->bindParam(':hora', str_replace('.', '', $analise0096h['h10']));
            $stmth10->bindParam(':linha', str_replace('.', '', $analise0096l['h10']));
            $stmth10->bindParam(':conferencia', str_replace('.', '', $analise0096c['h10']));
            $stmth10->execute();
            $sqlh11 = "INSERT INTO pln0096rproducao (hora, linha, conferencia) VALUES(:hora, :linha, :conferencia)";
            $stmth11 = $PDO->prepare($sqlh11);
            $stmth11->bindParam(':hora', str_replace('.', '', $analise0096h['h11']));
            $stmth11->bindParam(':linha', str_replace('.', '', $analise0096l['h11']));
            $stmth11->bindParam(':conferencia', str_replace('.', '', $analise0096c['h11']));
            $stmth11->execute();
        endwhile;
    endwhile;
endwhile;

echo ("<script LANGUAGE='JavaScript'>
window.alert('Arquivo salvo com sucesso!');
window.location.href='from-grafico.php';
</script>");
