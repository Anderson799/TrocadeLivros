<?php 
	include 'conexao.php';
	session_start();
	if (isset($_SESSION['emailL'])) {
		$sql="SELECT * FROM mensagens";
		$consulta = mysqli_query($conexao,$sql);

		if (mysqli_num_rows($consulta) > 0) {
			echo '<p>Seja bem vindo '.$_SESSION['emailL'].'</p>';
			echo '<p>Digite /sair para deslogar do chat</p><br/>';
			while($ln = mysqli_fetch_assoc($consulta)){
				$mensagem=htmlspecialchars($ln['mensagem']);
				echo "<p>".$_SESSION['emailL'].": ".$mensagem."</p>";
			}
		} else {
			echo '<p>Seja bem vindo '.$_SESSION['emailL'].'</p><br/>';
			echo '<p>Digite /sair para deslogar do chat</p>';
			echo "Nenhuma mensagem até o momento.";
		}
	} else {
		//require_once("inc/nick.php"); // Retorna o arquivo para definir um nick
	}
?>