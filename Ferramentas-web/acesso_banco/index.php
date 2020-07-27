<?php
	include 'dbfuncoes.php';
	$servidor = 'localhost';
	$usuario = 'root';
	$senha = '';
	$db = 'escola';

	setConexao($servidor, $usuario, $senha, $db);

	$sql = "SELECT * FROM aluno";
	$dados = consultarSQL($sql);
?>
<select name="aluno" id="aluno">
	<?php foreach($dados as $linha){ ?>
		<option value=""><?=$linha['nome']?></option>
	<?php } ?>
</select>