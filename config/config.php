<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "batismo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Conexão falhou: " . mysqli_connect_error());
}else{
//  echo "<script>alert('Conectado com sucesso!')</script>";
}
?>