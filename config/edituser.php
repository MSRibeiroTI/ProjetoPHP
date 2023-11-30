<?php
 session_start();

 if (empty($_POST) or empty($_POST["agente"]) or empty($_POST["phone"])) {
  print "<script>location.href='../cadagentes.php';</script>";
 }
 if (isset($_GET['id'])) {
  $id = $_GET['id'];
 }

include('config.php');

$nome = strtoupper($_POST['agente']);
$address = strtoupper($_POST['address']);
$phone = $_POST['phone'];

$sql = "UPDATE usuario SET name = '$nome', address = '$address', phone = '$phone' WHERE id = '$id'";
$resultado = $conn->query($sql) or trigger_error($conn->error);

  if($resultado==true){
    echo "<script>alert('Alterado com sucesso!')</script>";
    header("location: ../user.php");
  }else{
     header("Location: ../home.php");
    }
    
?>