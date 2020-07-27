<?php
//Validação de ID para auto-preenchimento
	if(!isset($_GET['id'])){
		header('Location:livros.php');
	} else{
		include 'conexao.php';
		$alt_id = $_GET['id'];
		mysqli_select_db($conexao,"bookexchange")or die("Erro ao selecionar Banco");
		$sql = "SELECT * FROM registrolivros WHERE id_registro ='$alt_id'";
		$res = mysqli_query($conexao,$sql)or die("Erro na consulta SQL");
	}

?>
<!DOCTYPE html>
<html>
<head>                                   <!--Design-->
		<title>Book Exchange</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
	




<body>
		
						<!--Formulário-->

	<form action="alteracadastro.php" method="POST">
  <?php
	while ($resultado = mysqli_fetch_array($res)):
  ?>
			<input type="text" readonly="readonly" name="alt_id" value="<?php echo $resultado['id_registro']?>">
			<input required type="text" name="alt_titulo" value="<?php echo $resultado['titulo']?>">
			<input required type="text" required type="text" name="alt_autor" value="<?php echo $resultado['autor']?>">
			<input required type="text" name="alt_genero" value="<?php echo $resultado['genero']?>">
					<input type="submit" name="alt_alterar" value="Alterar" >
			<input type="button" name="cancelar" value="Cancelar" onclick="javascript:history.back()">
			<?php
     endwhile;
  ?> 

</form>
	
              





                         <!--Validação-->

<?php 
		if(isset($_POST['alt_titulo'])){
	
	$id = $_POST['alt_id'];
	$titulo = $_POST['alt_titulo'];
	$autor = $_POST['alt_autor'];
	$genero = $_POST['alt_genero'];


	if (isset($titulo, $autor, $genero)) { 
		include 'conexao.php';
		mysqli_select_db($conexao,"bookexchange")or die("Erro ao selecionar");
		$sqlAtualizar = "UPDATE registrolivros
						SET titulo = '$titulo', autor = '$autor', genero = '$genero'
						WHERE id_registro = '$id'";

		mysqli_query($conexao, $sqlAtualizar);
		header('Location:livros.php');
	
	}

}



?>









</body>
</html>


