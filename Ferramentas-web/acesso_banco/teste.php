<?php
	include 'dbfuncoes.php';
	$servidor = 'localhost';
	$usuario = 'root';
	$senha = '';
	$db = 'escola';

	setConexao($servidor, $usuario, $senha, $db);

	$sql="insert into aluno (nome) values('Paulo')";
	executarSQL($sql);

	$sql="UPDATE aluno SET nome = 'Paulo Samuel' WHERE id = 4";
	executarSQL($sql);

	$sql="DELETE FROM aluno WHERE id = 2";
	executarSQL($sql);

	$sql = "SELECT * FROM aluno";
	$dados = consultarSQL($sql);
	foreach($dados as $linha){
		echo $linha['id'].'-';
		echo $linha['nome'].'<br>';

	}
	

?>