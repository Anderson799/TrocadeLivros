<?php 
	include 'conexao.php';
	session_start();
	if (isset($_SESSION['emailL'])) {
		$nick = $_SESSION['emailL'];
		require_once("inc/chat.php"); // Retorna o arquivo do chat
	} else {
		header("Location:../../Paginainicial");
	}
?>