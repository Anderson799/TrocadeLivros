<?php
session_start();
include 'conexao.php';


$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];

$_SESSION['nome'] = $nome; 
$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;
$_SESSION['telefone'] = $telefone;

$sqlInserir = "INSERT INTO Perfil (nome,email,telefone,senha)values
('$_SESSION[nome]','$_SESSION[email]',
'$_SESSION[telefone]'
,'$_SESSION[senha]')";
$resultado = mysqli_query($conexao,$sqlInserir);
echo "Cadastro realizado com sucesso!";
if(isset($resultado)){
header("Location:../Paginainicial/index.php");

}

?>