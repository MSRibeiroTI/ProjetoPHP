<?php
session_start();
echo "Bem Vindo " . $_SESSION["usuario"];
echo date(", d/m/Y");
if (empty($_SESSION)) {
  print "<script>location.href='index.php';</script>";
} elseif (($_SESSION["nivel"]) != '3') {
  echo "<script>alert('Acesso Restrito!')</script>";
  print "<script>location.href='home.php';</script>";
}
include_once("config/config.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM usuario WHERE id = '$id'";
  $res = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($res);
} else {
  echo "Nenhum ID encontrado";
}
$conn->close();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Casdastro</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src='js/pastoral.js'></script>
</head>

<body>
  <div class="topnav" id="myTopnav">

    <a href="home.php" class="active">Home</a>
    <a href="AgentList.php">Agentes</a>
    <a href="batizadolist.php">Batizados</a>
    <a href="calendario.php">Calendário</a>
    <a href="curso.php">Curso</a>
    <a href="user.php">Usuários</a>
    <a href="config/logout.php">Sair</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>

  </div>

  <body>
    <div class="card">
      <div class="card-body"><br><br>
        <h1>Atualização da Senha</h1>
        <form action="config/edittuserpass.php?id=<?php echo $row['id']; ?>" method="post">
          <div>
            <br>
            <label for="login">Usuário:</label>
            <?= $row['nome']; ?>
            <br><br>
          </div>
          <div>
            <label for="senha">Nova Senha:</label>
            <input type="password" id="password" name="passowrd" required>
          </div>
          <div>
            <label for="confirmar-senha">Confirme a Senha:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
          </div>
          <script>
            $('#confirm-password').on('keyup', function() {
              if ($('#password').val() == $('#confirm-password').val()) {
                $('#message').html('As senhas coincidem').css('color', 'green');
              } else {
                $('#message').html('As senhas não coincidem').css('color', 'red');
              }
            })
          </script>
          <div><span id="message"></span></div>
          <br><br>
          <button type="submit">Salvar</button>
          <br><br>
      </div>
      </form>


    </div>
    </div>
  </body>

</html>