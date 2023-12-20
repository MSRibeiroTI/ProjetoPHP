<?php
session_start();
echo "Bem Vindo " . $_SESSION["usuario"];
echo date(", d/m/Y");
if (empty($_SESSION)) {
  print "<script>location.href='index.php';</script>";
}

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
      <div class="card-body">
        <br><br>
        <h1>Cadastro para Curso de Batismo</h1>
        <form action="config/addcurso.php" method="POST">
          <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
          </div>
          <div>
            <label for="Telefonte">Telefonte:</label>
            <input type="tel" id="telefone" name="telefone" required>
          </div>
          <div>
            <label for="endereço">Endereço:</label>
            <input type="text" id="endereco" name="endereco" placeholder="Rua, Bairro, Cidade" required>
          </div>
          <div>
            <label for="curso">Data do Curso de Preparação:</label>
            <input type="date" name="curso" id="curso" required>
          </div>
          <div>
            <br>
            <button type="submit">Salvar</button>
          </div>
          <br><br>
        </form>
      </div>
    </div>

  </body>

</html>