<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';

// abre a conexão
$PDOGR = db_connect_grandesredes();

$servername = "127.0.0.1";
$username = "default";
$password = "123456";
$db = "grandesredes";   
$conn = mysqli_connect($servername, $username, $password, $db);

$sql_arry_data = "SELECT data FROM pln0048r";
$stmt_array_data = $PDOGR->prepare($sql_arry_data);
$stmt_array_data->execute();
$data =  $stmt_array_data->fetchColumn();

$hora_atz = date('H:i');
echo 'Atualizando Arquivo!!';


if(isset($_POST["Import"])){

  $filename = $_FILES["file"]["tmp_name"];    
  if($_FILES["file"]["size"] > 0)
  {
    $file = fopen($filename, "r");
    while (($getData = fgetcsv($file, 100000, ";")) !== FALSE)
    {    
    $picklist = str_replace(".", "", $getData[3]);  
    $sql_count = "select count(*) picklist from pln0048r where picklist = '".$picklist."' and volume = '".$getData[4]."'";
    $stmt_count = $PDOGR->prepare($sql_count);
    $stmt_count->execute();
    $count_pick = $stmt_count->fetchColumn();
    if($getData[9] == $data){
      echo "<script type=\"text/javascript\">
      alert(\"Arquivo já importado com essa data!\");
      window.location = \"auditoria.php\"
      </script>";    
    } else {
      if($count_pick == 0 ){
        if($getData[7] == "762" || $getData[7] == "766" || $getData[7] == "790" || $getData[7] == "710" || $getData[7] == "743" || $getData[7] == "755"){
          $sql = 'INSERT INTO pln0048r (picklist, volume, cliente, razao,  rota, roteiro, data, estacao, produto, descricao, lote, validade,  qtd) value ("'.$picklist.'", trim("'.$getData[4].'"), trim("'.$getData[5].'"), trim("'.$getData[6].'"), trim("'.$getData[7].'"), trim("'.$getData[8].'"), trim("'.$getData[9].'"), trim("'.$getData[10].'"), trim("'.$getData[11].'"), trim("'.$getData[12].'"), trim("'.$getData[13].'"), trim("'.$getData[14].'"), trim("'.$getData[15].'")) ';
          $result = mysqli_query($conn, $sql);
          if(!isset($result))
          {
           echo "<script type=\"text/javascript\">
           alert(\"Arquivo Invalido!\");
           window.location = \"auditoria.php\"
           </script>";    
         }
         else {
           echo "<script type=\"text/javascript\">
           alert(\"Arquivo Importado com sucesso!.\");
           window.location = \"auditoria.php\"
           </script>";
         }
        }  
      }     
    }      
  }
  fclose($file);  
}
}   
?>