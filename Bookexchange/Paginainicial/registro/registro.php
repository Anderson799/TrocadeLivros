<?php
session_start();
include 'conexao.php';
$titulo = $_POST['titulo'];
$nomeA = $_POST['nomeA'];
$genero = $_POST['genero'];

$_SESSION['titulo'] = $titulo; 
$_SESSION['nomeA'] = $nomeA;
$_SESSION['genero'] = $genero;

$sqlInserir = "INSERT INTO registroLivros (titulo,autor,genero)values('$_SESSION[titulo]','$_SESSION[nomeA]',
'$_SESSION[genero]')";
$consulta = mysqli_query($conexao,$sqlInserir);
if(isset($consulta)){
header('Location:../index.php');
}
 ?>