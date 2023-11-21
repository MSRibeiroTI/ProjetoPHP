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
    <title>Pastoral do Batismo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src='pastoral.js'></script>
 </head>
<body>
<div class="nav-container">
    <ul class="menu" id="menu">
        <li><a href="home.php">Home</a></li>
            <li><a href="cadagentes.php">Agentes</a></li>
            <li><a href="cadastro.php">Batizados</a></li>
            <li><a href="#contact">Calendário</a></li>
            <li><a href="#">Cert Batismo</a></li>
            <li><a href="#">Cert Curso</a></li>    
            <li><a href="logout.php">Sair</a></li>
    </ul>
</div>
<img src="LogoBatismo.png" alt="">

</body>
<footer>
    <p class="main">
        2023 © Pastoral do Batismo | Sistema de Cadastro | Design by MSRibeiro
    </p>
</footer>