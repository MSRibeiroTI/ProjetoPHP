<?php
session_start();

if (empty($_POST) or empty($_POST["nome"]) or empty($_POST[""])) {
  print "<script>location.href='cadastro.php';</script>";
}

include('config.php');

$usuario = $_POST['nome'];
$phone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$curso = $_POST['curso'];


$sql = "INSERT INTO cad_curso (name, phone, addres, datacurso)
VALUES ('$usuario', '$phone','$endereco', '$curso')";
$resultado = $conn->query($sql) or trigger_error($conn->error);

if ($resultado == true) {
  echo "<script>alert('Cadastrado com sucesso!')</script>";
  header("location: ../curso.php");
} else {
  header("Location: ../home.php");
}
