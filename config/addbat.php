<?php
 session_start();

 if (empty($_POST) or empty($_POST["nome"]) or empty($_POST[""])) {
  print "<script>location.href='cadastro.php';</script>";
 }

include('config.php');

$usuario = $_POST['nome-crianca'];
$pai = $_POST['pai'];
$phonepai = $_POST['telefone'];
$mae = $_POST['mae'];
$phonemae = $_POST['telefone2'];
$nascimento = $_POST['data-nascimento'];
$endereco = $_POST['endereco'];
$cert = $_POST['cert-nascimento'];
$curso = $_POST['curso'];
$padrinho = $_POST['padrinho'];
$madrinha = $_POST['madrinha'];
$batismo = $_POST['data-batismo'];


$sql = "INSERT INTO Cad_Children (Nome, Pai, phonepai, Mae, phonemae, Nascimento, addres, curso, cert_nasc, Padrinho, Madrinha, Batizado)
VALUES ('$usuario', '$pai', '$phonepai', '$mae', '$phonemae', '$nascimento', '$endereco', '$curso', '$cert', '$padrinho', '$madrinha', '$batismo')";
$resultado = $conn->query($sql) or trigger_error($conn->error);

  if($resultado==true){
    echo "<script>alert('Cadastrado com sucesso!')</script>";
    header("location: ../batizadolist.php");
  }else{
     header("Location: ../home.php");
    }
?>