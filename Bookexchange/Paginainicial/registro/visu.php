<?php
session_start();
include 'conexao.php';
if(!isset($_GET['id'])){
    header('Location:livros.php');
  } else{
    include 'conexao.php';
    $alt_id = $_GET['id'];
    mysqli_select_db($conexao,"bookexchange")or die("Erro ao selecionar Banco");
    $sql = "SELECT * FROM registrolivros WHERE id_registro ='$alt_id'";
    $consulta = mysqli_query($conexao,$sql)or die("Erro na consulta SQL");
  }

      ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Exchange</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
  <h2>Ficha dos livros</h2>            
  <table  border="1" class="table table-striped table-bordered table-hover w-50 table-sm mt-3">
    <thead class="table-dark">
      <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Genero</th>
</thead>
    <?php while($resultado = mysqli_fetch_array($consulta)):?>
      <tr>
          <td><center> <?php echo $resultado['id_registro'];?></center></td>
          <td><center> <?php echo $resultado['titulo'];?></center></td>
          <td><center> <?php echo $resultado['autor'];?></center></td>
          <td><center> <?php echo $resultado['genero'];?></center></td>
        </tr>
      <?php 
      endwhile;
      ?>
      </table>
    </center>

<a href="../../Chat/Chat">Conversar com o dono via chat?</a> 
  </table>
</div>
​
</body>
</html>