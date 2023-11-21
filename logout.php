<?php
    session_start();
    unset($_SESSION["usuario"]);
    unset($_SESSION["nome"]);
    session_destroy();
    print "<script>location.href='index.php';</script>";
    exit;
?>