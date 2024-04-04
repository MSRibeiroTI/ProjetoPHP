<?php
session_start();

if (empty($_POST) or empty($_POST["nome"]) or empty($_POST[""])) {
  print "<script>location.href='cadastro.php';</script>";
}
if (isset($_GET['Id'])) {
  $id = $_GET['Id'];
}

include('config.php');

$usuario = $_POST['nome-crianca'];
$pai = $_POST['pai'];
$phonepai = $_POST['telefone'];
$mae = $_POST['mae'];
$phonemae = $_POST['telefone2'];
$endereco = $_POST['endereco'];
$nascimento = $_POST['data-nascimento'];
$cert = $_POST['cert-nascimento'];
$curso = $_POST['curso'];
$padrinho = $_POST['padrinho'];
$fezpad = $_POST['fezcursopad'];
$ondepad = $_POST['ondepad'];
$madrinha = $_POST['madrinha'];
$fezmad = $_POST['fezcursomad'];
$ondemad = $_POST['ondemad'];
$batismo = $_POST['data-batismo'];


$sql = "UPDATE Cad_Children SET Nome = '$usuario', Pai = '$pai', phonepai = '$phonepai',
Mae = '$mae', phonemae = '$phonemae', addres = '$endereco', Nascimento = '$nascimento',
cert_nasc = '$cert', curso = '$curso', Padrinho = '$padrinho', fezcursopad='$fezpad', ondepad='$ondepad', Madrinha = '$madrinha', fezcursomad='$fezmad', ondemad='$ondemad', Batizado = '$batismo' WHERE Id = '$id'";

$resultado = $conn->query($sql) or trigger_error($conn->error);

if ($resultado == true) {
  echo "<script>alert('Cadastrado com sucesso!')</script>";
  header("location: ../batizadolist.php");
} else {
  header("Location: ../home.php");
}
?>