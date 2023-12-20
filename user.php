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
include_once('config/config.php');
$sql = "SELECT * FROM usuario ORDER BY nome_comp";
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
    <h2>Usuários dos Sistema</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Login/Usuário</th>
            <th>Nível</th>
            <th>Opções</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($res)) : ?>
            <tr>
                <td><?php echo $row['nome_comp']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['nivel']; ?></td>
                <td>
                    <a href="edituser.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="edituserpas.php?id=<?php echo $row['id']; ?>"> - Alterar Senha - </a>
                    <a onclick="return confirm('Confirma a exclusão deste registro?')" href="config/deleteuser.php?id=<?php echo $row['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <table>
        <tr>
            <td><?php echo "Usuários Cadastrados: $quant"; ?></td>
        </tr>
    </table>
    <br>
    <div class="cadastro">
        <h2>Cadastrar novo Usuário:</h2>
        <line>
            <a href="caduser.php"><button>Cadastrar</button></a>
    </div>
    <?php
    mysqli_close($conn);
    ?>

</body>