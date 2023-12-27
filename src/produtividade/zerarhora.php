<?php

require_once '../init.php';

// remove do banco
$PDO = db_connect_conf();

// pega os dados do formuário
$hora = isset($_POST['hora']) ? $_POST['hora'] : null;

if ($hora >= 1 & $hora <=11  ) {
switch ($hora) {
    case 1:
		$sql_h = 'DELETE FROM pln0048r1';
		$stmt_h = $PDO->prepare($sql_h);	
		$stmt_h->execute();
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora excluida com sucesso!);');
		window.location.href='analisepedidao.php';
		</script>");	
        break;
    case 2:
		$sql_h = 'DELETE FROM pln0048r2';
		$stmt_h = $PDO->prepare($sql_h);	
		$stmt_h->execute();
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora excluida com sucesso!);');
		window.location.href='analisepedidao.php';
		</script>");	
        break;
    case 3:
		$sql_h = 'DELETE FROM pln0048r3';
		$stmt_h = $PDO->prepare($sql_h);	
		$stmt_h->execute();
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora excluida com sucesso!);');
		window.location.href='analisepedidao.php';
		</script>");	
        break;
	case 3:
		$sql_h = 'DELETE FROM pln0048r3';
		$stmt_h = $PDO->prepare($sql_h);	
		$stmt_h->execute();
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora excluida com sucesso!);');
		window.location.href='analisepedidao.php';
		</script>");	
		break;
	case 4:
		$sql_h = 'DELETE FROM pln0048r4';
		$stmt_h = $PDO->prepare($sql_h);	
		$stmt_h->execute();
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora excluida com sucesso!);');
		window.location.href='analisepedidao.php';
		</script>");	
		break;
	case 5:
	    $sql_h = 'DELETE FROM pln0048r5';
		$stmt_h = $PDO->prepare($sql_h);	
		$stmt_h->execute();
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora excluida com sucesso!);');
		window.location.href='analisepedidao.php';
		</script>");	
		break;
	case 6:
		$sql_h = 'DELETE FROM pln0048r6';
		$stmt_h = $PDO->prepare($sql_h);	
		$stmt_h->execute();
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora excluida com sucesso!);');
		window.location.href='analisepedidao.php';
		</script>");	
		break;
	case 7:
		$sql_h = 'DELETE FROM pln0048r7';
		$stmt_h = $PDO->prepare($sql_h);	
		$stmt_h->execute();
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora excluida com sucesso!);');
		window.location.href='analisepedidao.php';
		</script>");	
		break;
    case 8:
		$sql_h = 'DELETE FROM pln0048r8';
		$stmt_h = $PDO->prepare($sql_h);	
		$stmt_h->execute();
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora excluida com sucesso!);');
		window.location.href='analisepedidao.php';
		</script>");	
		break;
    case 9:
	  $sql_h = 'DELETE FROM pln0048r9';
	  $stmt_h = $PDO->prepare($sql_h);	
	  $stmt_h->execute();
	  header('Location: analisepedidao.php');
	  break;				
	case 10:
		$sql_h = 'DELETE FROM pln0048r10';
		$stmt_h = $PDO->prepare($sql_h);	
		$stmt_h->execute();
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora excluida com sucesso!);');
		window.location.href='analisepedidao.php';
		</script>");	
	  break;				
	  case 11:
		$sql_h = 'DELETE FROM pln0048r11';
		$stmt_h = $PDO->prepare($sql_h);	
		$stmt_h->execute();
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora excluida com sucesso!);');
		window.location.href='analisepedidao.php';
		</script>");	
	  break;			  
						
}
	
} else {
	echo ("<script LANGUAGE='JavaScript'>
		window.alert('Hora informada incorreta! Tente novamente!);');
		window.location.href='analisepedidao.php';
		</script>");
}