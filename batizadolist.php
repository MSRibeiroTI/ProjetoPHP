<?php
session_start();
echo "Bem Vindo " . $_SESSION["usuario"];
echo date(", d/m/Y");
if (empty($_SESSION)) {
    print "<script>location.href='index.php';</script>";
}
include_once('config/config.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pastoral do Batismo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style2.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='js/pastoral.js'></script>
</head>

<body>
<?php $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);?>
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

    <div class="cadastro">
    </div>
    <h2>Lista de Batizados</h2>
    <form action="" method="POST">
        <?php
            $text_search = "";
            if(isset($dados['busca1'])){
                $text_search = $dados['busca1'];
            }
        ?>
        <div class="busca">
            <div>
                <label class="control-label">Pesquisar por nome da criança</label>
                <input type="text" name="busca1" placeholder="Search" value="<?php echo $text_search; ?>">
            </div>
            <div>
                <label class="control-label">Pesquisar por data do batismo</label>
                <input type="date" name="data">
            </div>
            <button type="submit" value="a" name="listar">Listar todos</button>
            <button type="submit" formaction="cadastro.php">Cadastrar</button>
            <button type="submit">Pesquisar</button>

    </form>
    </div>
    <?php
    $busca = $_POST['busca1'];
    $data = $_POST['data'];
    $todos = $_POST['listar'];
    if ($todos != "") {
        $sql = "SELECT * FROM Cad_Children";
        $res = mysqli_query($conn, $sql);
        $registros = mysqli_num_rows($res);
    } elseif ($data != "") {
        $sql2 = "SELECT * FROM Cad_Children WHERE Batizado = '$data'";
        $res = mysqli_query($conn, $sql2);
        $registros = mysqli_num_rows($res);
    } elseif ($busca != "") {
        $sql1 = "SELECT * FROM Cad_Children WHERE Nome LIKE '%$busca%'";
        $res = mysqli_query($conn, $sql1);
        $registros = mysqli_num_rows($res);
           }


    ?>


    <div class="tabela">
        <table>
            <tr>
                <th>Criança</th>
                <th>Nascimento</th>
                <th>Cert. Nasc.</th>
                <th>Data do Curso</th>
                <th>Data de Batismo</th>
                <th>Cadastro</th>
                <th>Certificados</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                <tr>
                    <td><?php echo $row['Nome']; ?></td>
                    <td><?php echo $row['Nascimento']; ?></td>
                    <td><?php echo $row['cert_nasc']; ?></td>
                    <td><?php echo $row['curso']; ?></td>
                    <td><?php echo $row['Batizado']; ?></td>
                    <td>
                        <a href="visualizarDados.php?Id=<?php echo $row['Id'] ?>"><span title="Visualizar"><img src="img/view.png"></span></a>
                        <a href="editabat.php?Id=<?php echo $row['Id']; ?>"><span title="Editar"><img src="img/edit.png"></span></a>
                    </td>
                    <td>
                        <a href="certcursopdf.php?Id=<?php echo $row['Id']; ?>">(Curso)</a>
                        <a href="certbatismo.php?Id=<?php echo $row['Id']; ?>">(Batismo)</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <td>Número de Registros: <?php echo "$registros"; ?></td>

    </div>
    <br>

    <?php
    mysqli_close($conn);
    ?>

</body>