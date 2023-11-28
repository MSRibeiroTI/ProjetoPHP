<?php
 session_start();

 if (empty($_POST) or empty($_POST["agente"]) or empty($_POST["phone"])) {
  print "<script>location.href='cadagentes.php';</script>";
 }

include('config.php');

$nome = strtoupper($_POST['agente']);
$address = strtoupper($_POST['address']);
$phone = $_POST['phone'];

$sql = "INSERT INTO agentes (name, address, phone) VALUES ('$nome', '$address','$phone')";
$resultado = $conn->query($sql) or trigger_error($conn->error);

  if($resultado==true){
    echo "<script>alert('Cadastrado com sucesso!')</script>";
    header("location: AgentList.php");
  }else{
     header("Location: home.php");
    }
?>