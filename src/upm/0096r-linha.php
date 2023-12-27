<?php

$servername = "127.0.0.1";
$username = "default";
$password = "123456";
$db = "conf";   
$conn = mysqli_connect($servername, $username, $password, $db);

$sql = 'TRUNCATE TABLE pln0096r1'; 
mysqli_query($conn,$sql) or die('Erro ao tentar excluir o arquivo');
echo 'Atualizando arquivo';

if(isset($_POST["Import"])){

  $filename = $_FILES["file"]["tmp_name"];    
  if($_FILES["file"]["size"] > 0)
  {
    $file = fopen($filename, "r");
    while (($getData = fgetcsv($file, 10000, "|")) !== FALSE)
    {
     $sql = 'INSERT INTO pln0096r1 (codigo, nome, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[3].'"), trim("'.$getData[4].'"), trim("'.$getData[5].'"), trim("'.$getData[6].'"), trim("'.$getData[7].'"), trim("'.$getData[8].'"), trim("'.$getData[9].'"), trim("'.$getData[10].'"), trim("'.$getData[11].'"), trim("'.$getData[12].'"), trim("'.$getData[13].'"), trim("'.$getData[14].'"))';
     $result = mysqli_query($conn, $sql);
     if(!isset($result))
     {
      echo "<script type=\"text/javascript\">
      alert(\"Arquivo Invalido!\");
      window.location = \"from-grafico.php\"
      </script>";    
    }
    else {
      echo "<script type=\"text/javascript\">
      alert(\"Arquivo Importado com sucesso!.\");
      window.location = \"addprod.php\"
      </script>";
    }
  }

  fclose($file);  
}
}   
?>