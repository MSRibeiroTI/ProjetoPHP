<?php
session_start();
echo "Bem Vindo " . $_SESSION["usuario"];
echo date(", d/m/Y");
if (empty($_SESSION)) {
    print "<script>location.href='index.php';</script>";
} elseif (($_SESSION["nivel"]) == '3') {
    print "<script>location.href='AgentListadmin.php';</script>";
}
include_once('config/config.php');
$sql = "SELECT * FROM agentes ORDER BY name";
$res = mysqli_query($conn, $sql);
$quant = mysqli_num_rows($res);

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
    <h2>Agentes da Pastoral do Batismo</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($res)) : ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['phone']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <table>
        <tr>
            <td><?php echo "Agentes Cadastrados: $quant"; ?></td>
        </tr>
        <br>


        <?php
        mysqli_close($conn);
        ?>

</body>