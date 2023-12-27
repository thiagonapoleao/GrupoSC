<?php

$servername = "127.0.0.1";
$username = "default";
$password = "123456";
$db = "tratativa";   
$conn = mysqli_connect($servername, $username, $password, $db);

$sql = 'TRUNCATE TABLE pln0040r'; 
mysqli_query($conn,$sql) or die('Erro ao tentar excluir o arquivo');
echo 'Atualizando arquivo';

if(isset($_POST["Import"])){

  $filename = $_FILES["file"]["tmp_name"];    
  if($_FILES["file"]["size"] > 0)
  {
    $file = fopen($filename, "r");
    while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
    {
     $sql = 'INSERT INTO pln0040r (cod, separador, rota, data, estacao, produto, descricao, qtd_conf, erros, motivo) VALUES ("'.$getData[1].'", "'.$getData[3].'", "'.$getData[10].'", "'.$getData[12].'", "'.$getData[13].'", "'.$getData[14].'", "'.$getData[15].'", "'.$getData[16].'", "'.$getData[18].'", "'.$getData[19].'")';
     $result = mysqli_query($conn, $sql);
     if(!isset($result))
     {
      echo "<script type=\"text/javascript\">
      alert(\"Invalid File:Please Upload CSV File.\");
      window.location = \"from_listaerros.php\"
      </script>";    
    }
    else {
      echo "<script type=\"text/javascript\">
      alert(\"CSV File has been successfully Imported.\");
      window.location = \"from-listaerros.php\"
      </script>";
    }
  }

  fclose($file);  
}
}   
?>