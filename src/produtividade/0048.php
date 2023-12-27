<?php
session_start(); # Deve ser a primeira linha do arquivo
require_once '../init.php';


// abre a conexão
$PDO = db_connect_conf();
$PDOD = db_connect();

$servername = "127.0.0.1";
$username = "default";
$password = "123456";
$db = "conf";   
$conn = mysqli_connect($servername, $username, $password, $db);

// SQL para selecionar os registros
$sql_arry_datacontabil = "SELECT data FROM datacontabil";
// seleciona os registros
$stmt_array_datacontabil = $PDOD->prepare($sql_arry_datacontabil);
$stmt_array_datacontabil->execute();
$datacontabil =  $stmt_array_datacontabil->fetchColumn();

// cont hora 1

$sql_0048_1 = "SELECT count(qtd) FROM pln0048r1";
$stmt_0048_1 = $PDO->prepare($sql_0048_1);
$stmt_0048_1->execute();
$plnh1= $stmt_0048_1->fetchColumn();
// cont hora 2
$sql_0048_2 = "SELECT count(qtd) FROM pln0048r2";
$stmt_0048_2 = $PDO->prepare($sql_0048_2);
$stmt_0048_2->execute();
$plnh2= $stmt_0048_2->fetchColumn();
// cont hora 3
$sql_0048_3 = "SELECT count(qtd) FROM pln0048r3";
$stmt_0048_3 = $PDO->prepare($sql_0048_3);
$stmt_0048_3->execute();
$plnh3= $stmt_0048_3->fetchColumn();
// cont hora 4
$sql_0048_4 = "SELECT count(qtd) FROM pln0048r4";
$stmt_0048_4 = $PDO->prepare($sql_0048_4);
$stmt_0048_4->execute();
$plnh4= $stmt_0048_4->fetchColumn();
// cont hora 5
$sql_0048_5 = "SELECT count(qtd) FROM pln0048r5";
$stmt_0048_5 = $PDO->prepare($sql_0048_5);
$stmt_0048_5->execute();
$plnh5= $stmt_0048_5->fetchColumn();
// cont hora 6
$sql_0048_6 = "SELECT count(qtd) FROM pln0048r6";
$stmt_0048_6 = $PDO->prepare($sql_0048_6);
$stmt_0048_6->execute();
$plnh6= $stmt_0048_6->fetchColumn();
// cont hora 7
$sql_0048_7 = "SELECT count(qtd) FROM pln0048r7";
$stmt_0048_7 = $PDO->prepare($sql_0048_7);
$stmt_0048_7->execute();
$plnh7= $stmt_0048_7->fetchColumn();
// cont hora 8
$sql_0048_8 = "SELECT count(qtd) FROM pln0048r8";
$stmt_0048_8 = $PDO->prepare($sql_0048_8);
$stmt_0048_8->execute();
$plnh8= $stmt_0048_8->fetchColumn();
// cont hora 9
$sql_0048_9 = "SELECT count(qtd) FROM pln0048r9";
$stmt_0048_9 = $PDO->prepare($sql_0048_9);
$stmt_0048_9->execute();
$plnh9= $stmt_0048_9->fetchColumn();
// cont hora 10
$sql_0048_10 = "SELECT count(qtd) FROM pln0048r10";
$stmt_0048_10 = $PDO->prepare($sql_0048_10);
$stmt_0048_10->execute();
$plnh10= $stmt_0048_10->fetchColumn();
// cont hora 11
$sql_0048_11 = "SELECT count(qtd) FROM pln0048r11";
$stmt_0048_11 = $PDO->prepare($sql_0048_11);
$stmt_0048_11->execute();
$plnh11= $stmt_0048_11->fetchColumn();


// SQL para selecionar os registros
$sql_arry_atzpdg = "SELECT id, data, hora1, hora2, hora3, hora4, hora5, hora6, hora7, hora8, hora9, hora10, hora11 FROM atzpedidao";
// seleciona os registros
$stmt_array_atzpdg = $PDO->prepare($sql_arry_atzpdg);
$stmt_array_atzpdg->execute();

$hora_atz = date('H:i');
$isoDate = dateConvert($datacontabil);


while ($atzpdg = $stmt_array_atzpdg->fetch(PDO::FETCH_ASSOC)) :


