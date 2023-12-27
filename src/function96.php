<?php

$servername = "127.0.0.1";
$username = "default";
$password = "123456";
$db = "indicadores";   
$conn = mysqli_connect($servername, $username, $password, $db);

$sql = 'TRUNCATE TABLE pln0096r'; 
mysqli_query($conn,$sql) or die('Erro ao tentar excluir o arquivo');
echo 'Atualizando arquivo';

if(isset($_POST["Import"])){

  $filename = $_FILES["file"]["tmp_name"];    
  if($_FILES["file"]["size"] > 0)
  {
    $file = fopen($filename, "r");
    while (($getData = fgetcsv($file, 10000, "|")) !== FALSE)
    {
     $sql = 'INSERT INTO pln0096r (codigo, setor, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10, h11, total) VALUES ("'.$getData[1].'", "'.$getData[2].'", "'.$getData[3].'", "'.$getData[4].'", "'.$getData[5].'", "'.$getData[6].'", "'.$getData[7].'", "'.$getData[8].'", "'.$getData[9].'", "'.$getData[10].'", "'.$getData[11].'", "'.$getData[12].'", "'.$getData[13].'", "'.$getData[14].'")';
     $result = mysqli_query($conn, $sql);
     if(!isset($result))
     {
      echo "<script type=\"text/javascript\">
      alert(\"Invalid File:Please Upload Txt File.\");
      window.location = \"inicial.php\"
      </script>";    
    }
    else {
      echo "<script type=\"text/javascript\">
      alert(\"Txt File has been successfully Imported.\");
      window.location = \"add_upm_hora.php\"
      </script>";
    }
  }

  fclose($file);  
}
}
