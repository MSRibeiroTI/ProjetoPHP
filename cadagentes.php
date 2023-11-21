<?php
    session_start();
    if(empty($_SESSION)){
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
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src='pastoral.js'></script>
</head>
<div class="nav-container">
    <ul class="menu" id="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="cadagentes.php">Agentes</a></li>
            <li><a href="cadastro.php">Batizados</a></li>
            <li><a href="#">Calendário</a></li>
            <li><a href="#">Cert Batismo</a></li>
            <li><a href="#">Cert Curso</a></li>    
            <li><a href="logout.php">Sair</a></li>
    </ul>
</div>

<body>
 <div class="card">
    <div class="card-body">
    <h1>Cadastro dos Agentes da Pastoral do Batismo</h1>
    <form action="cadBat.php" method="post" >
        <div>
          <label for="nome-agente">Nome do Agente:</label>
          <input type="text" id="nome-agente" name="nome-agente" required>
        </div>
        <div>
          <label for="login">Nome para Login:</label>
          <input type="text" id="login" name="login">
        </div>
        <div>
          <label for="senha">Senha:</label>
          <input type="password" id="senha" name="senha" required>
        </div>
        <div>
          <label for="confirmar-senha">Confirme a Senha:</label>
          <input type="password" id="confirmar-senha" name="confirmar-senha" required>
          </div>
          <div>
          <label for="Nível de acesso"> Nível de Acesso ao Sistema:</label>
          <select  id="nivel_acesso" name="nivel_acesso">
            <option value="1">Leitor</option>
            <option value="2">Usuario</option>
            <option value="3">Administrador</option>
            </select>
            </div>
          <div>
            <button onclick="validar_registro()">Registrar</button>
            </div>
        </form>
    </div>
 </div>
    
</body>
</html>