if($plnh1 == 0){ 
  
  echo '<img align="center"  style=" height: 50%; width: 50%" src="..\img\time1.jpg">';
  if(isset($_POST["Import"])){
  
    $filename = $_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
      {  
        $sql = 'INSERT INTO pln0048r1 (conferente, nome, qtd) value (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[15].'"))  ';
        $result = mysqli_query($conn, $sql);
        $sqlpdg = 'UPDATE atzpedidao SET data = "'.$datacontabil.'", hora1 ="'.$hora_atz.'" , hora2 ="" , hora3="" , hora4 ="" , hora5 ="" , hora6 ="" , hora7 ="", hora8 ="" , hora9 ="" , hora10 ="" , hora11 =""   WHERE id = "'.$atzpdg['id'].'" ';
        $resultpdg = mysqli_query($conn, $sqlpdg); 
       if(!isset($result))
       {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Invalido!\");
        window.location = \"analisepedidao.php\"
        </script>";    
      }
      else {
        // pega os dados do formuário
        $hora = 1;
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addpedidao.php\"
        </script>";
      }
    }  
    fclose($file);  
  }
 
  }   
} elseif($plnh2 == 0){
  echo '<img align="center"  style=" height: 50%; width: 50%" src="..\img\time2.jpg">';
  if(isset($_POST["Import"])){
  
    $filename = $_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 100000, ";")) !== FALSE)
      {        
        $sqlpdg = 'UPDATE atzpedidao SET data = "'.$datacontabil.'", hora2 ="'.$hora_atz.'"  WHERE id = "'.$atzpdg['id'].'" ';
        $resultpdg = mysqli_query($conn, $sqlpdg);
       $sql = 'INSERT INTO pln0048r2 (conferente, nome, qtd) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[15].'"))';
       $result = mysqli_query($conn, $sql);
       if(!isset($result))
       {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Invalido!\");
        window.location = \"analisepedidao.php\"
        </script>";    
      }
      else {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addpedidao.php\"
        </script>";
      }
    }  
    fclose($file);  
  }
    //meta
    $sql_meta = "SELECT sum(meta) FROM monitorapedidao where hora2 > 30";
    $stmt_meta = $PDO->prepare($sql_meta);
    $stmt_meta->execute();
    $meta = $stmt_meta->fetchColumn();

  $sql_0048_1 = "SELECT count(qtd) FROM pln0048r1";
  $stmt_0048_1 = $PDO->prepare($sql_0048_1);
  $stmt_0048_1->execute();
  $plng1= $stmt_0048_1->fetchColumn(); 

  $sql_0048_2 = "SELECT count(qtd) FROM pln0048r2";
  $stmt_0048_2 = $PDO->prepare($sql_0048_2);
  $stmt_0048_2->execute();
  $plng2= $stmt_0048_2->fetchColumn(); 

  if( $plng2 > $plng1){
    $volume2 = $plng2 - $plng1;
  }else {
    $volume2 = 0;
  } 
  $sqlg = 'INSERT INTO pln0048rgrafico (hora, producao, meta) value("'.$hora_atz.'", "'.$volume2.'", "'.$meta.'") ';
  $result = mysqli_query($conn, $sqlg);
  }   
} elseif($plnh3 == 0){
  
  if(isset($_POST["Import"])){
    echo '<img align="center"  style=" height: 50%; width: 50%" src="..\img\time3.jpg">';
    $filename = $_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 100000, ";")) !== FALSE)
      {
        $sqlpdg = 'UPDATE atzpedidao SET data = "'.$datacontabil.'", hora3 ="'.$hora_atz.'"  WHERE id = "'.$atzpdg['id'].'" ';
        $resultpdg = mysqli_query($conn, $sqlpdg);
       $sql = 'INSERT INTO pln0048r3 (conferente, nome, qtd) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[15].'"))';
       $result = mysqli_query($conn, $sql);
       if(!isset($result))
       {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Invalido!\");
        window.location = \"analisepedidao.php\"
        </script>";    
      }
      else {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addpedidao.php\"
        </script>";
      }
    }  
    fclose($file);  
  }
    //meta
    $sql_meta = "SELECT sum(meta) FROM monitorapedidao where hora3 > 30";
    $stmt_meta = $PDO->prepare($sql_meta);
    $stmt_meta->execute();
    $meta = $stmt_meta->fetchColumn();

  $sql_0048_2 = "SELECT count(qtd) FROM pln0048r2";
  $stmt_0048_2 = $PDO->prepare($sql_0048_2);
  $stmt_0048_2->execute();
  $plng2= $stmt_0048_2->fetchColumn(); 

  $sql_0048_3 = "SELECT count(qtd) FROM pln0048r3";
  $stmt_0048_3 = $PDO->prepare($sql_0048_3);
  $stmt_0048_3->execute();
  $plng3= $stmt_0048_3->fetchColumn(); 

  if( $plng3 > $plng2){
    $volume3 = $plng3 - $plng2;
  }else {
    $volume3 = 0;
  }   
  $sqlg = 'INSERT INTO pln0048rgrafico (hora, producao, meta) value("'.$hora_atz.'", "'.$volume3.'", "'.$meta.'") ';
  $result = mysqli_query($conn, $sqlg);
  }   
} elseif($plnh4 == 0){
  echo '<img align="center"  style=" height: 50%; width: 50%" src="..\img\time4.jpg">';
  if(isset($_POST["Import"])){
  
    $filename = $_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 100000, ";")) !== FALSE)
      {
       $sql = 'INSERT INTO pln0048r4 (conferente, nome, qtd) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[15].'"))';
       $result = mysqli_query($conn, $sql);       
       $sqlpdg = 'UPDATE atzpedidao SET data = "'.$datacontabil.'", hora4 ="'.$hora_atz.'"  WHERE id = "'.$atzpdg['id'].'" ';
       $resultpdg = mysqli_query($conn, $sqlpdg);
       if(!isset($result))
       {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Invalido!\");
        window.location = \"analisepedidao.php\"
        </script>";    
      }
      else {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addpedidao.php\"
        </script>";
      }
    }  
    fclose($file);  
  }
    //meta
    $sql_meta = "SELECT sum(meta) FROM monitorapedidao where hora4 > 30";
    $stmt_meta = $PDO->prepare($sql_meta);
    $stmt_meta->execute();
    $meta = $stmt_meta->fetchColumn();

  $sql_0048_3 = "SELECT count(qtd) FROM pln0048r3";
  $stmt_0048_3 = $PDO->prepare($sql_0048_3);
  $stmt_0048_3->execute();
  $plng3= $stmt_0048_3->fetchColumn(); 

  $sql_0048_4 = "SELECT count(qtd) FROM pln0048r4";
  $stmt_0048_4 = $PDO->prepare($sql_0048_4);
  $stmt_0048_4->execute();
  $plng4= $stmt_0048_4->fetchColumn(); 

  if( $plng4 > $plng3){
    $volume4 = $plng4 - $plng3;
  }else {
    $volume4 = 0;
  }   
  $sqlg = 'INSERT INTO pln0048rgrafico (hora, producao, meta) value("'.$hora_atz.'", "'. $volume4.'", "'.$meta.'") ';
  $result = mysqli_query($conn, $sqlg);
  }   
} elseif($plnh5 == 0){
  echo '<img align="center"  style=" height: 50%; width: 50%" src="..\img\time5.jpg">';
  if(isset($_POST["Import"])){
  
    $filename = $_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 100000, ";")) !== FALSE)
      {
       $sql = 'INSERT INTO pln0048r5 (conferente, nome, qtd) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[15].'"))';
       $result = mysqli_query($conn, $sql);       
       $sqlpdg = 'UPDATE atzpedidao SET data = "'.$datacontabil.'", hora5 ="'.$hora_atz.'"  WHERE id = "'.$atzpdg['id'].'" ';
       $resultpdg = mysqli_query($conn, $sqlpdg);
       if(!isset($result))
       {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Invalido!\");
        window.location = \"analisepedidao.php\"
        </script>";    
      }
      else {           
     echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addpedidao.php\"
        </script>";
      }
    }  
    fclose($file);  
  }
        //meta
        $sql_meta = "SELECT sum(meta) FROM monitorapedidao where hora5 > 30";
        $stmt_meta = $PDO->prepare($sql_meta);
        $stmt_meta->execute();
        $meta = $stmt_meta->fetchColumn();

        $sql_0048_4 = "SELECT count(qtd) FROM pln0048r4";
        $stmt_0048_4 = $PDO->prepare($sql_0048_4);
        $stmt_0048_4->execute();
        $plng4= $stmt_0048_4->fetchColumn(); 
  
        $sql_0048_5 = "SELECT count(qtd) FROM pln0048r5";
        $stmt_0048_5 = $PDO->prepare($sql_0048_5);
        $stmt_0048_5->execute();
        $plng5= $stmt_0048_5->fetchColumn(); 

        if( $plng5 >  $plng4){
          $volume5 = $plng5 -  $plng4;
        }else {
          $volume5 = 0;
        }   
        $sqlg = 'INSERT INTO pln0048rgrafico (hora, producao, meta) value("'.$hora_atz.'", "'.$volume5.'", "'.$meta.'") ';
        $result = mysqli_query($conn, $sqlg);
  }   
} elseif($plnh6 == 0){
  echo '<img align="center"  style=" height: 50%; width: 50%" src="..\img\time6.jpg">';
  if(isset($_POST["Import"])){
  
    $filename = $_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 100000, ";")) !== FALSE)
      {
       $sql = 'INSERT INTO pln0048r6 (conferente, nome, qtd) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[15].'"))';
       $result = mysqli_query($conn, $sql);       
       $sqlpdg = 'UPDATE atzpedidao SET data = "'.$datacontabil.'", hora6 ="'.$hora_atz.'"  WHERE id = "'.$atzpdg['id'].'" ';
       $resultpdg = mysqli_query($conn, $sqlpdg);
       if(!isset($result))
       {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Invalido!\");
        window.location = \"analisepedidao.php\"
        </script>";    
      }
      else {           
     echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addpedidao.php\"
        </script>";
      }
    }  
    fclose($file);  
  }
    //meta
    $sql_meta = "SELECT sum(meta) FROM monitorapedidao where hora6 > 30";
    $stmt_meta = $PDO->prepare($sql_meta);
    $stmt_meta->execute();
    $meta = $stmt_meta->fetchColumn();

  $sql_0048_5 = "SELECT count(qtd) FROM pln0048r5";
  $stmt_0048_5 = $PDO->prepare($sql_0048_5);
  $stmt_0048_5->execute();
  $plng5= $stmt_0048_5->fetchColumn(); 

  $sql_0048_6 = "SELECT count(qtd) FROM pln0048r6";
  $stmt_0048_6 = $PDO->prepare($sql_0048_6);
  $stmt_0048_6->execute();
  $plng6= $stmt_0048_6->fetchColumn(); 

  if( $plng6 > $plng5){
    $volume6 = $plng6 - $plng5;
  }else {
    $volume6 = 0;
  }  
  $sqlg = 'INSERT INTO pln0048rgrafico (hora, producao, meta) value("'.$hora_atz.'", "'.$volume6.'", "'.$meta.'") ';
  $result = mysqli_query($conn, $sqlg);
  }   
} elseif($plnh7 == 0){
  echo '<img align="center"  style=" height: 50%; width: 50%" src="..\img\time7.jpg">';
  if(isset($_POST["Import"])){
  
    $filename = $_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 100000, ";")) !== FALSE)
      {
       $sql = 'INSERT INTO pln0048r7 (conferente, nome, qtd) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[15].'"))';
       $result = mysqli_query($conn, $sql);
       $sqlpdg = 'UPDATE atzpedidao SET data = "'.$datacontabil.'", hora7 ="'.$hora_atz.'"  WHERE id = "'.$atzpdg['id'].'" ';
       $resultpdg = mysqli_query($conn, $sqlpdg);
       if(!isset($result))
       {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Invalido!\");
        window.location = \"analisepedidao.php\"
        </script>";    
      }
      else {
     echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addpedidao.php\"
        </script>";
      }
    }  
    fclose($file);  
  }
    //meta
    $sql_meta = "SELECT sum(meta) FROM monitorapedidao where hora7 > 30";
    $stmt_meta = $PDO->prepare($sql_meta);
    $stmt_meta->execute();
    $meta = $stmt_meta->fetchColumn();

  $sql_0048_6 = "SELECT count(qtd) FROM pln0048r6";
  $stmt_0048_6 = $PDO->prepare($sql_0048_6);
  $stmt_0048_6->execute();
  $plng6= $stmt_0048_6->fetchColumn(); 

  $sql_0048_7 = "SELECT count(qtd) FROM pln0048r7";
  $stmt_0048_7 = $PDO->prepare($sql_0048_7);
  $stmt_0048_7->execute();
  $plng7= $stmt_0048_7->fetchColumn(); 
  
  if( $plng7 > $plng6){
    $volume7 = $plng7 - $plng6;
  }else {
    $volume7 = 0;
  }  

  $sqlg = 'INSERT INTO pln0048rgrafico (hora, producao, meta) value("'.$hora_atz.'", "'.$volume7.'", "'.$meta.'") ';
  $result = mysqli_query($conn, $sqlg);
  }   
} elseif($plnh8 == 0){  
  echo '<img align="center"  style=" height: 50%; width: 50%" src="..\img\time8.jpg">';
  if(isset($_POST["Import"])){  
    $filename = $_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 100000, ";")) !== FALSE)
      {
       $sql = 'INSERT INTO pln0048r8 (conferente, nome, qtd) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[15].'"))';
       $result = mysqli_query($conn, $sql);
       $sqlpdg = 'UPDATE atzpedidao SET data = "'.$datacontabil.'", hora8 ="'.$hora_atz.'"  WHERE id = "'.$atzpdg['id'].'" ';
       $resultpdg = mysqli_query($conn, $sqlpdg);
       if(!isset($result))
       {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Invalido!\");
        window.location = \"analisepedidao.php\"
        </script>";    
      }
      else {
     echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addpedidao.php\"
        </script>";
      }
    }  
    fclose($file);  
  }  
    //meta
    $sql_meta = "SELECT sum(meta) FROM monitorapedidao where hora8 > 30";
    $stmt_meta = $PDO->prepare($sql_meta);
    $stmt_meta->execute();
    $meta = $stmt_meta->fetchColumn();

  $sql_0048_7 = "SELECT count(qtd) FROM pln0048r7";
  $stmt_0048_7 = $PDO->prepare($sql_0048_7);
  $stmt_0048_7->execute();
  $plng7= $stmt_0048_7->fetchColumn(); 

  $sql_0048_8 = "SELECT count(qtd) FROM pln0048r8";
  $stmt_0048_8 = $PDO->prepare($sql_0048_8);
  $stmt_0048_8->execute();
  $plng8= $stmt_0048_8->fetchColumn(); 
    
  if( $plng8 > $plng7){
    $volume8 = $plng8 - $plng7;
  }else {
    $volume8 = 0;
  }  

  $sqlg = 'INSERT INTO pln0048rgrafico (hora, producao, meta) value("'.$hora_atz.'", "'.$volume8.'", "'.$meta.'") ';
  $result = mysqli_query($conn, $sqlg);
  }   
} elseif($plnh9 == 0){
  echo '<img align="center"  style=" height: 50%; width: 50%" src="..\img\time9.jpg">';
  if(isset($_POST["Import"])){  
    $filename = $_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 100000, ";")) !== FALSE)
      {
       $sql = 'INSERT INTO pln0048r9 (conferente, nome, qtd) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[15].'"))';
       $result = mysqli_query($conn, $sql);
       $sqlpdg = 'UPDATE atzpedidao SET data = "'.$datacontabil.'", hora9 ="'.$hora_atz.'"  WHERE id = "'.$atzpdg['id'].'" ';
       $resultpdg = mysqli_query($conn, $sqlpdg);
       if(!isset($result))
       {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Invalido!\");
        window.location = \"analisepedidao.php\"
        </script>";    
      }
      else {
     echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addpedidao.php\"
        </script>";
      }
    }  
    fclose($file);  
  }    
    //meta
    $sql_meta = "SELECT sum(meta) FROM monitorapedidao where hora9 > 30";
    $stmt_meta = $PDO->prepare($sql_meta);
    $stmt_meta->execute();
    $meta = $stmt_meta->fetchColumn();

  $sql_0048_8 = "SELECT count(qtd) FROM pln0048r8";
  $stmt_0048_8 = $PDO->prepare($sql_0048_8);
  $stmt_0048_8->execute();
  $plng8= $stmt_0048_8->fetchColumn(); 

  $sql_0048_9 = "SELECT count(qtd) FROM pln0048r9";
  $stmt_0048_9 = $PDO->prepare($sql_0048_9);
  $stmt_0048_9->execute();
  $plng9= $stmt_0048_9->fetchColumn(); 
  
  if( $plng9 > $plng8){
    $volume9 = $plng9 - $plng8;
  }else {
    $volume9 = 0;
  }  
  $sqlg = 'INSERT INTO pln0048rgrafico (hora, producao, meta) value("'.$hora_atz.'", "'.$volume9.'", "'.$meta.'") ';
  $result = mysqli_query($conn, $sqlg);
  }   
} elseif($plnh10 == 0){
  echo '<img align="center"  style=" height: 50%; width: 50%" src="..\img\time10.jpg">';
  if(isset($_POST["Import"])){  
    $filename = $_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 100000, ";")) !== FALSE)
      {
       $sql = 'INSERT INTO pln0048r10 (conferente, nome, qtd) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[15].'"))';
       $result = mysqli_query($conn, $sql);
       $sqlpdg = 'UPDATE atzpedidao SET data = "'.$datacontabil.'", hora10 ="'.$hora_atz.'"  WHERE id = "'.$atzpdg['id'].'" ';
       $resultpdg = mysqli_query($conn, $sqlpdg);
       if(!isset($result))
       {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Invalido!\");
        window.location = \"analisepedidao.php\"
        </script>";    
      }
      else {
     echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addpedidao.php\"
        </script>";
      }
    }  
    fclose($file);  
  }
    //meta
    $sql_meta = "SELECT sum(meta) FROM monitorapedidao where hora10 > 30";
    $stmt_meta = $PDO->prepare($sql_meta);
    $stmt_meta->execute();
    $meta = $stmt_meta->fetchColumn();

  $sql_0048_9 = "SELECT count(qtd) FROM pln0048r9";
  $stmt_0048_9 = $PDO->prepare($sql_0048_9);
  $stmt_0048_9->execute();
  $plng9= $stmt_0048_9->fetchColumn(); 
  
  $sql_0048_10 = "SELECT count(qtd) FROM pln0048r10";
  $stmt_0048_10 = $PDO->prepare($sql_0048_10);
  $stmt_0048_10->execute();
  $plng10= $stmt_0048_10->fetchColumn();

  if( $plng10 > $plng9){
    $volume10 = $plng10 - $plng9;
  }else {
    $volume10 = 0;
  }  
  $sqlg = 'INSERT INTO pln0048rgrafico (hora, producao, meta) value("'.$hora_atz.'", "'.$volume10.'", "'.$meta.'") ';
  $result = mysqli_query($conn, $sqlg);
  }   
} elseif($plnh11 == 0){
  echo '<img align="center"  style=" height: 50%; width: 50%" src="..\img\time11.jpg">';
  if(isset($_POST["Import"])){  
    $filename = $_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 100000, ";")) !== FALSE)
      {
       $sql = 'INSERT INTO pln0048r11 (conferente, nome, qtd) VALUES (trim("'.$getData[1].'"), trim("'.$getData[2].'"), trim("'.$getData[15].'"))';
       $result = mysqli_query($conn, $sql);
       $sqlpdg = 'UPDATE atzpedidao SET data = "'.$datacontabil.'", hora11 ="'.$hora_atz.'"  WHERE id = "'.$atzpdg['id'].'" ';
       $resultpdg = mysqli_query($conn, $sqlpdg);
       if(!isset($result))
       {
        echo "<script type=\"text/javascript\">
        alert(\"Arquivo Invalido!\");
        window.location = \"analisepedidao.php\"
        </script>";    
      }
      else {
     echo "<script type=\"text/javascript\">
        alert(\"Arquivo Importado com sucesso!.\");
        window.location = \"addpedidao.php\"
        </script>";
      }
    }  
    fclose($file);  
  }
    //meta
    $sql_meta = "SELECT sum(meta) FROM monitorapedidao where hora11 > 30";
    $stmt_meta = $PDO->prepare($sql_meta);
    $stmt_meta->execute();
    $meta = $stmt_meta->fetchColumn();

  $sql_0048_10 = "SELECT count(qtd) FROM pln0048r10";
  $stmt_0048_10 = $PDO->prepare($sql_0048_10);
  $stmt_0048_10->execute();
  $plng10= $stmt_0048_10->fetchColumn();

  $sql_0048_11 = "SELECT count(qtd) FROM pln0048r11";
  $stmt_0048_11 = $PDO->prepare($sql_0048_11);
  $stmt_0048_11->execute();
  $plng11= $stmt_0048_11->fetchColumn(); 

  if( $plng11 > $plng10){
    $volume11 = $plng11 - $plng10;
  }else {
    $volume11 = 0;
  }  
  $sqlg = 'INSERT INTO pln0048rgrafico (hora, producao, meta) value("'.$hora_atz.'", "'.$volume11.'", "'.$meta.'") ';
  $result = mysqli_query($conn, $sqlg);
  }   
}


endwhile;;









?>