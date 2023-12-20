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
    <title>Pastoral do Batismo</title>
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
    <img src="img/calendario.jpeg" alt="">

</body>
<footer>
    <p class="main">
        2023 © Pastoral do Batismo | Sistema de Cadastro | Desenvolvido por MSRibeiro
    </p>
</footer>