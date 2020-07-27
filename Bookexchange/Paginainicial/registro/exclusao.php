<?php

if(isset($_GET['id'])){

	include "conexao.php";

$id = $_GET['id'];


 	$sql ="DELETE FROM registrolivros WHERE id_registro = $id";
$query = mysqli_query($conexao, $sql) or die ("Erro na exclusão sql");
 
 echo "<script>
      alert('Registro excluído!');
      window.location.href = '../../index.html'
      </script> ";


}


else {echo "Erro na exclusão (não foi possível obter o id)";

echo "<a href = ../../index.html>Voltar</a>";

}


?>