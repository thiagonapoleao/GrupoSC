<?php
$servername = "127.0.0.1";
$username = "default";
$password = "123456";
$db = "tratativa";
$conn = mysqli_connect($servername, $username, $password, $db);

$sql = 'TRUNCATE TABLE pln0040r';
mysqli_query($conn, $sql) or die('Erro ao tentar excluir o arquivo');
echo 'Atualizando arquivo';
  
if (isset($_POST["Import"])) {

  $filename = $_FILES["file"]["tmp_name"];
  if ($_FILES["file"]["size"] > 0) {
    $file = fopen($filename, "r");
    while (($getData = fgetcsv($file, 10000000, ";")) !== FALSE) {
      if ($getData[1] > 0) {
        $sql = 'INSERT INTO pln0040r (cod, nome, rota, data, estacao, descricao, erro, motivo) VALUES (trim("' . $getData[1] . '"), trim("' . $getData[3] . '"), trim("' . $getData[10] . '"), trim( "' . $getData[12] . '"), trim( "' . $getData[13] . '"), trim("' . $getData[15] . '"), trim("' . $getData[18] . '"), trim("' . $getData[19] . '"))';
        $result = mysqli_query($conn, $sql);
        if (!isset($result)) {
          echo "<script type=\"text/javascript\">
         alert(\"Invalid File:Please Upload CSV File.\");
         window.location = \"from-listaerros.php\"
         </script>";
        }
      }
    }
    echo "<script type=\"text/javascript\">
  alert(\"CSV File has been successfully Imported.\");
  window.location = \"from-listaerros.php\"
  </script>";
    fclose($file);
  }
}
