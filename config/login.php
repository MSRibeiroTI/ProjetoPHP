<?php
 session_start();

    if (empty($_POST) or empty($_POST["usuario"]) or empty($_POST["senha"])) {
      print "<script>location.href='/index.php';</script>";
     }
  
    include('config.php');

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM usuario WHERE nome = '{$usuario}' AND senha = '{$senha}'";
$resultado = mysqli_query($conn,$sql);

$row = $resultado->fetch_object();

$qtd = $resultado->num_rows;

      if($qtd > 0){
        $_SESSION["usuario"] = $usuario;
        $_SESSION["nome"] = $row->nome;
        $_SESSION["nivel"] = $row->nivel;
        header("location: ../home.php");
      }else{
        echo '<div class="alert alert-danger" role="alert">Usuário ou Senha inválido!</div>';
        echo "Usuário ou senha incorretos";
        header("Location: /index.php");
        }
        
?>