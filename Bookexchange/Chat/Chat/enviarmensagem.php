<?php 
	include 'conexao.php';
	session_start();
	if (isset($_SESSION['emailL'])) {
		$nick=strip_tags($_SESSION['emailL']);
		$mensagem=htmlspecialchars($_POST['mensagem']);
		$ip=$_SERVER['REMOTE_ADDR'];

		if ($mensagem == "/sair") {
			session_destroy();
		} else {
			$sql="INSERT INTO mensagens (mensagem,ip) VALUES ('$mensagem','$ip')";
			$consulta = mysqli_query($conexao,$sql);
		}

	} 
?>