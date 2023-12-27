<?php

$servername = "127.0.0.1";
$username = "default";
$password = "123456";
$db = "conf";   
$conn = mysqli_connect($servername, $username, $password, $db);

$sql = 'TRUNCATE TABLE pln1027'; 
mysqli_query($conn,$sql) or die('Erro ao tentar excluir o arquivo');
echo 'Atualizando arquivo';

if(isset($_POST["Import"])){
  

  $filename = $_FILES["file"]["tmp_name"];    
  $_FILES["file"]["size"];
  
    $file = fopen($filename, "r");
    while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
    {
     $sql = 'INSERT INTO pln1027 (data, picklist, volume, produto, descricao, cancelado, operador, motivo) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[3].'"), trim("'.$getData[5].'"), trim("'.$getData[6].'"), trim("'.$getData[9].'"), trim("'.$getData[13].'"), trim("'.$getData[16].'")"))';
     $result = mysqli_query($conn, $sql);
     if(!isset($result))
     {
      echo "<script type=\"text/javascript\">
      alert(\"Arquivo Invalido!\");
      window.location = \"listacancelados.php\"
      </script>";    
    }
    else {
      echo "<script type=\"text/javascript\">
      alert(\"Arquivo Importado com sucesso!.\");
      window.location = \"listacancelados.php\"
      </script>";
    }
  }

  fclose($file);  

}   
?>