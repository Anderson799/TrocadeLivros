<?php
      //Recebendo os valores via POST e inserindo na tabela do bd
session_start();
include 'conexao.php';
$sql = "SELECT id_proposta,livroQdesejo,autor,genero FROM proposta";
$consulta = mysqli_query($conexao,$sql);

if(mysqli_num_rows($consulta)==0) {
  echo "<center><h1>Nenhum Registro Encontrado</h1></center>";
   }
if(isset($_POST['livro'])){
$livro = $_POST['livro'];
$escritor = $_POST['escritor'];
$tipo = $_POST['tipo'];

$sqlInserir = "INSERT INTO proposta (livroQdesejo,autor,genero)values('$livro','$escritor','$tipo')";
$insere = mysqli_query($conexao,$sqlInserir);
header('Location:../index.php');

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
  <h2>Livros solicitados</h2>
  <form method="POST" action="solicitados.php">
      <div class="input-group">
            <input class="input--style-3" required type="text" placeholder="Qual livro você procura?" name="titulo">
      </div>
      <div class="p-t-10">
          <button type="submit">Buscar</button>
          <p></p><a href="solicitados.html">Deseja solicitar um livro?</a>

      </div>
  </form>

  <table  border="1" class="table table-striped table-bordered table-hover w-25 table-sm mt-3">
    <thead class="table-dark">
      <tr>
        <td><center>ID</center></td>
        <td><center>Titulo</center></td>
        <td><center>Autor</center></td>
        <td><center>Genero</center></td>
        <td colspan="3"><center>Opções</center></td>
    </thead>

    <?php while ($resultado = mysqli_fetch_array($consulta)):?>
      <tr>
          <td><center> <?php echo $resultado['id_proposta'];?></center></td>
          <td><center> <?php echo $resultado['livroQdesejo'];?></center></td>
          <td><center> <?php echo $resultado['autor'];?></center></td>
          <td><center> <?php echo $resultado['genero'];?></center></td>

              <td>
            <a href=#.php?id=<?php echo $resultado['id_proposta']?>>
              <input type="button" name="tenho" value="Tenho">
            </a>
          </td>
          <?php if(isset($_SESSION['emailL'])){?>
          <td>
            <a href="#"?id=<?php echo $resultado['id_proposta']?>>
              <input type="button" name="alterar" value="Alterar">
            </a>
          </td>
          <td>
            <a href="#"?id=<?php echo $resultado['id_proposta']?>">
              <input type="button" name="excluir" value="Excluir">
            </a>
          </td>
        </tr>
      <?php }?>
      <?php endwhile ?>
      </table>
 
    </center>
      
  

      
  
  <?php
      //Campo de busca
    mysqli_select_db($conexao,"bookexchange")  or die ("Erro na seleção do Banco");
  if(isset($_POST['titulo'])){
      $palavra = trim($_POST['titulo']);
      $sql="SELECT * FROM proposta WHERE livroQdesejo like '%".$palavra."%' ORDER BY id_proposta";
      $query = mysqli_query($conexao, $sql) or die ("Erro na consulta sql");
      $numRegistros = ($busca = mysqli_num_rows($query));


    if($numRegistros !=0){    
      echo "<br>".$numRegistros. " registro(s) encontrado(s)<br>";
  
   ?>
    
  </table>
<center>
   <table border="1" class="table table-striped table-bordered table-hover w-25 table-sm mt-3">
        
        <thead class="table-dark">

        <tr>    
            <td><center>ID</center></td>
            <td><center>Titulo</center></td>
            <td><center>Autor</center></td>
            <td><center>Genero</center></td>
            <td colspan="2"><center>Opções</center></td>
          </tr> 
          </thead>
   <?php

    while($busca=mysqli_fetch_array($query)){
   ?>
        <center>
          <tr>
            <td> <center> <?php echo $busca['id_proposta'];?></center></td>
            <td> <center> <?php echo $busca['livroQdesejo'];?></center></td>
            <td> <center> <?php echo $busca['autor'];?></center></td>
            <td> <center> <?php echo $busca['genero'];?></center></td>

          <td>
            <a href=alteracadastro.php?id=<?php echo $busca['id_proposta']?>>
            <input type="button" name="alterar" value="Alterar">
            </a>
          </td>
          <td>
            <a href="exclusao.php?id=<?php echo $busca['id_proposta']?>">
              <input type="button" name="excluir" value="Excluir">
            </a>
          </td>

          </tr>
        </center>
      
  <?php
    }
  }else{
    echo "<center> Nenhum registro encontrado </center>";
  }
}
?>
</table>
</center>
  <a href="../index.php">Voltar ao Menu</a>

​
</body>
</html>