<?php
 session_start();

 if (empty($_POST) or empty($_POST["nome"]) or empty($_POST[""])) {
  print "<script>location.href='cadastro.php';</script>";
 }

include('config.php');

$usuario = $_POST['nome-crianca'];
$pai = $_POST['pai'];
$mae = $_POST['mae'];
$nascimento = $_POST['data-nascimento'];
$cert = $_POST['cert-nascimento'];
$padrinho = $_POST['padrinho'];
$madrinha = $_POST['madrinha'];
$batismo = $_POST['data-batismo'];


$sql = "INSERT INTO Cad_Children (Nome, Pai, Mae, Nascimento, cert_nasc, Padrinho, Madrinha, Batizado)
VALUES ('$usuario', '$pai','$mae', '$nascimento', '$cert', '$padrinho', '$madrinha', '$batismo')";
$resultado = $conn->query($sql) or trigger_error($conn->error);

  if($resultado==true){
    echo "<script>alert('Cadastrado com sucesso!')</script>";
    header("location: ../batizadolist.php");
  }else{
     header("Location: ../home.php");
    }
?>