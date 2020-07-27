<?php
include 'conexao.php';
session_start();
unset($_SESSION['emailL']);
header("Location:../Paginainicial/index.php");
?>