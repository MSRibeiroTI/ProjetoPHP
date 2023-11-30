<?php
 session_start();

 if (empty($_POST) or empty($_POST["nome-agente"]) or empty($_POST["senha"])) {
  print "<script>location.href='cadagentes.php';</script>";
 }

include('config.php');

$usuario = $_POST['nome-agente'];
$login = $_POST['login'];
$senha = md5($_POST['senha']);
$nivel = $_POST['nivel_acesso'];

$sql = "INSERT INTO usuario (nome_comp, nome, senha, nivel) VALUES ('$usuario', '$login','$senha', '$nivel')";
$resultado = $conn->query($sql) or trigger_error($conn->error);

  if($resultado==true){
    echo "<script>alert('Cadastrado com sucesso!')</script>";
    header("location: ../user.php");
  }else{
     header("Location: ../home.php");
    }
?>