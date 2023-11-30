<?php
 session_start();

 if (empty($_POST) or empty($_POST["nome-agente"]) or empty($_POST["login"])) {
  print "<script>location.href='../user.php';</script>";
 }
 if (isset($_GET['id'])) {
  $id = $_GET['id'];
 }

include('config.php');

$nome = $_POST['nome-agente'];
$login = $_POST['login'];
$senha = md5($_POST['senha']);
$nivel = $_POST['nivel_acesso'];

$sql = "UPDATE usuario SET nome_comp = '$nome', nome = '$login', senha = '$senha', nivel = '$nivel' WHERE id = '$id'";
$resultado = $conn->query($sql) or trigger_error($conn->error);

  if($resultado==true){
    echo "<script>alert('Alterado com sucesso!')</script>";
    header("location: ../user.php");
  }else{
     header("Location: ../home.php");
    }
    
?>