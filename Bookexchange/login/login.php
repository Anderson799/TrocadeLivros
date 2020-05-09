<?php 
session_start();
include 'conexao.php';

$emailL = $_POST['emailL'];
$senhaL = $_POST['senhaL'];

$_SESSION['emailL'] = $emailL;
$_SESSION['senhaL'] = $senhaL;

$sqlConsulta = "SELECT email,senha FROM Perfil";
$consulta = mysqli_query($conexao,$sqlConsulta);
while($login = mysqli_fetch_array($consulta)):

if($_SESSION['emailL'] == $login['email'] && $_SESSION['senhaL'] == $login['senha']){
header("Location:../Paginainicial/index.php");
}else{
	echo "<script>
alert('Usuário ou senha inválidos')
window.location.href= 'login.html'
</script>";
}
endwhile;


 ?>
