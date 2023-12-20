<?php
session_start();

if (empty($_POST) or empty($_POST["agente"]) or empty($_POST["phone"])) {
 print "<script>location.href='../curso.php';</script>";
}
if (isset($_GET['id'])) {
 $id = $_GET['id'];
}

include('config.php');

$nome = $_POST['nome'];
$address = $_POST['endereco'];
$phone = $_POST['telefone'];
$curso = $_POST['curso'];

$sql = "UPDATE cad_curso SET name = '$nome', addres = '$address', phone = '$phone', datacurso = '$curso' WHERE id = '$id'";
$resultado = $conn->query($sql) or trigger_error($conn->error);

 if($resultado==true){
   echo "<script>alert('Alterado com sucesso!')</script>";
   header("location: ../curso.php");
 }else{
    header("Location: ../home.php");
    echo $resultado;
   }


?>