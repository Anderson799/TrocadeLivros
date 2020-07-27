
<!doctype html>
<html lang="en">
<head>
    <title>Redefinir Senha</title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


	<style>body{padding-top: 60px;}</style>

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

	<link href="assets/css/login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.js" type="text/javascript"></script>
	<script src="assets/js/login-register.js" type="text/javascript"></script>

</head>
<body>

		 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Redefinir senha</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
                                <div class="social">
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="POST" action="Nsenha.php" 
                                    accept-charset="UTF-8">
                                    <input required class="form-control" type="text" placeholder="Nova Senha" name="Nsenha">
                                    <button class="btn btn-default btn-login" type="submit"> Alterar senha
                                    </button>
                                    </form>
                                </div>
                             </div>
                        </div>
                        
<script type="text/javascript">
    $(document).ready(function(){
        openLoginModal();
    });
</script>


</body>
</html>
<?php
include 'conexao.php';
session_start();
if(isset($_POST['Nsenha'])){
	$Nsenha = $_POST['Nsenha'];
	$email = $_SESSION['Remail'];

$sql = "UPDATE Perfil SET senha = '$Nsenha' WHERE email = '$email'";
$consulta = mysqli_query($conexao,$sql);
if (isset($consulta)) {
	header("Location:login.html");
}
}
?>