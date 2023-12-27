<?php

$servername = "127.0.0.1";
$username = "default";
$password = "123456";
$db = "tratativa";   
$conn = mysqli_connect($servername, $username, $password, $db);

$sql = 'TRUNCATE TABLE pln0098r'; 
mysqli_query($conn,$sql) or die('Erro ao tentar excluir o arquivo');
echo 'Atualizando arquivo';

if(isset($_POST["Import"])){

  $filename = $_FILES["file"]["tmp_name"];    
  if($_FILES["file"]["size"] > 0)
  {
    $file = fopen($filename, "r");
    while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
    {
     $sql = 'INSERT INTO pln0098r (data, estacao, t_prod, qtd_cnf, falta_epm, falta_upm, sobra_epm, sobra_upm, troca_epm, troca_upm, erro_conf_epm, erro_conf_upm, trava_valid_epm, trava_valid_upm) VALUES ("'.$getData[0].'", "'.$getData[1].'", "'.$getData[2].'", "'.$getData[3].'", "'.$getData[4].'", "'.$getData[5].'", "'.$getData[6].'", "'.$getData[7].'", "'.$getData[8].'", "'.$getData[9].'", "'.$getData[10].'", "'.$getData[11].'", "'.$getData[12].'", "'.$getData[13].'")';
     $result = mysqli_query($conn, $sql);
     if(!isset($result))
     {
      echo "<script type=\"text/javascript\">
      alert(\"Invalid File:Please Upload CSV File.\");
      window.location = \"tratativa.php\"
      </script>";    
    }
    else {
      echo "<script type=\"text/javascript\">
      alert(\"CSV File has been successfully Imported.\");
      window.location = \"tratativa.php\"
      </script>";
    }
  }

  fclose($file);  
}
}   
?>