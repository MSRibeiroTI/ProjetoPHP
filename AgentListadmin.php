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
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$limit = 15;
$offset = ($limit * $page) - $limit;

$sql1 = "SELECT * FROM agentes ORDER BY name";
$res1 = mysqli_query($conn, $sql1);
$total_linhas = mysqli_num_rows($res1);
$sql = "SELECT * FROM agentes ORDER BY name LIMIT $limit OFFSET $offset";
$res = mysqli_query($conn, $sql);
$quant = mysqli_num_rows($res1);

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

    <?php include "menu.php";  ?>

    <h2>Agentes da Pastoral do Batismo</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Whatsapp</th>
            <th>Opções</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($res)) : ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><a href="https://api.whatsapp.com/send?phone=<?php echo $row['phone'] ?>" target="_blank"><img src="img/whatsapp.png" alt="WhatsApp" width="35px" height="auto"></td>
                <td>
                    <a href="editagentes.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a onclick="return confirm('Deseja realmente excluir o Agente?')" href="config/deleteagent.php?id=<?php echo $row['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <table>
        <td>Número de Registros desta página: <?php echo "$quant"; ?></td><br>
        <td>Total Cadastrado: <?php echo "$total_linhas"; ?></td>
        <br>
    </table>
    <?php
    $pages = ceil($total_linhas / $limit);
    $MaxLinks = 2;

    ?>
    <!-- Paginação -->
    <div class="pages" style="text-align: center;  font-size: large;">
        Páginas: <br> <a href="?page=1">
            << </a>

                <?php for ($i = $page - $MaxLinks; $i <= $page - 1; $i++) : ?>
                    <?php if ($i > 0) : ?>
                        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php echo $page; ?>

                <?php for ($i2 = $page + 1; $i2 <= $page + $MaxLinks; $i2++) : ?>
                    <?php if ($i2 <= $pages) : ?>
                        <a href="?page=<?php echo $i2; ?>"><?php echo $i2; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <a href="?page=<?php echo $pages; ?>">>></a>

    </div>

    <br>
    <div class="cadastro">
        <h2>Cadastrar novo Agente:</h2>
        <line>
            <a href="cadagentes.php"><button>Cadastrar</button></a>
    </div>
    <?php
    mysqli_close($conn);
    ?>

</body>