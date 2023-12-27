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

 //Receber os dados do formulário
$arquivo_tmp = $_FILES['file']['tmp_name'];

//ler todo o arquivo para um array
$dados = file($arquivo_tmp);

//Ler os dados do array
foreach($dados as $linha){
	//Retirar os espaços em branco no inicio e no final da string
	$linha = trim($linha);
	//Colocar em um array cada item separado pela virgula na string
	$valor = explode(',', $linha);
	
	//Recuperar o valor do array indicando qual posição do array requerido e atribuindo para um variável
	$data = $data[0];
	$picklist = $picklist[1];
	$volume = $volume[2];
	$produto = $produto[4];
  $descricao = $descricao[5];
  $cancelado = $cancelado[8];
  $operador = $operador[12];
  $motivo = $motivo[15];
	
	//Criar a QUERY com PHP para inserir os dados no banco de dados
	$result_usuario = "INSERT INTO pln1027 (data, picklist, volume, produto, descricao, cancelado, operador, motivo) VALUES ('$data', '$picklist', '$volume', '$produto', '$descricao', '$cancelado', '$operador', '$motivo')";
	
	//Executar a QUERY para inserir os registros no banco de dados com MySQLi
	$resultado_usuario = mysqli_query($conn, $result_usuario);	
}
//Criar a variável global com a mensagem de sucesso
$_SESSION['msg'] = "<p style='color: green;'>Carregado os dados com sucesso!</p>";
//Redirecionar o usuário com PHP para a página index.php
header("Location: listacancelados.php");
  fclose($file);  

}   
?>