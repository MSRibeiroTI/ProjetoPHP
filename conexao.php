<?php
// Define as variáveis para a conexão
$servername = "localhost"; // O nome do servidor
$username = "root"; // O nome de usuário do banco de dados
$password = ""; // A senha do banco de dados
$dbname = "batismo"; // O nome do banco de dados

// Cria a conexão usando a função mysqli_connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if (!$conn) {
  die("Conexão falhou: " . mysqli_connect_error());
}

?>